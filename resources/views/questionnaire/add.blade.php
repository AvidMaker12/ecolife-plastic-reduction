@extends('layout_console.console-header-footer')

@section('content')

    <section class="w3-padding">

        <h2>Add to Questionnaire</h2>
        <h3>For the Eco Lifestyle Calculator</h3>

        <form method="post" action="/console/questionnaire/add" novalidate class="w3-margin-bottom">

            <?= csrf_field() ?>

            <div class="w3-margin-bottom">
                <label for="question">Question:</label>
                <input type="text" name="question" id="question" value="<?= old('question') ?>" required>
                
                <?php if($errors->first('question')): ?>
                    <br>
                    <span class="w3-text-red"><?= $errors->first('question'); ?></span>
                <?php endif; ?>
            </div>

            <div class="w3-margin-bottom">
                <label for="choice">Choice:</label>
                <input type="text" name="choice" id="choice" value="<?= old('choice') ?>">

                <?php if($errors->first('choice')): ?>
                    <br>
                    <span class="w3-text-red"><?= $errors->first('choice'); ?></span>
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

            <button type="submit" class="w3-button w3-green">Add to Questionnaire</button>

        </form>

        <a href="/console/questionnaire/list">Back to Questionnaire List</a>

    </section>

@endsection