
<!-- HEADER CONTENT -->
<?php if(Auth::check()): ?>
    You are logged in as <?= auth()->user()->f_name ?> <?= auth()->user()->l_name ?> | 
    <a href="/console/logout">Log Out</a> | 
    <a href="/console/dashboard">Dashboard</a> | 
    <a href="/">Website Home Page</a>
<?php else: ?>
    <a href="/">Return to Website Home Page</a>
<?php endif; ?>