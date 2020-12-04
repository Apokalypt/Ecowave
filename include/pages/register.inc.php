<?php
// Redirection if direct access <=> session not active
if (session_status() !== PHP_SESSION_ACTIVE) {
    header('Location:../../?page=error404');
    exit();
}

if (isConnected()) {
    header('Location:?page=' . EnumPages::Home);
    exit();
} else {
    if (empty($_GET['action'])) {
        $_GET['action'] = 'home';
    }
    
    if (!oneIsEmpty($_POST, 'mdp', 'mdp_confirm', 'email', 'pseudo') && isEmail($_POST['email']) && $_POST['mdp'] === $_POST['mdp_confirm']) {
    	if ((new UserManager(new MyPDO()))->addUser($_POST['email'], encryptStringNoDecrypt($_POST['mdp']), $_POST['pseudo'])) {
            $_SESSION['user_mail'] = $_POST['email'];
            $_SESSION['user_password'] = $_POST['mdp'];
        
            switch ($_GET['action']) {
                case 'search' :
                    header('Location:?page=' . EnumPages::Search);
                    exit();
                case 'profil' :
                    header('Location:?page=' . EnumPages::Profile);
                    exit();
                default :
                    header('Location:?page=' . EnumPages::Home);
                    exit();
            }
		}
    }
} ?>
<div class="d-flex h-100 background">
    <div class="col-sm-10 col-md-8 col-lg-6 m-auto text-center wow fadeIn" data-wow-duration="1.3s" data-wow-delay="0.4s">
        <img src="images/Logo.png" alt="Logo" class="col-5 col-md-4">
        <h2 class="title mb-0 text-light">ECOWAVE</h2>
        <form action="" method="post">
            <div class="col-8 mx-auto mt-3">
                <label for="pseudo" class="button display-5 text-light">Pseudo</label>
                <input type="text" name="pseudo" id="pseudo" class="w-100 rounded-pill">
            </div>
            <div class="col-8 mx-auto mt-3">
                <label for="email" class="button display-5 text-light">Email</label>
                <input type="text" name="email" id="email" class="w-100 rounded-pill">
            </div>
            <div class="col-8 mx-auto mt-3">
                <label for="mdp" class="button display-5 text-light">Mot de passe</label>
                <input type="password" name="mdp" id="mdp" class="w-100 rounded-pill">
            </div>
            <div class="col-8 mx-auto mt-3">
                <label for="mdp_confirm" class="button display-5 text-light">Confirmation mot de passe</label>
                <input type="password" name="mdp_confirm" id="mdp_confirm" class="w-100 rounded-pill">
            </div>
            <div class="col-8 mx-auto mt-4">
                <input value="Nous rejoindre" class="button w-100 rounded-pill" type="submit" name="connexion" id="connexion">
            </div>
            <a href="?page=<?php echo EnumPages::Connection . "&action=" . $_GET['action'] ?>" class="button text-dark">ou connecte-toi ici</a>
        </form>
    </div>
</div>
