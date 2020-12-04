<?php
// Redirection if direct access <=> session not active
if (session_status() !== PHP_SESSION_ACTIVE) {
    header('Location:../../?page=error404');
    exit();
} ?>
<div class="d-flex h-100 background">
    <div class="col-10 m-auto text-center">
        <img src="images/Logo.png" alt="Logo" class="col-5">
        <h1 class="mb-0 text-light">ECOWAVE</h1>
        <form action="??" method="post">
            <div>
                <label for="pseudo" class="button display-5 text-light">Pseudo</label>
                <br>
                <input type="text" name="pseudo" id="pseudo" class="col-7 rounded-pill">
            </div>
            <div>
                <label for="email" class="button display-5 text-light">Email</label>
                <br>
                <input type="text" name="email" id="email" class="col-7 rounded-pill">
            </div>
            <div>
                <label for="mdp" class="button display-5 text-light">Mot de passe</label>
                <br>
                <input type="text" name="mdp" id="mdp" class="col-7 rounded-pill">
            </div>
            <div>
                <label for="mdp_confirm" class="button display-5 text-light">Conirmation mot de passe</label>
                <br>
                <input type="text" name="mdp_confirm" id="mdp_confirm" class="col-7 rounded-pill">
            </div>
            <input type="submit" value="Nous rejoindre" class="button rounded-pill">
        </form>
    </div>
</div>
