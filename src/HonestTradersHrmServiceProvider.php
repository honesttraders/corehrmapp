<?php

namespace HonestTraders\CoreHrmApp;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Http\Kernel;
use App\Models\coreApp\Setting\Setting;
use Illuminate\Support\Facades\Schema;
use HonestTraders\CoreHrmApp\Middleware\CoreHrmAppService;

class HonestTradersHrmServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        try {
            DB::connection()->getPdo();
            if (Schema::hasTable('settings')) {
                $settings = Setting::get()->pluck('value', 'name');
                foreach ($settings as $key => $value) {
                    config()->set("settings.app.{$key}", $value);
                }
            }
        } catch (\Exception $e) {
            \Log::error("Could not connect to the database.  Please check your configuration. error:" . $e);
        }


        $kernel = $this->app->make(Kernel::class);
        $kernel->pushMiddleware(CoreHrmAppService::class);

        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'lms');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'lms');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }
}
