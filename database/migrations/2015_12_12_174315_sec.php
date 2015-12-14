<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Sec extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::create('section',function(Blueprint $table){
            $table->increments('id');
            $table->integer('sec1')->default(0)->nullable();
            $table->integer('sec2')->default(0)->nullable();
            $table->integer('sec3')->default(0)->nullable();
            $table->integer('sec4')->default(0)->nullable();
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
        //
        Schema::drop('section');
    }
}
