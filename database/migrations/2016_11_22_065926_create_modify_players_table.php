<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModifyPlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('players', function($table) {
            $table->dropColumn('position');
        });

        Schema::table('players', function ($table) {
            $table->integer('position_id')->after('introduction')->unsigned();
            $table->foreign('position_id')->references('id')->on('positions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('players', function($table) {
            $table->string('position');
        });

        Schema::table('players', function ($table) {
            $table->dropForeign('players_position_id_foreign');
            $table->dropColumn('position_id');
        });
    }
}
