<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'f_name'=> "admin",
            'l_name'=> "Ashraf",
            'mobile'=> "0126373883",
            'email'=> "admin@admin.com",
            'password' =>Hash::make('12345678'),

            'gender'=> "male",
          
        ]);
        DB::table('user_passwords')->insert([
            'user_id'=> "1",
            'password'=> "12345678",

            
          
        ]);
    }
}
