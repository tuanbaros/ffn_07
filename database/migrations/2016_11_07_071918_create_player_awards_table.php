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
            $table->integer('player_id');
            $table->integer('league_season_id');
            $table->integer('match_id');
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
