@extends('layout_console.console-header-footer')

@section('content')

    <section class="w3-padding">

        <h2>Add to Plastic Products</h2>

        <form method="post" action="/console/plastic-products/add" novalidate class="w3-margin-bottom" enctype="multipart/form-data">

            <?= csrf_field() ?>

            <div class="w3-margin-bottom">
                <label for="plastic_product_name">Plastic Product Name:</label>
                <input type="text" name="plastic_product_name" id="plastic_product_name" value="<?= old('plastic_product_name') ?>" required>
                
                <?php if($errors->first('plastic_product_name')): ?>
                    <br>
                    <span class="w3-text-red"><?= $errors->first('plastic_product_name'); ?></span>
                <?php endif; ?>
            </div>

            <div class="w3-margin-bottom">
                <label for="category">Category:</label>
                <input type="text" name="category" id="category" value="<?= old('category') ?>">

                <?php if($errors->first('category')): ?>
                    <br>
                    <span class="w3-text-red"><?= $errors->first('category'); ?></span>
                <?php endif; ?>
            </div>
            
            <div class="w3-margin-bottom">
                <label for="description">Description:</label>
                <textarea name="description" cols="40" rows="3" id="description" value="<?= old('description') ?>"></textarea>

                <?php if($errors->first('description')): ?>
                    <br>
                    <span class="w3-text-red"><?= $errors->first('description'); ?></span>
                <?php endif; ?>
            </div>
            
            <div class="w3-margin-bottom">
                <label for="product_stat">Plastic Product Statistics:</label>
                <input type="text" name="product_stat" id="product_stat" value="<?= old('product_stat') ?>">

                <?php if($errors->first('product_stat')): ?>
                    <br>
                    <span class="w3-text-red"><?= $errors->first('product_stat'); ?></span>
                <?php endif; ?>
            </div>
            
            <div class="w3-margin-bottom">
                <label for="icon">Icon:</label>
                <input type="file" name="icon" id="icon" value="<?= old('icon') ?>" required>
                
                <?php if($errors->first('icon')): ?>
                    <br>
                    <span class="w3-text-red"><?= $errors->first('icon'); ?></span>
                <?php endif; ?>
            </div>

            <div class="w3-margin-bottom">
                <label for="image">Image:</label>
                <input type="file" name="image" id="image" value="<?= old('image') ?>" required>
                
                <?php if($errors->first('image')): ?>
                    <br>
                    <span class="w3-text-red"><?= $errors->first('image'); ?></span>
                <?php endif; ?>
            </div>

            <button type="submit" class="w3-button w3-green">Add to Plastic Products</button>

        </form>

        <a href="/console/plastic-products/list">Back to Plastic Products List</a>

    </section>

@endsection