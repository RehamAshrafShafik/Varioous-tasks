<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestFinishedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_finisheds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('request_arrived_info_id');
            $table->double('picked_latitude');
            $table->double('picked_longitude');
            $table->timestamp('start_time');
            $table->timestamp('end_time')->nullable();

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
        Schema::dropIfExists('request_finisheds');
    }
}
