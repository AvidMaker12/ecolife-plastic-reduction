<?php

namespace Database\Factories;

use App\Models\QuestionnaireQuestion;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionnaireChoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'questionnaire_question_id' => QuestionnaireQuestion::all()->random(),
            'answers' => $this->faker->sentence(),
            'user_id' => User::all()->random(),
        ];
    }
}
