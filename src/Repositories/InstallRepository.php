<?php

namespace SpondonIt\LmsService\Repositories;
ini_set('max_execution_time', -1);

use Carbon\Carbon;
use Illuminate\Support\Facades\Artisan;
use Modules\Setting\Model\GeneralSetting;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Schema;
use SpondonIt\Service\Repositories\InstallRepository as ServiceInstallRepository;


class InstallRepository
{

    protected $installRepository;

    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct(ServiceInstallRepository $installRepository)
    {
        $this->installRepository = $installRepository;
    }


    /**
     * Install the script
     */
    public function install($params)
    {

        try {
            $admin = $this->makeAdmin($params);
            $this->installRepository->seed(gbv($params, 'seed'));
            $this->postInstallScript($admin, $params);

            Artisan::call('key:generate', ['--force' => true]);

            envu([
                'APP_ENV' => 'production',
                'APP_DEBUG' => 'false',
            ]);

        } catch (\Exception $e) {

            Storage::delete(['.user_email', '.user_pass']);

            throw ValidationException::withMessages(['message' => $e->getMessage()]);

        }
    }

    public function postInstallScript($admin, $params)
    {
        //write your post install script here

        // UpdateGeneralSetting('system_domain', app_url());
        // UpdateGeneralSetting('system_activated_date', Carbon::now());

        Artisan::call('migrate', [
            '--path' => 'vendor/laravel/passport/database/migrations',
            '--force' => true,

        ]);
        // Artisan::call('passport:install');
    }


    /**
     * Insert default admin details
     */
    public function makeAdmin($params)
    {
        try {
            $user_model_name = config('spondonit.user_model');
            $user_class = new $user_model_name;
            $user = $user_class->find(1);
            if (!$user) {
                $user = new $user_model_name;
            }
            $user->name = 'Super admin';
            $user->email = gv($params, 'email');
            if (Schema::hasColumn('users', 'role_id')) {
                $user->role_id = 1;
            }

            $user->password = bcrypt(gv($params, 'password', 'abcd1234'));
            $user->save();
        } catch (\Exception $e) {
            $this->installRepository->rollbackDb();
            throw ValidationException::withMessages(['message' => $e->getMessage()]);
        }


    }

}
