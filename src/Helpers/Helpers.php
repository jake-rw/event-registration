<?php

//use App\Helpers\General\HtmlHelper;

/*
 * Global helpers file with misc functions.
 */
if (! function_exists('app_name')) {
    /**
     * Helper to grab the application name.
     *
     * @return mixed
     */
    function app_name()
    {
        return config('app.name');
    }
}

if (! function_exists('gravatar')) {
    /**
     * Access the gravatar helper.
     */
    function gravatar()
    {
        return app('gravatar');
    }
}

if (! function_exists('include_route_files')) {

    /**
     * Loops through a folder and requires all PHP files
     * Searches sub-directories as well.
     *
     * @param $folder
     */
    function include_route_files($folder)
    {
        try {
            $rdi = new recursiveDirectoryIterator($folder);
            $it = new recursiveIteratorIterator($rdi);

            while ($it->valid()) {
                if (! $it->isDot() && $it->isFile() && $it->isReadable() && $it->current()->getExtension() === 'php') {
                    require $it->key();
                }

                $it->next();
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}

if (! function_exists('status')) {
    /**
     * Access the statuses helper.
     */
    function status()
    {
         $status = array(
          (object)array(
              'id' => '1',
              'label' => 'Yes',
              
            ),
            (object)array(
              'id' => '0',
              'label' => 'No',
              
            )
          ); 

        return $status;
    }
}

if (! function_exists('usage')) {
    /**
     * Access the usage helper.
     */
    function usage($case=false)
    {
         $usage = array(
            (object)array(
              'id'=>'1',
              'label' => 'Joining Lunch'              
            ),
            (object)array(
              'id'=>'2',
              'label' => 'Using Spa Facilities'
              
            )
          ); 

        
        if( $case !== false ){
            foreach($usage as $_use) {
                if ($case == $_use->id) {
                    return $_use;                    
                }
            }

            return false;
        }
        

        return $usage;
    }
}

if (! function_exists('registration')) {
    /**
     * Access the usage helper.
     */
    function registration()
    {
        $app = app();
        $event = $app->make('stdClass');

        $from_date = ( config('custom.from_date') !== null ? Carbon\Carbon::createFromFormat('d-m-Y H:i:s',config('custom.from_date')) : null);
        $to_date = ( config('custom.to_date') !== null ? Carbon\Carbon::createFromFormat('d-m-Y H:i:s',config('custom.to_date')) : null);
        $reg_status = ( config('custom.to_date') !== null && config('custom.from_date') !== null ? Carbon\Carbon::now()->isBetween($from_date, $to_date, true) : true);
        
        $event->from_date = $from_date;
        $event->to_date = $to_date;
        $event->status = $reg_status;

        return $event;
    }
}
