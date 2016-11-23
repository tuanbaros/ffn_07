<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class LeagueSeasonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('league_seasons')->insert([
            [
                'year' => 1990,
                'league_id' => 1,
                'created_at' => Carbon::createFromFormat('Y-m-d H', '2016-11-21 13')
            ],
            [
                'year' => 1991,
                'league_id' => 2,
                'created_at' => Carbon::createFromFormat('Y-m-d H', '2016-11-21 13')
            ]
        ]);
    }
}
