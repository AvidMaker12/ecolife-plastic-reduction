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

            <h2>Edit Plastic Product: <?= $plastic_product->plastic_product_name ?></h2>

            <form method="post" action="/console/plastic-products/edit/<?= $plastic_product->id ?>" novalidate class="w3-margin-bottom">

                <?= csrf_field() ?>

                <div class="w3-margin-bottom">
                    <label for="plastic_product_name">Plastic Product Name:</label>
                    <input type="plastic_product_name" name="plastic_product_name" id="plastic_product_name" value="<?= old('plastic_product_name', $plastic_product->plastic_product_name) ?>" required>
                    
                    <?php if($errors->first('plastic_product_name')): ?>
                        <br>
                        <span class="w3-text-red"><?= $errors->first('plastic_product_name'); ?></span>
                    <?php endif; ?>
                </div>

                <div class="w3-margin-bottom">
                    <label for="category">Category:</label>
                    <input type="category" name="category" id="category" value="<?= old('category', $plastic_product->category) ?>">

                    <?php if($errors->first('category')): ?>
                        <br>
                        <span class="w3-text-red"><?= $errors->first('category'); ?></span>
                    <?php endif; ?>
                </div>

                <div class="w3-margin-bottom">
                    <label for="description">Description:</label>
                    <textarea name="description" id="description" required><?= old('description', $plastic_product->description) ?></textarea>

                    <?php if($errors->first('description')): ?>
                        <br>
                        <span class="w3-text-red"><?= $errors->first('description'); ?></span>
                    <?php endif; ?>
                </div>

                <div class="w3-margin-bottom">
                    <label for="product_stat">Product Statistics:</label>
                    <textarea name="product_stat" id="product_stat" required><?= old('product_stat', $plastic_product->product_stat) ?></textarea>

                    <?php if($errors->first('product_stat')): ?>
                        <br>
                        <span class="w3-text-red"><?= $errors->first('product_stat'); ?></span>
                    <?php endif; ?>
                </div>

                <button type="submit" class="w3-button w3-green">Edit Plastic Product</button>

            </form>

            <a href="/console/plastic-products/list">Back to Plastic Product List</a>

        </section>

    </body>
</html>