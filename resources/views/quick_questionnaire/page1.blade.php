@extends('layout.app')

@section('title') {{' - Quick Calculator'}} @endsection <!-- Dynamic page tab title. -->

@section('styles') <link rel="stylesheet" href="<?= url('quick-questionnaire.css') ?>"> @endsection <!-- Dynamic page styles. -->

@section('content')
    <section class="w3-padding">

        <h1 class="w3-text-blue">Plastic Waste Quick Calculator</h1>

        <section id="form">
			<form name="quickQuestionnaireForm" action="/quick-calculator/page2" method="POST">

                <fieldset id="q1_fieldset">
                    <!-- FIX: Display first question from quick_questions table. -->
                    <legend>Where do you want to reduce plastic waste? <?= $quick_questions->question ?></legend>
                    <!-- FIX: Display questions via Laravel loop from quick_choices table. -->
                    <p id="caption_question1">
                        <input type="radio" name="f__question1" id="in_home" value="home"/>
                        <label for="in_home">At my Home</label>
                        <br/>
                        <input type="radio" name="f__question1" id="in_workplace" value="workplace"/>
                        <label for="in_workplace">At my Workplace</label>
                        <br/>
                        <input type="radio" name="f__question1" id="in_travel" value="travel"/>
                        <label for="in_travel">While Travelling</label>
                        <br/>
                        <span id="choiceError"></span>
                    </p>
                </fieldset>
                
                <!-- FIX: Submit button links to second quick question on page2 via POST. -->
                <input type="submit" value="Next" />

			</form>
		</section>

        <hr>

        <br>
        <section>
            <!-- FIX: Implement PHP loop through quick_questionnaire->choices (where question_id = 1), similar to CMS List page. -->
            <?php foreach($quick_choices as $quick_choice): ?>
                <?php if($quick_choice->quick_question_id == 1): ?> <!-- Only show list of question1 choices: 'Home', 'Workplace', 'Travel'. -->
                    <a href="/quick-calculator/page2/<?= $quick_choice->slug ?>" class="w3-button w3-blue"><?= $quick_choice->choice ?></a>
                    <br>
                <?php endif; ?>
            <?php endforeach; ?>
        </section>
		

        <!-- <a href="/quick-calculator/page2">Next</a> -->

        <!--DELETE COOKIES: Delete after debug complete.-->
	    <!-- <p><input type="button" id="btnDel" value="Delete your Stored Information" /></p> -->


    </section>
@endsection

@section('scripts') <script src="<?= url('quick-calculator.js') ?>"></script> @endsection <!-- Page-specific scripts for Quick Calculator. -->