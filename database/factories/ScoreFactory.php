<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ScoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'score_title' => $this->faker->unique()->word(),
            'score_description' => $this->faker->unique()->sentence(),
            'score_value' => $this->faker->unique()->numberBetween(1,3),
        ];
    }
}
