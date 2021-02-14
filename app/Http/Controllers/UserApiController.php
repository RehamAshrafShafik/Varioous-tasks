<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserApiController extends Controller
{
    public function get_user($id)
    {
        // dd('dhd');
       $user=User::whereHas('user_request', function($query) use($id){
        $query->whereHas('request_info', function($query) use($id){
            $query->whereHas('request_arrived_info' ,function($query) use($id){
                $query->whereHas('request_finished' ,function($query) use($id){
                    $query->whereHas('request_invoice',function($query) use($id){
                        $query->where('request_invoices.id',$id);
                    });
                });
            });
        }
    );
 
   })->firstorfail();
    //  dd($user->id);
   return response()->json($user->id);
}
}
