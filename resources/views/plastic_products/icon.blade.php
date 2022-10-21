@extends('layout_console.console-header-footer')

@section('title') {{' - Console'}} @endsection <!-- Dynamic page tab title. -->

@section('content')

    <section class="w3-padding">

        <h2>Edit Plastic Product Icon</h2>

        <div class="w3-margin-bottom">
            <?php if($plastic_product->icon): ?>
                <img src="<?= asset('storage/'.$plastic_product->icon) ?>" width="200">
            <?php endif; ?>
        </div>

        <form method="post" action="/console/plastic-products/icon/<?= $plastic_product->id ?>" novalidate class="w3-margin-bottom" enctype="multipart/form-data">

            <?= csrf_field() ?>

            <div class="w3-margin-bottom">
                <label for="icon">Icon:</label>
                <input type="file" name="icon" id="icon" value="<?= old('icon') ?>" required>
                
                <?php if($errors->first('icon')): ?>
                    <br>
                    <span class="w3-text-red"><?= $errors->first('icon'); ?></span>
                <?php endif; ?>
            </div>

            <button type="submit" class="w3-button w3-green">Add Icon</button>

        </form>

        <a href="/console/plastic-products/list">Back to Plastic Product List</a>

    </section>

@endsection