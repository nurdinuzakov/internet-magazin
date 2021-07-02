<?php


namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSizesSeeder extends Seeder
{
    public function run()
    {
        $sizes = [
            ['size' => 'XS'],
            ['size' => 'S'],
            ['size' => 'M'],
            ['size' => 'L'],
            ['size' => 'XL'],
            ['size' => 'XXL'],
        ];

        foreach ($sizes as $size){
            DB::table('product_sizes')->insert([
                $size
            ]);
        }
    }
}
