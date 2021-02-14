<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class RequestStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('request_statuses')->insert([
            'user_request_id'=> 1,
            'status' =>"Done",
          

        ]
        );
    }
}
