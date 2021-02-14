<?php

namespace App\Http\Controllers\Auth\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Hash;
use App\Models\User;
use App\Models\UserPicture;
use App\Models\ClientMode;
use App\Models\ClientAccountStatus;

use Auth;



class ApiAuthenticationControlller extends Controller
{
 
    
        public function login(Request $request)
        {
    
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                 $user = $request->user();
                 $data['token'] = $user->createToken('MyApp')->accessToken;
                 $data['name']  = $user->f_name;
                 return response()->json($data, 200);
             }
    
           return response()->json(['error'=>'Unauthorized'], 401);
        }
    
      public function register(Request $request)
        {
    
          $validator = Validator::make($request->all(), [
            'picture' => 'required',
            'fname' => 'required|min:4|max:255',
            'lname' => 'required|min:5|max:255',
            'mobile' =>'required|min:12',
            'email' => 'required|email|unique:users',
            'gender' => 'required|in:male,female',
            'password' =>'required|min:8',
            'status'  =>'required|in:online,offline',
            'account_status'  =>'required|in:block,approaved',
            'comment'  =>'nullable',


          ]);
    
          if ($validator->fails()) {
              return response()->json(['error'=>$validator->errors()], 401);
          }
    
          $user = $request->all();
          $user['password'] = Hash::make($user['password']);

          $user = User::create([

            'f_name' => $request->fname,
            'l_name'=> $request->lname,
            'mobile'=> $request->mobile,
            'email' =>$request->email,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,

          ]);

          $user->user_picture()->create([
            'picture' => $request->picture,
          ]);

         $user->client_mode()->create([
           'status' => $request->status,
         ]);

         $user->client_account_status()->create([
          'status' => $request->account_status,
          'comment' => $request->comment,
          

        ]);
          $success['token'] =  $user->createToken('MyApp')-> accessToken; 
          $success['name'] =  $user->f_name;
    
          return response()->json(['success'=>$success, 'status'=> "success"]); 
        }
    
        public function userDetail()
        {
            $user = Auth::user();
    
            return response()->json(['user' => $user], 200);
        }
    
    
}
