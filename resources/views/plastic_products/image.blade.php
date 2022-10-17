<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Plastic Products | Console | EcoLife</title>

        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="/app.css">

        <script src="/app.js"></script>
        
    </head>
    <body>

        <header class="w3-padding">

            <h1 class="w3-text-red">Plastic Products Dashboard</h1>

            <?php if(Auth::check()): ?>
                You are logged in as <?= auth()->user()->f_name ?> <?= auth()->user()->l_name ?> | 
                <a href="/console/logout">Log Out</a> | 
                <a href="/console/dashboard">Dashboard</a> | 
                <a href="/">Website Home Page</a>
            <?php else: ?>
                <a href="/">Return to Website Home Page</a>
            <?php endif; ?>

        </header>

        <hr>

        <section class="w3-padding">

            <h2>Edit Plastic Product Image</h2>

            <div class="w3-margin-bottom">
                <?php if($plastic_product->image): ?>
                    <img src="<?= asset('storage/'.$plastic_product->image) ?>" width="200">
                <?php endif; ?>
            </div>

            <form method="post" action="/console/plastic-products/image/<?= $plastic_product->id ?>" novalidate class="w3-margin-bottom" enctype="multipart/form-data">

                <?= csrf_field() ?>

                <div class="w3-margin-bottom">
                    <label for="image">Image:</label>
                    <input type="file" name="image" id="image" value="<?= old('image') ?>" required>
                    
                    <?php if($errors->first('image')): ?>
                        <br>
                        <span class="w3-text-red"><?= $errors->first('image'); ?></span>
                    <?php endif; ?>
                </div>

                <button type="submit" class="w3-button w3-green">Add Image</button>

            </form>

            <a href="/console/plastic-products/list">Back to Plastic Product List</a>

        </section>

    </body>
</html>