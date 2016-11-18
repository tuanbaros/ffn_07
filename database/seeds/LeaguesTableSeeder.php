<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class LeaguesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('leagues')->insert([
            [
                'name' => 'Champion League',
                'country_id' => 1,
                'created_at' => Carbon::createFromFormat('Y-m-d H', '2016-11-21 13')
            ],
            [
                'name' => 'Ha Noi League',
                'country_id' => 2,
                'created_at' => Carbon::createFromFormat('Y-m-d H', '2016-11-21 13')
            ],
            [
                'name' => 'Hai Phong League',
                'country_id' => 2,
                'created_at' => Carbon::createFromFormat('Y-m-d H', '2016-11-21 13')
            ]
        ]);
    }
}
