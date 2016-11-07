<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ranks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('won');
            $table->integer('drawn');
            $table->integer('lost');
            $table->integer('gd');
            $table->integer('score');
            $table->integer('team_id')->unsigned();
            $table->integer('league_season_id')->unsigned();
            $table->foreign('team_id')->references('id')->on('teams');
            $table->foreign('league_season_id')->references('id')->on('league_seasons');
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
        Schema::drop('ranks');
    }
}
