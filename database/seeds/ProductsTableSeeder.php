<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [];
        $faker = Faker\Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $item = [
                'category_id' => rand(1,5),
                'name' => $faker->name,
                'image' => 'images/'. $faker->image($dir = 'public/images/products', $width = 640, $height = 480, 'cats', false),
                'price' => $faker->numberBetween($min = 1, $max = 50),
                'quantity' => $faker->numberBetween($min = 50, $max = 200),
            ];
            $products[] = $item;
        }
        DB::table('products')->insert($products);
    }
}
