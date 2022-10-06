<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Console/Admin Accounts/Add | EcoLife</title>

        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="/app.css">

        <script src="/app.js"></script>
        
    </head>
    <body>

        <header class="w3-padding">

            <h1 class="w3-text-red">Add Administrator Account</h1>

            <?= view('layout_console.header_console') ?>

            <!-- <?php if(Auth::check()): ?>
                You are logged in as <?= auth()->user()->f_name ?> <?= auth()->user()->l_name ?> | 
                <a href="/console/logout">Log Out</a> | 
                <a href="/console/dashboard">Dashboard</a> | 
                <a href="/">Website Home Page</a>
            <?php else: ?>
                <a href="/">Return to Website Home Page</a>
            <?php endif; ?> -->

        </header>

        <hr>

        <section class="w3-padding">

            <h2>Add Administrator Account</h2>

            <form method="post" action="/console/admins/add" novalidate class="w3-margin-bottom">

                <?= csrf_field() ?>

                <div class="w3-margin-bottom">
                    <label for="f_name">First Name:</label>
                    <input type="text" name="f_name" id="f_name" value="<?= old('f_name') ?>" required>
                    
                    <?php if($errors->first('f_name')): ?>
                        <br>
                        <span class="w3-text-red"><?= $errors->first('f_name'); ?></span>
                    <?php endif; ?>
                </div>

                <div class="w3-margin-bottom">
                    <label for="l_name">Last Name:</label>
                    <input type="text" name="l_name" id="l_name" value="<?= old('l_name') ?>" required>

                    <?php if($errors->first('l_name')): ?>
                        <br>
                        <span class="w3-text-red"><?= $errors->first('l_name'); ?></span>
                    <?php endif; ?>
                </div>

                <div class="w3-margin-bottom">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" value="<?= old('email') ?>" required>

                    <?php if($errors->first('email')): ?>
                        <br>
                        <span class="w3-text-red"><?= $errors->first('email'); ?></span>
                    <?php endif; ?>
                </div>

                <div class="w3-margin-bottom">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password">

                    <?php if($errors->first('password')): ?>
                        <br>
                        <span class="w3-text-red"><?= $errors->first('password'); ?></span>
                    <?php endif; ?>
                </div>

                <button type="submit" class="w3-button w3-green">Add Administrator Account</button>

            </form>

            <a href="/console/admins/list">Back to Admin Accounts List</a>

        </section>

    </body>
</html>