<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->unique()->words($nb=4,$asText=true);
        $slug = Str::slug($name);
        return [
            'name' => $name,
            'slug' => $slug,
            'content'=> $this->faker->text(200),
            'price' => $this->faker->numberBetween(10000,50000),
            'feature_image_path' => '/storage/product/2/C3xRXDjVQnw05mPYmIPt.png',
            'status' => 1,
            'category_id' => $this->faker->numberBetween(1,7),
            'user_id' => 2,
            'feature_image_name' => '1615566754-h710-black-black-mainw-system.png'
        ];
    }
}
