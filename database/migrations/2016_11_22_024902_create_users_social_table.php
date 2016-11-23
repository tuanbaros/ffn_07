<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersSocialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function ($table) {
            $table->string('email')->nullable()->change();
            $table->string('facebook_id')->unique()->nullable();
            $table->string('google_id')->unique()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function($table){
            $table->string('email')->nullable(false)->change();
            $table->dropColumn(['facebook_id', 'google_id']);
        });
    }
}
