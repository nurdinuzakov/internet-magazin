<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Subcategory;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubcategoriesSeeders extends Seeder
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
            '/images/home/mylomoyushie.jpg', '/images/food-products/frima.jpg',
            '/images/electronic-products/poco.jpg'
        ];

        $faker = Factory::create();
        $categories = Category::all();
        foreach ($categories as $category){
            Subcategory::create([
                'name' => $faker->name,
                'category_id' => $category->id,
                'description' => $faker->text(),
                'image' => $faker->randomElement($images),
            ]);
        }
    }
}
