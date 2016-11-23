<?php

use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert([
            [
                'name' => 'Anh',
                'code' => 34
            ],
            [
                'name' => 'Viet Nam',
                'code' => 84
            ]
        ]);
    }
}
