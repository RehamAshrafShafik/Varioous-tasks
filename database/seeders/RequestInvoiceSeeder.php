<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class RequestInvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('request_invoices')->insert([
            'request_finished_id'=> 1,
            'minutes_cost' =>22,
            'company_commision'  =>8788,
            'start_amount' => 38,
            'promocode_used' => "38a6hs67j",
            'pdf'  => "hwm",
            'create_date' => date('Y-m-d H:i:s'),

        ]
        );
    }
}
