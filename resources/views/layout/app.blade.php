
<?= view('layout.header') ?>

<!-- Dynamic page content is inserted here via blade template: -->
@yield('content')


<?= view('layout.footer') ?>

<!-- Page-specific scripts goes here via blade templating: -->
@yield('scripts')