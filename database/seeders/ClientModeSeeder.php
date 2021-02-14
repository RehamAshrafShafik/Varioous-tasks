<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ClientModeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('client_modes')->insert([
            'user_id'=> 2,
            'status' =>"offline",
          

        ]
        );
    }
}
