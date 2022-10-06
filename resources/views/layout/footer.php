
<hr>

<footer class="w3-padding w3-center w3-dark-gray">

    <!-- FOOTER TEXT -->
    <!-- Current year copyright. -->
    Copyright &#169; <?= date('Y') ?> EcoLife Inc. All rights reserved.&nbsp;&nbsp;&nbsp;&nbsp;
    
    <a href="#">Privacy Policy</a>&nbsp;&nbsp;|&nbsp;
    <a href="#">Terms of Service</a>&nbsp;&nbsp;|&nbsp;
    <a href="#">Legal</a>&nbsp;&nbsp;|&nbsp;
    <a href="#">Site Map</a>

    <!-- NOTE: Add user's country text with tooltip "Choose your country or region". -->

    <!-- NOTE: Add current language text as a button to change site language. -->

    <br>

    <?php if(Auth::check()): ?>
        You are logged in as <?= auth()->user()->f_name ?> <?= auth()->user()->l_name ?> | 
        <a href="/console/logout">Log Out</a> | 
        <a href="/console/dashboard">Dashboard</a>
    <?php else: ?>
        <a href="/console/login">Login</a>
    <?php endif; ?>

</footer>

</body>
</html>