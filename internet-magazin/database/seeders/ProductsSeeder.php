<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Image;
use App\Models\Subcategory;
use Database\Factories\ProductsFactory;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Products;
class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $images = [
            '/images/electronic-products/iphone12.jpg',
            '/images/home/mylomoyushie.jpg',
            '/images/food-products/frima.jpg',
            '/images/electronic-products/poco.jpg'
        ];
        $image = [
            '/images/random-images/1.jpg',
            '/images/random-images/2.jpg',
            '/images/random-images/3.jpg',
            '/images/random-images/4.jpg',
            '/images/random-images/5.jpg',
            '/images/random-images/6.jpg',
            '/images/random-images/7.jpg',
            '/images/random-images/8.jpg',
            '/images/random-images/9.jpg',
            '/images/random-images/10.jpg',
        ];
        $faker = Factory::create();

        $category_ids = Subcategory::pluck('id');

        for ($i = 0; $i < 30; $i++) {
            $product = Products::create([
                'name' => $faker->name(),
                'description' => $faker->text(),
                'subcategory_id' => $faker->randomElement($category_ids),
                'quantity' => $faker->numberBetween(1, 10),
                'price' => $faker->numberBetween(10, 600),
                'images' => $faker->randomElement($images),
            ]);

            for ($i = 0; $i <= rand(1, 9); $i++) {
                Image::create([
                    'product_id' => $product->id,
                    'url' => $faker->randomElement($image),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ]);
            }
        }
    }
}
