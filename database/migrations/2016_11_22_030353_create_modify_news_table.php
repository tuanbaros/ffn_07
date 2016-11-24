<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModifyNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('news', function ($table) {
            $table->longText('title_image')->after('title');
            $table->longText('content')->change();
            $table->integer('view_number')->after('content');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('news', function($table) {
            $table->dropColumn(['title_image', 'view_number']);
        });

        Schema::table('news', function($table) {
            $table->string('content')->change();
        });
    }
}
