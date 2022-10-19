<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Models\QuestionnaireQuestion;
use App\Models\QuestionnaireChoice;
use App\Models\User;

class QuestionnaireController extends Controller
{
    //

    public function list()
    {  
        return view('questionnaire.list', [
            'questionnaire_questions' => QuestionnaireQuestion::all(), // Populate page with data from table 'questionnaire_questions' by storing data in array 'questionnaire_questions', which retreives data from model 'QuestionnaireQuestion' fetch all().
            'questionnaire_choices' => QuestionnaireChoice::all() // Populate page with data from table 'questionnaire_choices' by storing data in array 'questionnaire_choices', which retreives data from model 'QuestionnaireChoice' fetch all().
        ]);
    }

    public function addForm()
    {
        return view('questionnaire.add', [
            'users' => User::all(),
            'questionnaire_questions' => QuestionnaireQuestion::all(), // Populate page with data from table 'questionnaire_questions' by storing data in array 'questionnaire_questions', which retreives data from model 'QuestionnaireQuestion' fetch all().
            'questionnaire_choices' => QuestionnaireChoice::all() // Populate page with data from table 'questionnaire_choices' by storing data in array 'questionnaire_choices', which retreives data from model 'QuestionnaireChoice' fetch all().
        ]);
    }
    
    public function add()
    {

        $attributes = request()->validate([
            'question' => 'required',
            'choice' => 'required',
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $path = request()->file('icon')->store('questionnaire_choices', 's3');

        $questionnaire_question = new QuestionnaireQuestion();
        $questionnaire_question->question = $attributes['question'];
        $questionnaire_question->save();

        $questionnaire_choice = new QuestionnaireChoice();
        $questionnaire_choice->choice = $attributes['choice'];
        $questionnaire_choice->icon = Storage::disk('s3')->url($path);
        $questionnaire_choice->user_id = Auth::user()->id;
        $questionnaire_choice->save();

        return redirect('/console/questionnaire/list')
            ->with('message', 'Successfully Added to Questionnaire.');
    }

    // public function editForm(QuestionnaireQuestion $questionnaire_question, QuestionnaireChoice $questionnaire_choice) // Data from models will be placed in $ variables.
    // {
    //     return view('questionnaire.edit', [
    //         'users' => User::all(),
    //         'questionnaire_question' => $questionnaire_question, // Additional parameter is to pre-populate edit form. Left text is variable to be used in view page; right text is the model data.
    //         'questionnaire_choice' => $questionnaire_choice, // Additional parameter is to pre-populate edit form. Left text is variable to be used in view page; right text is the model data.
    //     ]);
    // }

    // public function edit(QuestionnaireQuestion $questionnaire_question, QuestionnaireChoice $questionnaire_choice)
    // {

    //     $attributes = request()->validate([
    //         'question' => 'required',
    //         'choice' => 'required',
    //         'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //     ]);

    //     $questionnaire_question->question = $attributes['question'];
    //     $questionnaire_question->save();

    //     $questionnaire_choice->choice = $attributes['choice'];
    //     $questionnaire_choice->icon = Storage::disk('s3')->url($path);
    //     $questionnaire_choice->save();

    //     return redirect('/console/questionnaire/list')
    //         ->with('message', 'Questionnaire has been edited.');
    // }

    public function editForm(QuestionnaireChoice $questionnaire) // Data from models will be placed in $ variables.
    {
        return view('questionnaire.edit', [
            'users' => User::all(),
            'questionnaire_choice' => $questionnaire, // Additional parameter is to pre-populate edit form. Left text is variable to be used in view page; right text is the model data.
        ]);
    }

    // public function edit(QuestionnaireChoice $questionnaire)
    // {

    //     $attributes = request()->validate([
    //         'question' => 'required',
    //         'choice' => 'required',
    //         'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //     ]);

    //     $questionnaire->question = $attributes['question'];
    //     //$questionnaire->save();

    //     $questionnaire->choice = $attributes['choice'];
    //     $questionnaire->icon = Storage::disk('s3')->url($path);
    //     $questionnaire->save();

    //     return redirect('/console/questionnaire/list')
    //         ->with('message', 'Questionnaire has been edited.');
    // }


    public function page1Form(QuestionnaireQuestion $questionnaire_questions)
    {
        return view('quick_questionnaire.page1', [
            'questionnaire_questions' => $questionnaire_questions, // Populate page with data from table 'questionnaire_questions' by storing data in array 'questionnaire_questions', which retreives data from model 'QuestionnaireQuestion' fetch all().
            'questionnaire_choices' => QuestionnaireChoice::all() // Populate page with data from table 'questionnaire_choices' by storing data in array 'questionnaire_choices', which retreives data from model 'QuestionnaireChoice' fetch all().
        ]);
    }

    public function page1(QuestionnaireQuestion $questionnaire_questions)
    {  
        return view('quick_questionnaire.page2', [
            'questionnaire_questions' => $questionnaire_questions,
        ]);

        // return redirect('/quick_questionnaire/page2');
    }

    public function page2Form(QuestionnaireQuestion $questionnaire_questions)
    {
        return view('quick_questionnaire.page2', [
            'questionnaire_questions' => $questionnaire_questions, // Populate page with data from table 'questionnaire_questions' by storing data in array 'questionnaire_questions', which retreives data from model 'QuestionnaireQuestion' fetch all().
            'questionnaire_choices' => QuestionnaireChoice::all() // Populate page with data from table 'questionnaire_choices' by storing data in array 'questionnaire_choices', which retreives data from model 'QuestionnaireChoice' fetch all().
        ]);
    }

    public function page2(QuestionnaireQuestion $questionnaire_questions)
    {  
        return view('quick_questionnaire.results', [
            'questionnaire_questions' => $questionnaire_questions,
        ]);
    }





}
