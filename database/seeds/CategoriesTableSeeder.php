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
        $categories = [
            [
                'name' => 'Cate1'
            ],
            [
                'name' => 'Cate2'
            ],
            [
                'name' => 'Cate3'
            ],
            [
                'name' => 'Cate4'
            ],
            [
                'name' => 'Cate5'
            ],
        ];
        \Illuminate\Support\Facades\DB::table('categories')->insert($categories);
    }
}
