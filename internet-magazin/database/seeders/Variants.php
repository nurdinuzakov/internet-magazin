<?php


namespace Database\Seeders;


use App\Models\Category;
use App\Models\ProductColor;
use App\Models\Products;
use App\Models\ProductSize;
use App\Models\Subcategory;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class Variants extends Seeder
{
    public function run()
    {
        $images = [
            '/images/product-details/1.jpg',
            '/images/product-details/new.jpg',
            '/images/product-details/similar1.jpg',
            '/images/product-details/similar2.jpg',
            '/images/product-details/similar3.jpg.jpg',
        ];

        $faker = Factory::create();
        $products = Products::all();
//        $size = DB::table('product_sizes')->select('id')->get()->toArray();
//        $color = DB::table('product_colors')->select('id')->get()->toArray();


        foreach ($products as $product){
            for ($i=0; $i<3; $i++){
                DB::table('variants')->insert([
//                    'size_id' => $faker->randomElement($size),
//                    'color_id' => $faker->randomElement($color),
                    'price' => $faker->randomDigit,
                    'product_id' => $product->id,
                    'image_url'=> $faker->randomElement($images),
                    'quantity' => $faker->randomDigit,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ]);
            }
        }

    }
}
