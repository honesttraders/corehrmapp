<?php

namespace HonestTraders\CoreHrmApp\Repositories;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Modules\RolePermission\Entities\Role;
use Modules\Setting\Model\BusinessSetting;
use Modules\Setting\Model\GeneralSetting;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;
use  Modules\OrgInstructorPolicy\Entities\OrgPolicy;

class InitRepository
{

    public function init()
    {
        config([
            'app.item' => '30626608',
            // 'honesttraders.module_manager_model' => \Modules\ModuleManager\Entities\InfixModuleManager::class,
            // 'honesttraders.module_manager_table' => 'infix_module_managers',
            // 'honesttraders.saas_module_name' => 'LmsSaas',
            // 'honesttraders.module_status_check_function' => 'isModuleActive',
            // 'honesttraders.settings_model' => \Modules\Setting\Model\GeneralSetting::class,
            // 'honesttraders.module_model' => \Nwidart\Modules\Facades\Module::class,

            'honesttraders.user_model' => \App\Models\User::class,
            // 'honesttraders.settings_table' => 'general_settings',
            // 'honesttraders.database_file' => 'infixlms.sql',
        ]);

    }

    public function config()
    {
        try {

            DB::connection()->getPdo();


            // app()->singleton('permission_list', function () {
            //     return Cache::rememberForever('PermissionList_' . SaasDomain(), function () {
            //         return Cache::rememberForever('RoleList_' . SaasDomain(), function () {
            //             return Role::with(['permissions' => function ($query) {
            //                 $query->select('route', 'parent_route', 'role_permission.role_id');
            //             }])->get(['id', 'name']);
            //         });
            //     });
            // });

            // if (isModuleActive('OrgInstructorPolicy')) {
            //     app()->singleton('policy_permission_list', function () {
            //         return Cache::rememberForever('PolicyPermissionList', function () {
            //             return Cache::rememberForever('PolicyRoleList', function () {
            //                 return OrgPolicy::with(['permissions' => function ($query) {
            //                     $query->select('route', 'parent_route', 'role_permission.role_id');
            //                 }])->get(['id', 'name']);
            //             });
            //         });
            //     });
            // }


            // app()->singleton('getMainPaymentSetting', function () {
            //     $domain = 'main';
            //     $path = Storage::path('payment.json');
            //     if (!Storage::has('payment.json')) {
            //         GeneratePaymentSetting($domain);
            //     }
            //     $data = json_decode(file_get_contents($path), true);
            //     $settings = new \stdClass;
            //     foreach (array_keys($data) as $property) {
            //         $settings->{$property} = $data[$property];
            //     }
            //     return $settings->$domain;
            // });

            // app()->singleton('getPaymentSetting', function () {
            //     $domain = SaasDomain();
            //     $path = Storage::path('payment.json');
            //     if (!Storage::has('payment.json')) {
            //         GeneratePaymentSetting($domain);
            //     }
            //     $data = json_decode(file_get_contents($path), true);
            //     $settings = new \stdClass;
            //     foreach (array_keys($data) as $property) {
            //         $settings->{$property} = $data[$property];
            //     }
            //     return $settings->$domain;
            // });
            // app()->singleton('getSetting', function () {
            //     if (function_exists('SaasDomain')) {
            //         $domain = SaasDomain();
            //     } else {
            //         $domain = 'main';
            //     }

            //     $path = Storage::path('settings.json');
            //     if (!Storage::has('settings.json')) {
            //         GenerateGeneralSetting($domain);
            //     }
            //     $data = json_decode(file_get_contents($path), true);
            //     $settings = new \stdClass;
            //     foreach (array_keys($data) as $property) {
            //         $settings->{$property} = $data[$property];
            //     }
            //     if (!isset($settings->$domain)) {
            //         $domain = 'main';
            //     }
            //     $settings->$domain['site_name'] = $data[$domain]['site_title'];
            //     $settings->$domain['company_name'] = $data[$domain]['site_title'];
            //     return $settings->$domain;
            // });

            // app()->singleton('getHomeContent', function () {
            //     if (function_exists('SaasDomain')) {
            //         $domain = SaasDomain();
            //     } else {
            //         $domain = 'main';
            //     }
            //     $path = Storage::path('homeContent.json');
            //     if (!Storage::has('homeContent.json')) {
            //         GenerateHomeContent($domain);
            //     }
            //     $data = json_decode(file_get_contents($path), true);
            //     $conent = new \stdClass;
            //     foreach (array_keys($data) as $property) {
            //         $conent->{$property} = $data[$property];
            //     }
            //     $new_content = new \stdClass;
            //     if (!isset($conent->$domain)) {
            //         $domain = 'main';
            //     }
            //     foreach ($conent->$domain as $key => $contend_date) {
            //         $new_content->{$key} = $contend_date;
            //     }
            //     return $new_content;
            // });

        } catch (\Exception $exception) {
            return false;
        }
    }
}
