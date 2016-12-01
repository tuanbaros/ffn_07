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
        $country = [
            'Anh',
            'Phap',
            'Duc',
            'Y',    
            'Tay Ban Nha',
        ];

        for ($i = 0; $i < count($country); $i++) { 
            DB::table('countries')->insert([
                'name' => $country[$i],
                'code' => $i,
            ]);
        }
    }
}
