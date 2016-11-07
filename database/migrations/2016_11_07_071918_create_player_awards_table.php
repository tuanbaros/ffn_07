<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayerAwardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_awards', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('player_id')->unsigned();
            $table->integer('league_season_id')->unsigned();
            $table->integer('match_id')->unsigned();
            $table->foreign('player_id')->references('id')->on('players');
            $table->foreign('league_season_id')->references('id')->on('league_seasons');
            $table->foreign('match_id')->references('id')->on('matches');
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
        Schema::drop('player_awards');
    }
}
