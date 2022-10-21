@extends('layout.app')

@section('title') {{' - Quick Calculator'}} @endsection <!-- Dynamic page tab title. -->

@section('styles') <link rel="stylesheet" href="<?= url('quick-questionnaire.css') ?>"> @endsection <!-- Dynamic page styles. -->

@section('content')
    <section class="w3-padding w3-center">

        <h1 class="w3-text-blue">Plastic Waste Quick Calculator</h1>

        <?php foreach($quick_questions as $quick_question): ?>
            <?php if($quick_question->id == 1): ?>
                <h2><?= $quick_question->question ?></h2>
            <?php endif; ?>
        <?php endforeach; ?>

        <section>
            <!-- FIX: Implement PHP loop through quick_questionnaire->choices (where question_id = 1), similar to CMS List page. -->
            <?php foreach($quick_choices as $quick_choice): ?>
                <?php if($quick_choice->quick_question_id == 1): ?> <!-- Only show list of question1 choices: 'Home', 'Workplace', 'Travel'. -->
                    <a href="/quick-calculator/page2/<?= $quick_choice->slug ?>" class="w3-button w3-blue"><?= $quick_choice->choice ?></a>
                    <br><br>
                <?php endif; ?>
            <?php endforeach; ?>
        </section>
		

        <!-- <a href="/quick-calculator/page2">Next</a> -->

        <!--DELETE COOKIES: Delete after debug complete.-->
	    <!-- <p><input type="button" id="btnDel" value="Delete your Stored Information" /></p> -->


    </section>
@endsection

@section('scripts') <script src="<?= url('quick-calculator.js') ?>"></script> @endsection <!-- Page-specific scripts for Quick Calculator. -->