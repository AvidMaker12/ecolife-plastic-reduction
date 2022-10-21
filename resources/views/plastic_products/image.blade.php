@extends('layout_console.console-header-footer')

@section('title') {{' - Console'}} @endsection <!-- Dynamic page tab title. -->

@section('content')

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

@endsection