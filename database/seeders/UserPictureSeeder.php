<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class UserPictureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_pictures')->insert([
            'user_id'=> 1,
            'picture'=> "https://th.bing.com/th/id/R6b0022312d41080436c52da571d5c697?rik=ejx13G9ZroRrcg&riu=http%3a%2f%2fpluspng.com%2fimg-png%2fuser-png-icon-young-user-icon-2400.png&ehk=NNF6zZUBr0n5i%2fx0Bh3AMRDRDrzslPXB0ANabkkPyv0%3d&risl=&pid=ImgRaw",
         
           
        ]);
 
    }
}
