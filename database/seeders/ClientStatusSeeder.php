<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class ClientStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('client_account_statuses')->insert([
            'user_id'=> 2,
            'status' =>"blocked",
            'comment' => "Client Blocked"
          

        ]
        );
    }
}
