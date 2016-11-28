<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
        $cate = [
	        'Ngoai hang anh',
	        'Chuyen Nhuong',
	        'World Cup',
	        'Champions League',
	        'Anh',
	        'Tay Ban Nha',
	        'Y',
	        'Viet Nam',
	        'Duc',
	    ];

        for ($i = 0; $i < count($cate); $i++) { 
            DB::table('categories')->insert([
                'name' => $cate[$i]
            ]);
        }
    }
}
