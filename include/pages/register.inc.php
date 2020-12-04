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
        $success = (new UserManager(new MyPDO()))->addUser($_POST['email'], encryptStringNoDecrypt($_POST['mdp']), $_POST['pseudo']);
        if ($success) {
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
    } else {
        if (!isEmail($_POST['email'])) {
            $format = false;
        }
    
        if ($_POST['mdp'] !== $_POST['mdp_confirm']) {
            $mdp = false;
        }
	}
} ?>
<div class="d-flex background" style="background-attachment: fixed; min-height: 100%">
    <div class="col-sm-10 col-md-8 col-lg-6 m-auto text-center wow fadeIn" data-wow-duration="1.3s" data-wow-delay="0.4s">
        <img src="images/Logo.png" alt="Logo" class="col-5 col-md-4">
        <h2 class="title mb-0 text-light">ECOWAVE</h2>
        <form class="pb-5" action="" method="post">
            <div class="col-9 mx-auto mt-3">
                <label for="pseudo" class="button display-5 text-light">Pseudo</label>
                <input type="text" required name="pseudo" id="pseudo" class="w-100 rounded-pill" value="<?php echo arrayValue($_POST, 'pseudo') ?>">
            </div>
            <div class="col-9 mx-auto mt-3">
                <label for="email" class="button display-5 text-light">Email</label>
                <input type="text" required name="email" id="email" class="w-100 rounded-pill" value="<?php echo arrayValue($_POST, 'email') ?>">
            </div>
            <div class="col-9 mx-auto mt-3">
                <label for="mdp" class="button display-5 text-light">Mot de passe</label>
                <input type="password" required name="mdp" id="mdp" class="w-100 rounded-pill">
            </div>
            <div class="col-9 mx-auto mt-3">
                <label for="mdp_confirm" class="button display-5 text-light">Confirmation mot de passe</label>
                <input type="password" required name="mdp_confirm" id="mdp_confirm" class="w-100 rounded-pill">
            </div>
            <?php if (isset($success) && !$success) { ?>
				<div class="col-9 mx-auto mt-2 alert alert-danger">
					Une erreur est survenue lors de la tentative d'inscription...<br /> L'une des informations fournies n'est pas correcte...
				</div>
            <?php } ?>
            <?php if (isset($format) && !$format) { ?>
				<div class="col-9 mx-auto mt-2 alert alert-danger">
					L'adresse e-mail fourni est invalide. Elle ne correspond pas au format des adresses e-mails...
				</div>
            <?php } ?>
            <?php if (isset($mdp) && !$mdp) { ?>
				<div class="col-9 mx-auto mt-2 alert alert-danger">
					Les mots de passes saisies étaient différents, veuillez saisir le même mot de passe !
				</div>
            <?php } ?>
            <div class="col-8 mx-auto mt-4">
                <input value="Nous rejoindre" class="button w-100 rounded-pill" type="submit" name="connexion" id="connexion">
            </div>
            <a href="?page=<?php echo EnumPages::Connection . "&action=" . $_GET['action'] ?>" class="button text-light" style="text-shadow: 2px 2px 4px #000000;">ou connecte-toi ici</a>
        </form>
    </div>
</div>
