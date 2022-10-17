<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionnaireQuestionFactory extends Factory
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
            'question' => $this->faker->unique()->sentence(),
            'user_id' => User::all()->random(),
        ];
    }
}
