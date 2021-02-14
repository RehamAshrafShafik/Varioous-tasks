<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserRequest;
use App\Models\RequestInfo;
use App\Models\RequestStatus;

use Illuminate\Support\Facades\Validator;
use DB;
class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requests=UserRequest::with('request_status','request_info')->get();
        return response()->json(['data'=>$requests]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
           // validate
           $validator = Validator::make($request->all(), [

            'booking_id' => 'required|numeric|unique:user_requests',
            'user_id' => 'required|numeric|exists:users,id',
            'type' => 'required|max:225',
            'payment_mode' => 'required|max:225',
            'provider_id'  => 'required|integer',
            'car_id'       => 'required|integer',
            'remaining_distance' => 'required|numeric',
            'status'      => 'required|in:searching,onboard,completed',


        ]);

        // validator fails
        if ($validator->fails())
        {

            return response()->json(['error'=>$validator->errors()], 401);

        }

        // create
        $user_request=UserRequest::create([

            'booking_id' => $request->booking_id,
            'user_id' => $request->user_id,
            'type' => $request->type,
            'payment_mode' => $request->payment_mode,
            'create_date'  => date('Y-m-d H:i:s'),
          

        ]);

        $user_request->request_info()->create([

            'provider_id' => $request->provider_id,
            'car_id' => $request->car_id,
            'remaining_distance' => $request->remaining_distance,
            'accept_time'  => date('Y-m-d H:i:s'),
          
        ]);

        $user_request->request_status()->create([
            'status' => $request->status,

        ]);

        return response()->json(['status'=>"true"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    
        $request = UserRequest::with('request_info','request_status')->findOrFail($id);
   
        return response()->json(['data'=>$request,'status'=>'true']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
              // validate
              $validator = Validator::make($request->all(), [

                'booking_id' => 'required|integer|unique:request_statuses',
                'user_id' => 'required|numeric|exists:users,id',
                'type' => 'required|max:225',
                'payment_mode' => 'required|max:225',
                'provider_id'  => 'required|integer',
                'car_id'       => 'required|integer',
                'remaining_distance' => 'required|numeric',
                'status'      => 'required|in:searching,onboard,completed',
    
            ]);
    
             $requests= UserRequest::findorfail($id);
    
             //if id or validation failed , process failed.
             if ($requests==null || $validator->fails())
             {
                 return response()->json(['status'=>"false"]);
    
             }
             //if not failed update is done .
             $requests->update([
                'booking_id' => $request->booking_id,
                'user_id' => $request->user_id,
                'type' => $request->type,
                'payment_mode' => $request->payment_mode,
                'create_date'  => date('Y-m-d H:i:s'),
    
            ]);
            $requests->request_info->update(
                [
                    'provider_id' => $request->provider_id,
                    'car_id' => $request->car_id,
                    'remaining_distance' => $request->remaining_distance,
                    'accept_time'  => date('Y-m-d H:i:s'),
                ]
                );
             $requests->request_status->update(
                 [
                    'status' => $request->status,

                 ]
                 );
            return response()->json(['status'=>"true"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $requests = UserRequest::find($id);

        $requestinfo=DB::table('request_infos')
                    ->where('user_request_id',$id)
                    ->first();


        $requeststatus=DB::table('request_statuses')
                       ->where('user_request_id',$id)
                       ->first();
        //if id not found, fail the operation.
        if ($requests==null || $requestinfo == null || $requeststatus==null)
        {
            return response()->json(['Message'=> "Data Not Found",'status'=>"false"]);
        }
        //if found then operation is succeeded
        $info_id=$requestinfo->id;
        $status_id=$requeststatus->id;

        $requests->delete();
        $info=RequestInfo::find($info_id);
        $status=RequestStatus::find($status_id);

        $info->delete();
        $status->delete();


        return response()->json(['status'=>"true"]);
    }
}
