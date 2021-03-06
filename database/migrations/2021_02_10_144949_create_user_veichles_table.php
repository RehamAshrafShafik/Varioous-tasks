<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserVeichlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_veichle', function (Blueprint $table) {
            $table->id();
            $table->foreignId('veichle_id');
            $table->foreignId('user_id');
            $table->enum('status',['active','non active'])->default('non active');
            $table->timestamps();
            $table->unique(['veichle_id', 'user_id']);

        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_veichles');
    }
}
