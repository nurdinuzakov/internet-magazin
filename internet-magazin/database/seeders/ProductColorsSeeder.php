<?php


namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductColorsSeeder extends Seeder
{
    public function run()
    {
        $colors = [
            ['color' => 'Белый'],
            ['color' => 'Черный'],
            ['color' => 'Красный'],
            ['color' => 'Оранжевый'],
            ['color' => 'Желтый'],
            ['color' => 'Зеленый'],
            ['color' => 'Салатовый'],
            ['color' => 'Синий'],
            ['color' => 'Фиолетовый'],
            ['color' => 'Красный'],
            ['color' => 'Голубой']

        ];

        foreach ($colors as $color){
            DB::table('product_colors')->insert([
                $color
            ]);
        }
    }
}
