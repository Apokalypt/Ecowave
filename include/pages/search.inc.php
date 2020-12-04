<?php
// Redirection if direct access <=> session not active
if (session_status() !== PHP_SESSION_ACTIVE) {
    header('Location:../../?page=error404');
    exit();
} ?>

<div class="d-flex h-100 background">
    <div class="col-sm-10 col-md-8 col-lg-6 m-auto text-center wow fadeIn" data-wow-duration="1.3s" data-wow-delay="0.4s">
        <img src="images/Logo.png" alt="Logo" class="col-5 col-md-4">
        <h2 class="title mb-0 text-light">ECOWAVE</h2>
        <form action="" method="post">
            <div class="col-8 mx-auto mt-3">
                <div class="input-group mb-3">
                    <input type="search" class="form-control" placeholder="Rechercher un spot" aria-label="Rechercher un spot" aria-describedby="search-button">
                    <div class="input-group-append">
                        <span class="input-group-text" id="search-button"><i class="search"></i></span>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>