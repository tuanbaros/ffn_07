<?php

use Illuminate\Database\Seeder;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teams')->insert([
            [
                'name' => 'MU',
                'introduction' => 'La doi bong noi tieng',
                'logo' => '',
                'country_id' => 1
            ],
            [
                'name' => 'Hai Duong',
                'introduction' => 'La doi bong noi tieng',
                'logo' => '',
                'country_id' => 2
            ],
            [
                'name' => 'Hai Phong',
                'introduction' => 'La doi bong noi tieng',
                'logo' => '',
                'country_id' => 2
            ]
        ]);
    }
}
