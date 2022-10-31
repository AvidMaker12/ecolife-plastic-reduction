<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Log In | EcoLife</title>

        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="/app.css">

        <script src="/app.js"></script>
        
    </head>
    <body>

        <header class="w3-padding w3-center">

            <h1 class="w3-text-red">Log In</h1>

        </header>

        <section class="w3-padding w3-center">

            <form method="post" action="/login" novalidate>

                <?= csrf_field() ?>

                <div class="w3-margin-bottom">
                    <label for="email">Email Address:</label>
                    <input type="email" name="email" id="email" value="<?= old('email') ?>" required>
                    
                    <?php if($errors->first('email')): ?>
                        <br>
                        <span class="w3-text-red"><?= $errors->first('email'); ?></span>
                    <?php endif; ?>
                </div>

                <div class="w3-margin-bottom">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" required>

                    <?php if($errors->first('password')): ?>
                        <br>
                        <span class="w3-text-red"><?= $errors->first('password'); ?></span>
                    <?php endif; ?>
                </div>

                <button type="submit">Log In</button>

            </form>

            <br>
            <a href="/">Back to Home Page</a>

        </section>

    </body>

    <!-- FIX: Add custom footer. -->

    <!-- FIX: Add JS DOM form validation. -->

</html>


        