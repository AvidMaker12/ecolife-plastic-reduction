<?php

namespace Database\Factories;

use App\Models\QuickQuestion;
use App\Models\QuickChoice;
use App\Models\ClientAccount;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuickAnswerFactory extends Factory
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
            'quick_choice_id' => QuickChoice::all()->random(),
            'client_account_id' => ClientAccount::all()->random(),
        ];
    }
}
