@extends('layout.app')

@section('title') {{' - Quick Calculator'}} @endsection <!-- Dynamic page tab title. -->

@section('styles') <link rel="stylesheet" href="<?= url('quick-questionnaire.css') ?>"> @endsection <!-- Dynamic page styles. -->

@section('content')
    <section class="w3-padding">

        <h1 class="w3-text-blue">Plastic Waste Quick Calculator</h1>

        <section>
            <!-- FIX: Implement PHP loop through quick_questionnaire->choices (where question_id = 1), similar to CMS List page. -->
            <?php foreach($quick_choices as $quick_choice): ?>
                <?php if($quick_choice->quick_question_id == 2): ?>
                    <h2><?= $quick_choice->choice ?></h2>
                    <br>
                    <?php foreach($plastic_products as $plastic): ?>
                        <?php if($plastic->category == $quick_choice->choice): ?> <!-- If the category names match, then output respective plastic products. -->
                            <?= $plastic->plastic_product_name ?><br>
                            <!-- Add JavaScript dropdown feature here to hide/display plastic product description. -->
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            <?php endforeach; ?>
        </section>
		
        <br>

        <a href="/quick-calculator/page1">Back</a>
        <a href="/quick-calculator/results">Next</a>

        <!--DELETE COOKIES: Delete after debug complete.-->
	    <!-- <p><input type="button" id="btnDel" value="Delete your Stored Information" /></p> -->


    </section>
@endsection

@section('scripts') <script src="<?= url('quick-calculator.js') ?>"></script> @endsection <!-- Page-specific scripts for Quick Calculator. -->