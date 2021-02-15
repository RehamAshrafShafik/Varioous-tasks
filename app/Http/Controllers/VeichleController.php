<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Veichle;
use Illuminate\Database\Eloquent\Relations\BelongsToMany\Pivot;
class VeichleController extends Controller
{
    public function veichle()
    {
        $users=User::all();
        return view('veichle',compact('users'));
    }


    public function add(Request $request){
     
       $user= User::find($request->user_id);
        $user->veichles()->create([
            'color'=>$request->color,
            'number' => $request->number,
        ]);
        return back();
    }
    public function update(Request $request){
        
            $status='non active';

            if ($request->has('active'))
            {
            
                $status='active';
            }

            $user= User::whereHas('veichles',function($q) use ($request)
            {
                $q->where(['color'=>$request->color, 'number'=>$request->number]);
            })
            ->with('veichles')->find($request->user_id);
            // dd($user);
            
            $user->veichles()->where(['color'=>$request->color, 'number'=>$request->number])
            ->update([
            
                'status'=> $status,
            ]);
        
            
            return back();
        }


        public function list_active(Request $request){
            $status='non active';
            if ($request->has('active'))
            {
                $status='active';
            }
            $car=User::whereHas('veichles' ,function($q) use ($request ,$status){
                $q->where(['color'=>$request->color, 'number'=>$request->number])
                ->where('user_veichle.status','=',$status);
            })->get();
            dd($car);
    }



    public function attach_veichle(Request $request)
    {
        $users=User::all();
        $veichles=Veichle::all();
     return view('oldVeichle' ,compact('users','veichles'));
    }


    public function attach(Request $request)
    {
        // dd($request->all());
        $user=User::find($request->user_id);
        // if ($user->hasVeichle($request->veichle))
        // {
        //     return redirect()->back()->withErrors( ['Relation already exist!!']);
        // }
        // else{
        //     $user->veichles()->attach($request->veichle);

        //     return back();
        // }

        $user->veichles()->syncWithoutDetaching($request->veichle);

        return back();

      
    }
}