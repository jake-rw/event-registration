<?php


namespace JakeRw\EventRegistration\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JakeRw\EventRegistration\Http\Requests\Admin\Registrations\AddRegistration;
use JakeRw\EventRegistration\Http\Requests\Admin\Registrations\EditRegistration;

use DB;
use Illuminate\Http\File;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Illuminate\Support\Facades\Storage;

use JakeRw\EventRegistration\Models\Registration;
use Carbon\Carbon;


class RegisterController extends Controller
{

	public function index() {

		$posts = Registration::all();
		return view('event-registration::backend.registrations.list', compact('posts'));
	}

	public function create() {
		
		$status = status();
		return view('event-registration::backend.registrations.create', compact(['status']));;
	}


	public function edit($id) {

		$post = Registration::find($id);
		$status = status();

		return view('event-registration::backend.registrations.edit', compact(['post','status']));
	}

	public function store(AddRegistration $request) {
        $validated  = $request->validated();

        try {
            Registration::create($validated);
        } catch (Exception $e) {
           return redirect( route('admin.registrations.update', ['registration'=>$id]) )->withErrors(['Error', 'Error saving, please try again']);
        }

        return redirect( route('admin.registrations.update', ['registration'=>$id]) );
        
	}

    public function show($id) {
        $status = status();
        $post = Registration::find($id);
       // return view('user.profile', ['user' => User::findOrFail($id)]);
        return view('event-registration::backend.registrations.edit', compact(['post','status']));

    }
	
	public function update(EditRegistration $request, $id) {

		$validated  = $request->validated();

        try {
           $item = Registration::where([
                ['id', $id]
            ])->first()->update($validated);
 
        } catch (Exception $e) {
            return redirect( route('admin.registrations.update', ['registration'=>$id]) )->withErrors(['Error', 'Error saving, please try again']);
        }

		return redirect( route('admin.registrations.index') );
	}

	public function delete($id) {
		
		$post = Registration::findOrFail($id);
		$post->destroy($id);
		
		return redirect(route('admin.registrations.index'));
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
