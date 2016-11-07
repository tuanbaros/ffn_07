<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('team1_id');
            $table->integer('team2_id');
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->integer('team1_goal');
            $table->integer('team2_goal');
            $table->integer('league_season_id');
            $table->string('round');
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
        Schema::drop('matches');
    }
}
