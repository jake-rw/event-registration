<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Registrations\AddRegistration;
use App\Http\Requests\Admin\Registrations\EditRegistration;

use DB;
use Illuminate\Http\File;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Illuminate\Support\Facades\Storage;

use App\Models\Registration;
use Carbon\Carbon;


class RegisterController extends Controller
{

	public function index() {

		$posts = Registration::all();

		return view('backend.registrations.list', compact('posts'));
	}

	public function create() {

		$usage = usage();
		$status = status();
		return view('backend.registrations.create', compact(['usage','status']));;
	}


	public function edit($id) {

		$post = Registration::find($id);
		$usage = usage();
		$status = status();

		return view('backend.registrations.edit', compact(['post','usage','status']));
	}

	public function store(AddRegistration $request) {

		$post = $request->only(
			'cf_fname',
            'cf_lname',
            'cf_email',
            'cf_tel',
            'cf_job_title',
            'cf_requirements',
            'cf_medical',
            'cf_company',
            'cf_consent'
		);

		$item = new Registration;
		
		//Loop through each post value and save
		foreach ($post as $key => $value) {
			if( $key == '_token' ){
    			continue;
    		}			

			$item->setAttribute($key, $value); 
		}

		$item->save();

		return redirect('admin/registrations');
	}
	
	public function update(EditRegistration $request) {

		$post = $request->only(
            'bid',
            'cf_fname',
            'cf_lname',
            'cf_email',
            'cf_tel',
            'cf_job_title',
            'cf_requirements',
            'cf_medical',
            'cf_company',
            'cf_consent'
        );

        $bid = $request->input('bid');
        $item = Registration::where([
				['id', $bid]
			])->first();
        
        if ($item) {
        	//Loop through each post value and save
			foreach ($post as $key => $value) {
				if( $key == '_token' || 
					$key == 'bid' 
				){
	    			continue;
	    		}
				
				$item->setAttribute($key, $value); 
			}
			
            $item->save();           

        }

		return redirect('/admin/registrations/');
	}

	public function delete($id) {
		
		$post = Registration::findOrFail($id);
		$post->destroy($id);
		
		return redirect('/backend/registrations/');
	}

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function export(Request $request)
    {

        
            $data = Registration::orderBy('id', 'DESC')->get()->toArray();
            $contents = '';
			$_line = [];
            $file_path = 'registrations/';
            $file_name = 'registrations_export.csv';
            $full_path = $file_path . $file_name;

            // Delete the old file
            if (Storage::disk('local')->exists($full_path)) {
                Storage::disk('local')->delete($full_path);
            }

            $handle = fopen('php://temp', 'r+');
            $table_cols = DB::getSchemaBuilder()->getColumnListing('registrations');
            $counter = 0;

            $excluded = array();            

            if( count($data) > 0 ){
            	$header = array_keys($data[0]);
				fputcsv($handle, $header);
            }

            foreach ($data as $line) {					
                
                $_line = $line;

                foreach ($excluded as $key) {
                    unset($_line[$key]);
                }
              
                $counter++;
                fputcsv($handle, $_line);
            }

            rewind($handle);

            while (!feof($handle)) {
                $contents .= fread($handle, 8192);
            }

            fclose($handle);

            Storage::disk('local')->put($full_path, $contents);
            $_full_path = Storage::disk('local')->path($full_path);

            return response()->download($_full_path)->deleteFileAfterSend();
        

        
    }
}
