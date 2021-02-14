<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserRequest;
use App\Models\User;

use DB;
class FilterController extends Controller
{
    public function filter_request(Request $request)
    {
       $status=$request->filter_status;
        $table_status=DB::table('request_statuses')->where('status',$status)->get();
        $requests=[];
        foreach ($table_status as $item)
        {
            
               $table_request=UserRequest::find($item->user_request_id);
               $requests[]=$table_request;
        }
        return view('request',compact('requests'));
    }


    public function filter_user(Request $request)
    {
        // $users=User::all();
       $mode_status=$request->mode_status;
       $account_status=$request->account_status;
       $users=[];
       if($mode_status ==null && $account_status != null)
       {
        $account=DB::table('client_account_statuses')->where('status',$account_status)->get();
        foreach($account as $u)
        {
           $user=User::find($u->user_id);
           $users[]=$user;
        }
       }
       else if($mode_status !=null && $account_status == null)
       {
        $account=DB::table('client_modes')->where('status',$mode_status)->get();
        foreach($account as $u)
        {
           $user=User::find($u->user_id);
           $users[]=$user;
        }
       }

       else if($mode_status !=null && $account_status != null)
       {
        $mode=DB::table('client_modes')->where('status',$mode_status)->get();
        $account=DB::table('client_account_statuses')->where('status',$account_status)->get();
        
        foreach($account as $a)
        {
            foreach($mode as $m)
            {
                $user_a=User::find($a->user_id);
                $user_m=User::find($m->user_id);
                if($user_a->id==$user_m->id)
                {
                    $users[]=$user_a;

                }


            }
        }
       }
      
        return view('user',compact('users'));
    }
    
}
