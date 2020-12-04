<?php
// Redirection if direct access <=> session not active
if (session_status() !== PHP_SESSION_ACTIVE) {
    header('Location:../../?page=error404');
    exit();
} ?>

<div class="d-flex h-100 background">
    <div class="col-sm-10 col-md-8 col-lg-6 m-auto w-100 wrap justify-content-center align-self-center wow fadeIn" data-wow-duration="1.3s" data-wow-delay="0.4s">
        <img class="d-flex col-6 m-auto" src="images/Logo.png" alt="logo">
        <h2 class="col-12 text-center title mb-0 text-light">ECOWAVE</h2>
        <form action="" method="post">
            <div class="col-8 m-auto">
                <label for="email">Email</label>
                <input class="w-100" type="email" name="email" id="email">
            </div>
            <br>
            <div class="col-8 m-auto">
                <label for="password">Mot de passe</label>
                <input class="w-100" type="password" name="password" id="password">
            </div>
            <br>
            <div class="col-8 m-auto">
                <input class="w-100" type="submit" name="connexion" id="connexion" value="Connexion">
                <label class="" for="connexion"><a href="#">ou créé ton compte ici</a></label>
            </div>
        </form>
    </div>
</div>