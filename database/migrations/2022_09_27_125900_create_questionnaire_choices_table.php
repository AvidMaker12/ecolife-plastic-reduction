<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionnaireChoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionnaire_choices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('questionnaire_question_id');
            $table->string('choice');
            $table->string('icon')->nullable();
            $table->foreignId('user_id'); // Foreign key relationship links to other table via non-plural version of foreign table name followed by linking column name (usually 'id'), and separated by underscore. Example: 'type_id' links to 'types' table 'id' column.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questionnaire_choices');
    }
}
