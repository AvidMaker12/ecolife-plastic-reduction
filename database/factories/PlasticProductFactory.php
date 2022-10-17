<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlasticProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // Notes: No columns related to 'id', 'images', 'timestamps' are listed here.
            'plastic_product_name' => $this->faker->unique()->word(),
            'category' => $this->faker->word(),
            'description' => $this->faker->unique()->sentence(),
            'product_stat' => $this->faker->unique()->sentence(),
            'user_id' => User::all()->random(),
            //'icon' => $this->faker->image('public/storage/icons',300,300,null,false),
            //'image' => $this->faker->image('public/storage/images',800,800,null,false),
        ];
    }
}
