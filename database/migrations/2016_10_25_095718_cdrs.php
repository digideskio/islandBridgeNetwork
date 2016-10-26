<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cdrs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cdrs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cust_id');
            $table->string('call_from',30);
            $table->string('call_to',30);
            $table->dateTime('call_start');
            $table->integer('call_duration');
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
        Schema::drop('cdrs');
    }
}
