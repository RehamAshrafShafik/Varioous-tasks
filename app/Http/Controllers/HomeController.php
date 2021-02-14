<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserRequest;
use App\Models\RequestInfo;
use App\Models\RequestStatus;
use Mapper;


use App\Models\User;
use DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    public function table_request(Request $request)
    {
    if($request->filter_status!=null)
    {
        $status=$request->filter_status;
        // dd($status);
        $requests=UserRequest::whereHas('request_status',function ($query) use($status){
            $query->where('status', $status );
        })->get();
                     

    }
     else{
        $requests=UserRequest::all();
    }
                // dd($requests[0]->request_status->status);

        return view('request', compact('requests'));
    }


    public function table_user(Request $request)
    {
        
        $mode_status=$request->mode_status;
        $account_status=$request->account_status;
     
        // $users=[];
        if($mode_status ==null && $account_status != null)
        {
            $users=User::select("users.*"
            ,DB::raw("CONCAT(users.f_name,' ',users.l_name) as full_name"))
            ->whereHas('client_account_status',function ($query) use($account_status){
                $query->where('status', $account_status );
            })->get();
    
        }
        else if($mode_status !=null && $account_status == null)
        {
            $users=User::select("users.*"
            ,DB::raw("CONCAT(users.f_name,' ',users.l_name) as full_name"))
            ->whereHas('client_mode',function ($query) use($mode_status){
                $query->where('status', $mode_status );
                })->get();
        }
 
        else if($mode_status !=null && $account_status != null)
        {
      
         
         $users=User::select("users.*"
         ,DB::raw("CONCAT(users.f_name,' ',users.l_name) as full_name"))
         ->whereHas('client_mode',function ($query) use($mode_status){
                    $query->where('status', $mode_status );
                    })
                    ->whereHas('client_account_status',function ($query) use($account_status){
                        $query->where('status', $account_status );
                    })->get();
         
        }
        else{
            $users=User::select("users.*"
            ,DB::raw("CONCAT(users.f_name,' ',users.l_name) as full_name"))
            ->with('user_request')->get();
        }
        // dd($users[0]->user_request->first());
        return view('user', compact('users'));
    }



    public function map(Request $request)
    {
        if ($request->loc!=null)
        {
            $location=Mapper::location($request->loc);
            // dd($location);

            Mapper::streetview($location->getLatitude(), $location->getLongitude(),1, 1, ['ui' => false]);

        }
        else{
        Mapper::map(53.381128999999990000, -1.470085000000040000,['markers' => ['title' => 'My Location', 'animation' => 'DROP']]);
        
        }
        return view('map');
    }
}
