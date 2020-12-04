<?php
// Redirection if direct access <=> session not active
if (session_status() !== PHP_SESSION_ACTIVE) {
    header('Location:../../?page=error404');
    exit();
} ?>
<div class="d-flex h-100 background">
    <div class="col-12 col-md-10 m-auto text-center">
        <img src="images/Logo.png" alt="Logo" class="col-5 col-md-4">
        <h2 class="title mb-0 text-light">ECOWAVE</h2>
        <form action="??" method="post">
            <div>
                <label for="pseudo" class="button display-5 text-light">Pseudo</label>
                <br>
                <input type="text" name="pseudo" id="pseudo" class="col-7 rounded-pill">
            </div>
            <br>
            <div>
                <label for="email" class="button display-5 text-light">Email</label>
                <br>
                <input type="text" name="email" id="email" class="col-7 rounded-pill">
            </div>
            <br>
            <div>
                <label for="mdp" class="button display-5 text-light">Mot de passe</label>
                <br>
                <input type="password" name="mdp" id="mdp" class="col-7 rounded-pill">
            </div>
            <br>
            <div>
                <label for="mdp_confirm" class="button display-5 text-light">Confirmation mot de passe</label>
                <br>
                <input type="password" name="mdp_confirm" id="mdp_confirm" class="col-7 rounded-pill">
            </div>
            <br>
            <input type="submit" value="Nous rejoindre" class="button col-7 rounded-pill">
        </form>
        <a href="index.php?page=connection" class="button text-dark">ou connecte-toi ici</a>
    </div>
</div>
