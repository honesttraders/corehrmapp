<?php

namespace HonestTraders\CoreHrmApp\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use HonestTraders\CoreHrmApp\Requests\UserRequest;
use HonestTraders\CoreService\Repositories\InstallRepository;
use HonestTraders\CoreHrmApp\Repositories\InstallRepository as HrmInstallRepo;
use HonestTraders\CoreService\Repositories\InstallRepository as ServiceRepository;

class InstallController extends Controller{
    protected $repo, $request, $service_repo,$hrm_service_repo;

    public function __construct(

        InstallRepository $repo,
        Request $request,
        ServiceRepository $service_repo,
        HrmInstallRepo $hrm_service_repo
    )
    {
        $this->repo = $repo;
        $this->request = $request;
        $this->service_repo = $service_repo;
        $this->hrm_service_repo = $hrm_service_repo;
    }

    public function index(){

        $this->service_repo->checkInstallation();
        return view('lms::install.welcome');
    }


    public function user(){
        $ac = Storage::disk('local')->exists('.temp_app_installed') ? Storage::disk('local')->get('.temp_app_installed') : null;
        Artisan::call('optimize:clear');
        if(!$this->service_repo->checkDatabaseConnection() || !$ac){
            abort(404);
        }

		return view('lms::install.user');
    }

    public function post_user(UserRequest $request){
       try{

            $user_info=[
                'email'=>$request->email,
                'password'=>$request->password_confirmation,
            ];

            $this->service_repo->install($request->all());

            try {
                Artisan::call('db:seed', array('--force' => true));
                Artisan::call('db:wipe');
                $sql = public_path('db/db.sql');
                DB::unprepared(file_get_contents(public_path('db/db.sql')));
                // DB::unprepared(file_get_contents(public_path('db/pages.sql')));
        
            } catch (\Throwable $th) {
                \Log::info($th);
            }
            $this->hrm_service_repo->makeAdmin($user_info);
       } catch(\Exception $e){
           \Log::info($e);
            return response()->json(['message' =>$e]);
       }

		return response()->json(['message' => __('lms::install.done_msg'), 'goto' => route('service.done')]);
    }


}
