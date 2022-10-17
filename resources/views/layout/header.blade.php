<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{config('app.name', 'Laravel')}} @yield('title')</title>
    <!-- <title>EcoLife Plastic Waste Reduction App</title> -->

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="<?= url('app.css') ?>">
    @yield('styles')

    <script src="<?= url('app.js') ?>"></script>
</head>

<body>
    <header class="w3-padding w3-dark-gray">
        <!-- HOME BUTTON -->
        <!-- NOTE: Add Logo Home page button. -->
        <a href="/" class="w3-button w3-blue"><b>E</b></a>
        
        <!-- ABOUT LINK -->
        <!-- NOTE: Add top navigation links. -->
        <a href="/about">About</a>

        <!-- NOTE: Fix client user sign-in nav links logic. -->
        <?php if(Auth::check()): ?>
            <?= auth()->user()->f_name ?> <?= auth()->user()->l_name ?> | 
            <a href="/logout">Log Out</a> | 
            <a href="/dashboard">Account</a>
        <?php else: ?>
            <a href="/login">Login</a>
            <a href="/register">Sign Up</a>
        <?php endif; ?>

    </header>

    <hr>
