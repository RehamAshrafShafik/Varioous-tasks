<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class RequestArrivedInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('request_arrived_infos')->insert([
            'request_info_id'=> 4,
            'arrived_current_distance' =>22,
            'passenger_count'  =>7373,
            'arrived_time' => date('Y-m-d H:i:s'),

        ]
        );
    }
}
