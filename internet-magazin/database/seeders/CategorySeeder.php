<?php

namespace Database\Seeders;

use App\Models\Category;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $categories = [
            ['name' => 'Продукты питания',
                'description' => 'Основными продуктами питания является пища, представляющая собой доминирующую часть
                питания в данной популяции. Большинство людей питается весьма ограниченным количеством основных продуктов
                питания.[1]',
                'image' => '/images/home/food.png',
            ],
            ['name' => 'Мыломоющие',
                'description' => 'Моющие средства',
                'image' => '/images/home/mylomoyushie.jpg',
            ],
            ['name' => 'Одежда',
                'description' => $faker->sentence,
                'image' => '/images/home/odejda.jpg',
            ],
            ['name' => 'Электроника',
                'description' => $faker->sentence,
                'image' => '/images/home/electronika.jpeg',
            ],
            ['name' => 'Детские товары',
                'description' => $faker->sentence,
                'image' => '/images/home/detskie_tovary.jpg',
            ],
            ['name' => 'Обувь',
                'description' => $faker->sentence,
                'image' => '/images/home/obuv.jpg',
            ]

        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
