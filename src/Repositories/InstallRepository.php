<?php

namespace HonestTraders\CoreHrmApp\Repositories;
ini_set('max_execution_time', -1);

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Modules\Setting\Model\GeneralSetting;
use Illuminate\Validation\ValidationException;
use HonestTraders\CoreService\Repositories\InstallRepository as ServiceInstallRepository;


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

            Artisan::call('db:seed', array('--force' => true));

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
            \Log::info($e);
            // throw ValidationException::withMessages(['message' => $e->getMessage()]);

        }
    }

    public function postInstallScript($admin, $params)
    {
        //write your post install script here

        // UpdateGeneralSetting('system_domain', app_url());
        // UpdateGeneralSetting('system_activated_date', Carbon::now());

        Artisan::call('migrate', [
            // '--path' => 'vendor/laravel/passport/database/migrations',
            '--force' => true,

        ]);
        // Artisan::call('passport:install');
    }


    /**
     * Insert default admin details
     */
    public function makeAdmin($params)
    {
        \Log::info($params);
        try {

            $user_model_name = config('honesttraders.user_model');

            // Schema::disableForeignKeyConstraints();

            $user_class = new $user_model_name;
            $user = $user_class->find(1);
            if (!$user) {
                $user = new $user_model_name;
            }
            $user->name = 'Super admin';
            $user->email = $params['email'];
            if (Schema::hasColumn('users', 'is_admin')) {
                $user->is_admin = 1;
            }

            // $user->password = bcrypt(gv($params, '', '12345678'));
            $user->password = bcrypt($params['password']);
            $user->save();
            //db commit
            \Log::info($user);

            DB::commit();
        } catch (\Exception $e) {
            $this->installRepository->rollbackDb();
            \Log::info($e);
            // throw ValidationException::withMessages(['message' => $e->getMessage()]);
        }


    }

}
