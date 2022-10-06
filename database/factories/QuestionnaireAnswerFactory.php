<?php

namespace Database\Factories;

use App\Models\QuestionnaireQuestion;
use App\Models\QuestionnaireChoice;
use App\Models\ClientAccount;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionnaireAnswerFactory extends Factory
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
            'questionnaire_choice_id' => QuestionnaireChoice::all()->random(),
            'client_account_id' => ClientAccount::all()->random(),
        ];
    }
}
