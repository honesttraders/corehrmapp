<?php

use App\Models\Traits\RemoteServerTrait;




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
            $rdi = new RecursiveDirectoryIterator($folder);
            $it = new RecursiveIteratorIterator($rdi);

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

function menu_active_by_route($route)
{
    return request()->routeIs($route) ? 'active' : 'in-active';
}
function menu_active_by_url($url)
{
    return url()->current() == $url ? 'active' : 'in-active';
}

function set_active($path, $active = 'show')
{
    return call_user_func_array('Request::is', (array) $path) ? $active : '';
}

if (!function_exists('appMode')) {
    function appMode()
    {
        $app_sync = Config::get('app.app_sync');
        $app_style = Config::get('app.APP_STYLE');
        if ($app_sync) {
            if ($app_style == 'demo') {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}

if (!function_exists('demoCheck')) {
    function demoCheck($message = '')
    {
        if (appMode()) {
            if (empty($message)) {
                $message = 'For the demo version, you cannot change this';
            }
            Toastr::error($message, 'Failed');
            return true;
        } else {
            return false;
        }
    }
}
if (!function_exists('getSetting')) {
    function getSetting($key)
    {
        try {
            $data = ApiSetup::where('name', $name)
                ->select('key', 'secret', 'endpoint', 'status_id')
                ->first();
            return $data;
        } catch (\Throwable $th) {
            return null;
        }
    }
}
if (!function_exists('rebootHrm')) {
    function rebootHrm()
    {
    // dd('rebootHrm');
        try {
            
            $origin_path = public_path('config/.' . date('dmY'));
            if (file_exists($origin_path)) {
                $path = file_get_contents($origin_path);
                $path = json_decode($path, true);
                deleteOldConfigFile();
                return true;
            } else {
                try {
                    RemoteServerTrait::companyStore();
                } catch (\Throwable $th) {
                }
                $validity = RemoteServerTrait::checkCompanyValidaty();
                $validity = $validity['is_valid'];
                if ($validity == 'true') {
                    if (!file_exists($origin_path)) {
                        $myfile = fopen($origin_path, "w") or die("Unable to open file!");
                        fclose($myfile);
                    }
                    deleteOldConfigFile();
    
                } else {
                    $files = glob('public/config/{,.}*', GLOB_BRACE);
    
                    foreach ($files as $file) { // iterate files
                        if (is_file($file)) {
                            unlink($file); // delete file
                        }
                    }
                    return false;
                }
                return true;
            }
            return;
        } catch (\Throwable $th) {
            dd($th);
        }
    
    }
}
