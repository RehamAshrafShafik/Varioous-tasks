<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('request_finished_id');
            $table->double('minutes_cost');
            $table->double('company_commision');
            $table->double('start_amount');
            $table->string('promocode_used',191);
            $table->string('pdf',191);

            $table->timestamp('create_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('request_invoices');
    }
}
