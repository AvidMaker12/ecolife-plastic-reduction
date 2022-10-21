<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{config('app.name', 'Laravel')}} @yield('title')</title>
        <!--<title>Console | EcoLife</title>-->

        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="/app.css">

        <script src="/app.js"></script>
        
    </head>
    <body>

        <header class="w3-padding">

            <h1 class="w3-text-red">Console</h1>

            @if(Auth::check())
                You are logged in as {{ auth()->user()->f_name }} {{auth()->user()->l_name}} 
                <br>
                <div class="nav-console">
                    <a href="/console/logout">Log Out</a> | 
                    <a href="/console/dashboard">Dashboard</a> | 
                    <a href="/">Website Home Page</a>
                </div>
            @else:
                <a href="/">Return to Website Home Page</a>
            @endif

        </header>

        <hr>

        <!-- Page status messages.
             Example: "New Plastic Product has successfully been added." -->
        @if(session()->has('message'))
            <div class="w3-padding w3-margin-top w3-margin-bottom">
                <div class="w3-red w3-center w3-padding"><?= session()->get('message') ?></div>
            </div>
        @endif

        <!-- Dynamic content goes here via blade templating: -->
        @yield('content')

    </body>
</html>