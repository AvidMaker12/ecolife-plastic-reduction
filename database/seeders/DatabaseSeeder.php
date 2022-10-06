<?php

namespace Database\Seeders;

use App\Models\ClientAccount;
use App\Models\User;
use App\Models\Type;
use App\Models\Project;
use App\Models\PlasticProduct;
use App\Models\ClientStatistic;
use App\Models\Score;
use App\Models\QuestionnaireQuestion;
use App\Models\QuestionnaireChoice;
use App\Models\QuestionnaireAnswer;
use App\Models\QuickQuestion;
use App\Models\QuickChoice;
use App\Models\QuickAnswer;
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

        // Empty tables upon 'migrate refresh' command to prevent continuously adding to seeded data. //
        User::truncate();
        Type::truncate();
        Project::truncate();                // Table foreign keys connections: types, users

        Score::truncate();
        ClientAccount::truncate();          // Table foreign keys connections: scores
        PlasticProduct::truncate();         // Table foreign keys connections: users

        QuestionnaireQuestion::truncate();  // Table foreign keys connections: users
        QuestionnaireChoice::truncate();    // Table foreign keys connections: questionnaire_questions, users
        QuestionnaireAnswer::truncate();    // Table foreign keys connections: quesitonnaire_quesitons, questionnaire_choice, client_accounts

        QuickQuestion::truncate();          // Table foreign keys connections: users
        QuickChoice::truncate();            // Table foreign keys connections: quick_questions, users
        QuickAnswer::truncate();            // Table foreign keys connections: quick_questions, quick_choices, client_accounts
        


        // Seed data to tables. //
        /* NOTE: Ensure order of listed tables below are such that foreign key dependencies are positioned further below.
         * Example: 'client_accounts' table has foreign key data from 'scores' table, therefore 'scores' table is listed first above 'client_accounts' table.
        */
        
        User::factory()->count(2)->create();
        Type::factory()->count(3)->create();
        Project::factory()->count(4)->create();                 // Table foreign keys connections: types, users

        Score::factory()->count(3)->create();
        ClientAccount::factory()->count(2)->create();           // Table foreign keys connections: scores
        PlasticProduct::factory()->count(4)->create();          // Table foreign keys connections: users
        
        QuestionnaireQuestion::factory()->count(3)->create();   // Table foreign keys connections: users
        QuestionnaireChoice::factory()->count(3)->create();     // Table foreign keys connections: questionnaire_questions, users
        QuestionnaireAnswer::factory()->count(3)->create();     // Table foreign keys connections: quesitonnaire_quesitons, questionnaire_choice, client_accounts
        
        QuickQuestion::factory()->count(3)->create();           // Table foreign keys connections: users
        QuickChoice::factory()->count(3)->create();             // Table foreign keys connections: quick_questions, users
        QuickAnswer::factory()->count(3)->create();             // Table foreign keys connections: quick_questions, quick_choices, client_accounts
            
    }
}
