<?php

use Illuminate\Database\Seeder;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $faker = Faker\Factory::create();
        for ($j = 1; $j < 10; $j++) { 
            for ($i = 1; $i <= 5; $i++) { 
                DB::table('news')->insert([
                    'title' => $faker->sentence($nbWords = 6),
                    'title_image' => 'http://image.24h.com.vn/upload/4-2016/images/2016-11-19/1479572365-3a8b6f7f00000578-3952308-image-m-86_1479564160520-500.jpg',
                    'description' => $faker->paragraph($nbSentences = 2),
                    'content' => $faker->paragraph($nb = 60),
                    'cate_id' => $j,
                    'country_id' => $i,
                    'created_at' => date('d-m-Y'),
                    'updated_at' => date('d-m-Y'),
                ]);
            }
        }
    }
}
