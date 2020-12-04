<?php
// Redirection if direct access <=> session not active
if (session_status() !== PHP_SESSION_ACTIVE) {
    header('Location:../../?page=error404');
    exit();
}
?>
<div class="d-flex h-100 background">
    <div class="col-sm-10 col-md-8 col-lg-6 m-auto text-center wow fadeIn" data-wow-duration="1.3s" data-wow-delay="0.4s">
        <img src="images/Logo.png" alt="Logo" class="col-5 col-md-4">
        <h1 class="title text-light">ECOWAVE</h1>
        <div class="counter col-8 rounded-pill m-auto">
            <h2 class="text text-dark">Lacanau plage</h2>
            <h3 class="text text-dark">00:35:14</h3>
        </div>
        <br>
        <a href="?page=sessionend">
            <div class="rond red m-auto">
                <img src="images/stop.svg" alt="Stop" class="stop">
            </div>
        </a>
    </div>
</div>
