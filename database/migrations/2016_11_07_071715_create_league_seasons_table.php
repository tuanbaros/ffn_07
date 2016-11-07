<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeagueSeasonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('league_seasons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('year');
            $table->integer('league_id')->unsigned();
            $table->foreign('league_id')->references('id')->on('leagues');
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
        Schema::drop('league_seasons');
    }
}
