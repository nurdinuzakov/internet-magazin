<?php

namespace Database\Factories;

use App\Models\products;
use Illuminate\Database\Eloquent\Factories\Factory;
use Psy\Util\Str;

class ProductsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Products::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $images = [
            '/images/electronic-products/iphone12.jpg',
            '/images/home/mylomoyushie.jpg',
            '/images/food-products/frima.jpg',
            '/images/electronic-products/poco.jpg'
        ];
        return [
            'supplier_id'=>null,
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'category_id' => $this->faker->numberBetween(1,6),
            'size_id' => $this->faker->numberBetween(1,6),
            'color_id' => $this->faker->numberBetween(1,11),
            'subcategory_id' => $this->faker->numberBetween(1,30),
            'quantity' => $this->faker->numberBetween(1, 10),
            'price' => $this->faker->numberBetween(100, 600),
            'images' => $this->faker->randomElement($images),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];
    }
}
