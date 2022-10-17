@extends('layout.app')

@section('title') {{' - Home'}} @endsection <!-- Dynamic page tab title. -->

@section('content')
    <section class="w3-padding">
        <!-- SITE WELCOME TITLE -->
        <h1 class="w3-text-blue w3-center">EcoLife Plastic Reduction</h1>
        <!-- SLOGAN -->
        <p class="w3-center">The simple web app that helps reduce everyday plastic use.</p>

        <div class="w3-center">
        <a href="/quick-calculator/page1" class="w3-button w3-green">Start Plastic Waste Calculator</a>
        </div>

    </section>

    <hr>
@endsection

