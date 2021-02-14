<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class RequestFinishedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('request_finisheds')->insert([
            'request_arrived_info_id'=> 1,
            'picked_latitude' =>22,
            'picked_longitude'  =>7373,
            'start_time' => date('Y-m-d H:i:s'),
            'end_time' => date('Y-m-d H:i:s'),

        ]
        );
    }
}
