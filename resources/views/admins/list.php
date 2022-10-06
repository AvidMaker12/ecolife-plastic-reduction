<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Console/Admin Accounts/List | EcoLife</title>

        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="/app.css">

        <script src="/app.js"></script>
        
    </head>
    <body>

        <header class="w3-padding">

            <h1 class="w3-text-red">Administrator Accounts</h1>

            <?= view('layout_console.header_console') ?>

            <!-- <?php if(Auth::check()): ?>
                You are logged in as <?= auth()->admin_accounts()->f_name ?> <?= auth()->admin_accounts()->l_name ?> | 
                <a href="/console/logout">Log Out</a> | 
                <a href="/console/dashboard">Dashboard</a> | 
                <a href="/">Website Home Page</a>
            <?php else: ?>
                <a href="/">Return to Website Home Page</a>
            <?php endif; ?> -->

        </header>

        <hr>

        <?php if(session()->has('message')): ?>
            <div class="w3-padding w3-margin-top w3-margin-bottom">
                <div class="w3-red w3-center w3-padding"><?= session()->get('message') ?></div>
            </div>
        <?php endif; ?>

        <section class="w3-padding">

            <h2>Manage Administrator Accounts</h2>

            <table class="w3-table w3-stripped w3-bordered w3-margin-bottom">
                <tr class="w3-red">
                    <th>Name</th>
                    <th>Email</th>
                    <th>Date Joined</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach($admins as $admin_accounts): ?>
                    <tr>
                        <td><?= $admin_accounts->f_name ?> <?= $admin_accounts->l_name ?></td>
                        <td><?= $admin_accounts->email ?></td>
                        <td><?= $admin_accounts->created_at->format('M j, Y') ?></td>
                        <td><a href="/console/admins/edit/<?= $admin_accounts->id ?>">Edit</a></td>
                        <td><a href="/console/admins/delete/<?= $admin_accounts->id ?>">Delete</a></td>
                    </tr>
                <?php endforeach; ?>
            </table>

            <a href="/console/admins/add" class="w3-button w3-green">New Admin Account</a>

        </section>

    </body>
</html>