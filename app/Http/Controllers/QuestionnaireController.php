<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Models\QuestionnaireQuestion;
use App\Models\QuestionnaireChoice;
use App\Models\QuickQuestion;
use App\Models\QuickChoice;
use App\Models\PlasticProduct;
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

    public function quickQuestion1() // Pass in 'quick_questions' id via 'quick_questions' variable.
    {
        return view('quick_questionnaire.page1', [
            'quick_questions' => QuickQuestion::all(), // Populate page with data from table 'quick_questions' by storing data in array 'quick_questions', which retreives data from model 'QuickQuestion' fetch all().
            'quick_choices' => QuickChoice::all(), // Populate page with data from table 'quick_choices' by storing data in array 'quick_choices', which retreives data from model 'QuickChoice' fetch all().
            'segmentURL' => \Request::segment(2)
        ]);
    }

    // public function quickQuestion2(QuickChoice $quick_choices)
    // {
    //     return view('quick_questionnaire.page2', [
    //         'quick_choices' => $quick_choices, // Populate page with data from table 'quick_choices' by storing data in array 'quick_choices', which retreives data from model 'QuickChoice' fetch all(), which was passed in through the public function parameters.
    //         'quick_questions' => QuickQuestion::all(), // Populate page with data from table 'quick_questions' by storing data in array 'quick_questions', which retreives data from model 'QuickQuestion' fetch all().
    //         'plastic_products' => PlasticProduct::all() // Populate page with data from table 'plastic_products' by storing data in array 'plastic_products', which retreives data from model 'PlasticProduct' fetch all().
    //     ]);
    // }
    public function quickQuestion2(QuickQuestion $quick_questions)
    {
        return view('quick_questionnaire.page2', [
            'quick_questions' => $quick_questions, // Populate page with data from table 'quick_questions' by storing data in array 'quick_questions', which retreives data from model 'QuickQuestion' fetch all().
            'quick_choices' => QuickChoice::all(), // Populate page with data from table 'quick_choices' by storing data in array 'quick_choices', which retreives data from model 'QuickChoice' fetch all().
            'plastic_products' => PlasticProduct::all(), // Populate page with data from table 'plastic_products' by storing data in array 'plastic_products', which retreives data from model 'PlasticProduct' fetch all().
            'segmentURL' => \Request::segment(3)
        ]);
    }

    public function currentURL(Request $request)
    {         
        $currentURL = $request->fullUrl(); // Show full current URL with parameters.
        // $currentURL = \URL::full(); // Show full current URL with parameters.
        // $currentURL = \Request::fullUrl(); // Show full current URL with parameters.

        // $segment = \Request::segment(1);
        // $segment = $request->segment(1);
    }






}
