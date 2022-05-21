<?php

namespace SpondonIt\LmsService\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SpondonIt\LmsService\Repositories\InstallRepository;
use SpondonIt\Service\Repositories\InstallRepository as ServiceRepository;
use SpondonIt\LmsService\Requests\UserRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Artisan;

class InstallController extends Controller{
    protected $repo, $request, $service_repo;

    public function __construct(
        InstallRepository $repo,
        Request $request,
        ServiceRepository $service_repo
    )
    {
        $this->repo = $repo;
        $this->request = $request;
        $this->service_repo = $service_repo;
    }

    public function index(){

        $this->service_repo->checkInstallation();
        return view('lms::install.welcome');
    }


    public function user(){
        $ac = Storage::exists('.temp_app_installed') ? Storage::get('.temp_app_installed') : null;
        Artisan::call('optimize:clear');
        if(!$this->service_repo->checkDatabaseConnection() || !$ac){
            abort(404);
        }

		return view('lms::install.user');
    }

    public function post_user(UserRequest $request){
       try{
            $this->service_repo->install($request->all());
       } catch(\Exception $e){
            return response()->json(['message' =>$e]);
       }

        $this->repo->install($request->all());
		return response()->json(['message' => __('lms::install.done_msg'), 'goto' => route('service.done')]);
    }


}
