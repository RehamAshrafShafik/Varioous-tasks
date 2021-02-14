<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class RequestInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('request_infos')->insert([
            'user_request_id'=> 1,
            'provider_id' =>22,
            'car_id'  =>7373,
            'remaining_distance' => 200,
            'accept_time'  => date('Y-m-d H:i:s'),

        ]
        );
    }
}
