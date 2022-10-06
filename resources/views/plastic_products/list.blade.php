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

        <?php if(session()->has('message')): ?>
            <div class="w3-padding w3-margin-top w3-margin-bottom">
                <div class="w3-red w3-center w3-padding"><?= session()->get('message') ?></div>
            </div>
        <?php endif; ?>

        <section class="w3-padding">

            <h2>Manage Plastic Products</h2>

            <table class="w3-table w3-stripped w3-bordered w3-margin-bottom">
                <tr class="w3-red">
                    <th></th> <!-- Icons shown below here. -->
                    <th></th> <!-- Images shown below here. -->
                    <th>Plastic Product Name</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Product Statistics</th>
                    <th>Created By</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th></th> <!-- 'Icon' edit button. -->
                    <th></th> <!-- 'Image' edit button. -->
                    <th></th> <!-- 'Edit' button. -->
                    <th></th> <!-- 'Delete' button. -->
                </tr>
                <?php foreach($plastic_products as $plastic_product): ?>
                    <tr>
                        <td>
                            <?php if($plastic_product->icon): ?>
                                <img src="<?= asset('storage/'.$plastic_product->icon) ?>" width="200">
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($plastic_product->image): ?>
                                <img src="<?= asset('storage/'.$plastic_product->image) ?>" width="200">
                            <?php endif; ?>
                        </td>
                        <td><?= $plastic_product->plastic_product_name ?></td>

                        <td><?= $plastic_product->category ?></td>
                        <td><?= $plastic_product->description ?></td>
                        <td><?= $plastic_product->product_stat ?></td>
                        <td><?= $plastic_product->user_id ?> </td> <!-- NOTE: Change code to show Admin user first name and last name. -->
                        <td><?= $plastic_product->created_at->format('M j, Y') ?></td>
                        <td><?= $plastic_product->updated_at->format('M j, Y') ?></td>
                        <td><a href="/console/plastic-products/icon/<?= $plastic_product->id ?>">Icon</a></td>
                        <td><a href="/console/plastic-products/image/<?= $plastic_product->id ?>">Image</a></td>
                        <td><a href="/console/plastic-products/edit/<?= $plastic_product->id ?>">Edit</a></td>
                        <td><a href="/console/plastic-products/delete/<?= $plastic_product->id ?>">Delete</a></td>
                    </tr>
                <?php endforeach; ?>
            </table>

            <a href="/console/plastic-products/add" class="w3-button w3-green">New Plastic Product</a>

        </section>

    </body>
</html>