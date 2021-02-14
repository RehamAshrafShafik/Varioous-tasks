<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestArrivedInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_arrived_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('request_info_id');
            $table->double('arrived_current_distance');
            $table->double('passenger_count');

            $table->timestamp('arrived_time');
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
        Schema::dropIfExists('request_arrived_infos');
    }
}
