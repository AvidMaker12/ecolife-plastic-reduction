@extends('layout_console.console-header-footer')

@section('content')

    <section class="w3-padding">

        <h2>Manage Questionnaire</h2>
        <h3>For the Eco Lifestyle Calculator</h3>

        <table class="w3-table w3-stripped w3-bordered w3-margin-bottom">
            <tr class="w3-red">
                <th>ID</th>
                <th>Question</th> <!-- From table 'questionnaire_questions'. -->
                <th>Choices</th> <!-- Question's multiple choices and corresponding icons are displayed here. From table 'questionnaire_choices'. -->
                <th>Created By</th> <!-- From table 'questionnaire_questions'. -->
                <th>Date Created</th> <!-- From table 'questionnaire_questions'. -->
                <th>Date Updated</th> <!-- From table 'questionnaire_questions'. -->
                <th></th> <!-- 'Icon' edit button. From table 'questionnaire_choices'. -->
                <th></th> <!-- 'Edit' button. -->
                <th></th> <!-- 'Delete' button. -->
            </tr>
            <?php foreach($questionnaire_questions as $value): ?>
                <tr>
                    <td><?= $value->id ?></td>
                    <td><?= $value->question ?></td>
                    <td>
                        <?php foreach($questionnaire_choices as $data): ?>
                            <?php if($data->questionnaire_question_id === $value->id): ?>
                                <ul>
                                    <li>                                    
                                        <img src="<?= asset('storage/'.$data->icon) ?>" width="200">
                                        <?= $data->choice ?>
                                    </li>
                                </ul>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </td>
                    <td><?= $value->user->f_name ?> <?= $value->user->l_name ?></td>
                    <td><?= $value->created_at->format('M j, Y') ?></td>
                    <td><?= $value->updated_at->format('M j, Y') ?></td>
                    <td><a href="/console/questionnaire/icon/<?= $value->id ?>">Icon</a></td>
                    <td><a href="/console/questionnaire/edit/<?= $value->id ?>">Edit</a></td>
                    <td><a href="/console/questionnaire/delete/<?= $value->id ?>">Delete</a></td>
                </tr>
            <?php endforeach; ?>
        </table>

        <a href="/console/questionnaire/add" class="w3-button w3-green">New Questionnaire Question & Choices</a>

    </section>

@endsection