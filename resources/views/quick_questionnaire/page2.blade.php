@extends('layout.app')

@section('title') {{' - Quick Calculator'}} @endsection <!-- Dynamic page tab title. -->

@section('styles') <link rel="stylesheet" href="<?= url('quick-questionnaire.css') ?>"> @endsection <!-- Dynamic page styles. -->

@section('content')
    <section class="w3-padding">

        <h1 class="w3-text-blue">Plastic Waste Quick Calculator</h1><br>

        <section class="w3-padding">
            <!-- Logic for listing relevant categories that matches question 1 selected choice. -->
            <?php foreach($quick_choices as $quick_choice): ?>
                <?php if($quick_choice->quick_question_id == 2 && $segmentURL == $quick_choice->choice_category): ?>
                    <h2><?= $quick_choice->choice ?></h2> <!-- Room category names for plastic products. Ex. Kitchen, Restroom, Office. -->
                    <?php foreach($plastic_products as $plastic): ?>
                        <?php if($plastic->category == $quick_choice->choice): ?> <!-- If the category names match, then output respective plastic products. -->
                            <ul>
                                <li>
                                    <div class="w3-margin-bottom">
                                        <?php if($plastic->image): ?>
                                            <img src="<?= asset('storage/'.$plastic->image) ?>" height="200">
                                        <?php endif; ?>
                                    </div>
                                    <h3><?= $plastic->plastic_product_name ?></h3>
                                    <?= $plastic->description ?><br>
                                    <h4>Statistics:</h4>
                                    <?= $plastic->product_stat ?>
                                </li><hr><br>
                            </ul>
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