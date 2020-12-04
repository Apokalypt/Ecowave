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
                <label for="email" class="button text-light display-5">Email</label>
                <input class="w-100 rounded-pill" type="email" name="email" id="email">
            </div>
            <div class="col-8 mx-auto mt-3">
                <label for="password" class="button text-light display-5"><?php echo getString("password")?></label>
                <input class="w-100 rounded-pill" type="password" name="password" id="password">
            </div>
            <div class="col-8 mx-auto mt-4">
                <input class="w-100 button rounded-pill" type="submit" name="connexion" id="connexion" value="<?php echo getString("connection")?>">
            </div>
            <a href="index.php?page=register" class="button text-light"><?php echo getString("createAccount")?></a>
        </form>
    </div>
</div>
