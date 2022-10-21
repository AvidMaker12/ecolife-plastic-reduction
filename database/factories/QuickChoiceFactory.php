<?php

namespace Database\Factories;

use App\Models\QuickQuestion;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuickChoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'quick_question_id' => QuickQuestion::all()->random(),
            'choice' => $this->faker->sentence(),
            'choice_category' => $this->faker->word(),
            'slug' => $this->faker->slug,
            'user_id' => User::all()->random(),
        ];
    }
}
