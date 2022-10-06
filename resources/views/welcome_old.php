
<?= view('layout.header') ?>

<section class="w3-padding">
    <!-- SITE WELCOME TITLE -->
    <h1 class="w3-text-blue">EcoLife Plastic Reduction</h1>
    <!-- SLOGAN -->
    <p>The simple web app that helps reduce everyday plastic use.</p>

    <!-- NOTE: Add Plastic Reduction Calculator button/link here. -->

</section>

<hr>

<section class="w3-padding w3-container">

    <h2 class="w3-text-blue">Projects</h2>

    <?php foreach($projects as $project): ?>

        <div class="w3-card w3-margin">

            <div class="w3-container w3-blue">

                <h3><?= $project->title ?></h3>

            </div>
            
            <?php if($project->image): ?>
                <div class="w3-container w3-margin-top">
                    <img src="<?= asset('storage/'.$project->image) ?>" width="200">
                </div>
            <?php endif; ?>

            <div class="w3-container w3-padding">

                <?php if($project->url): ?>
                    View Project: <a href="<?= $project->url ?>"><?= $project->url ?></a>
                <?php endif; ?>

                <p>
                    Posted: <?= $project->created_at->format('M j, Y') ?>
                    <br>
                    Type: <?= $project->type->title ?>
                </p>

                <a href="/project/<?= $project->slug ?>" class="w3-button w3-green">View Project Details</a>

            </div>
        

        </div>

    <?php endforeach; ?>

</section>

<hr>

<section class="w3-padding">

    <h2 class="w3-text-blue">Contact Me</h2>

    <p>
        Phone: 111.222.3333
        <br>
        Email: <a href="mailto:email@address.com">email@address.com</a>
    </p>

</section>

<?= view('layout.footer') ?>