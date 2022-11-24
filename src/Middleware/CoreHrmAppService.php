<?php

namespace HonestTraders\CoreHrmApp\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use HonestTraders\CoreHrmApp\Repositories\InitRepository;
use HonestTraders\CoreService\Repositories\InitRepository as ServiceRepository;


class CoreHrmAppService{
    protected $repo, $service_repo;

    public function __construct(
        InitRepository $repo,
        ServiceRepository $service_repo
    ) {
        $this->repo = $repo;
        $this->service_repo = $service_repo;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $this->repo->init();

        if(Auth::check()){
            if(!rebootHrm()){
                abort('405');
            }
           }
        $this->service_repo->init();
        Artisan::call('storage:link');
        if($this->inExceptArray($request)){
            return $next($request);
        }

        $temp = Storage::disk('local')->exists('.temp_app_installed') ? Storage::disk('local')->get('.temp_app_installed') : false;

        if (!$temp) {
            $database = $this->service_repo->checkDatabase();
            \Log::info('database: '.$database);
            $logout = Storage::disk('local')->exists('.logout') ? Storage::disk('local')->get('.logout') : false;
            if (!$database and !$logout) {
                \Log::info($request->url());
                \Log::info('Table not found');
                Storage::disk('local')->put('.logout', 'true');
                Storage::disk('local')->delete(['.access_code', '.account_email']);
                Storage::disk('local')->put('.app_installed', '');
            }
        }
        $c = Storage::disk('local')->exists('.app_installed') ? Storage::disk('local')->get('.app_installed') : false;
        \Log::info("C : ".$c);
        if (!$c) {
            return redirect('/install');
        }

        $this->repo->config();

        return $next($request);


    }

      /**
     * The names of the cookies that should not be encrypted.
     *
     * @var array
     */
    protected $except = [
        'install', 'install/*'
    ];

    protected function inExceptArray($request)
    {

        foreach ($this->except as $except) {
            if ($except !== '/') {
                $except = trim($except, '/');
            }
            if ($request->fullUrlIs($except) || $request->is($except)) {
                return true;
            }
        }

        return false;
    }
}
