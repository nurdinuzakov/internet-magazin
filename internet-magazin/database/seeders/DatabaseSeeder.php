<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CategorySeeder::class,
            SubcategoriesSeeders::class,
            ProductsSeeder::class,
//            ProductColorsSeeder::class,
//            ProductSizesSeeder::class,
//            Variants::class,
//            ImageSeeder::class
        ]);
    }
}
