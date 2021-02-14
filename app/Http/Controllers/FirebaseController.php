<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use App\Models\MapTest;
use Mapper;

class FirebaseController extends Controller
{
    public $service; 
    public function __construct(ServiceAccount $service){
        $this->service = $service;
    }



    public function index(){
        Mapper::map(53.381128999999990000, -1.470085000000040000,['markers' => ['title' => 'My Location', 'animation' => 'DROP']]);

        return view('realtime');
    }

    public function fire(Request $request){
        
            $loc=$request->xy;
            // dd($location);
            // $map=Mapper::streetview($loc[0], $loc[1],1, 1, ['ui' => false]);
            MapTest::create([
                'latitude' => $loc[0],
                'longitude' => $loc[1],      
                      ]);
             return response()->json($loc);

           
    }
    public function map()
    {
       
         $loc= MapTest::orderBy('id', 'desc')->first();
            // Mapper::map($loc->latitude, $loc->longitude,['markers' => ['title' => 'My Location', 'animation' => 'DROP']]);

        
        
        // Mapper::map(53.381128999999990000, -1.470085000000040000,['markers' => ['title' => 'My Location', 'animation' => 'DROP']]);
        
    
        return view('map');
    }
}
