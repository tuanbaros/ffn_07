<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PlayersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('players')->insert([
            'name' => 'Ronando',
            'introduction' => 'La cau thu noi tieng',
            'position_id' => 1,
            'birthday' => Carbon::createFromFormat('Y-m-d', '1989-05-21'),
            'avatar' => '',
            'team_id' => 1,
            'country_id' => 1
        ]);

        foreach (range(1, 10) as $index) {
            DB::table('players')->insert([
                'name' => str_random(10),
                'introduction' => str_random(20),
                'position_id' => 2,
                'birthday' => Carbon::createFromFormat('Y-m-d', '1990-11-21'),
                'avatar' => '',
                'team_id' => 2,
                'country_id' => 2
            ]);
        }

        DB::table('players')->insert([
            'name' => 'Nguyen Thanh Tuan',
            'introduction' => 'La cau thu noi tieng',
            'position_id' => 2,
            'birthday' => Carbon::createFromFormat('Y-m-d', '1994-05-21'),
            'avatar' => '',
            'team_id' => 3,
            'country_id' => 2
        ]);
    }
}
