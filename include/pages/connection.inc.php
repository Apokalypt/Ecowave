<?php
// Redirection if direct access <=> session not active
if (session_status() !== PHP_SESSION_ACTIVE) {
    header('Location:../../?page=error404');
    exit();
}

if (isConnected()) {
	// Reset value for connection.
    $_SESSION['user_mail'] = '';
    $_SESSION['user_password'] = '';
    // User is now disconnected...
	
    header('Location:?page=' . EnumPages::Home);
    exit();
} else {
	if (empty($_GET['action'])) {
        $_GET['action'] = 'home';
	}
	
	if (!oneIsEmpty($_POST, 'password', 'email')) {
		$success = (new UserManager(new MyPDO()))->connect($_POST['email'], encryptStringNoDecrypt($_POST['password']));
		if ($success) {
            $_SESSION['user_mail'] = $_POST['email'];
            $_SESSION['user_password'] = $_POST['password'];
			
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

<div class="d-flex background" style="background-attachment: fixed; min-height: 100%">
    <div class="col-sm-10 col-md-8 col-lg-6 m-auto text-center wow fadeIn" data-wow-duration="1.3s" data-wow-delay="0.4s">
        <img src="images/Logo.png" alt="Logo" class="col-5 col-md-4">
        <h2 class="title mb-0 text-light">ECOWAVE</h2>
        <form class="pb-5" action="" method="post">
            <div class="col-9 mx-auto mt-3">
                <label for="email" class="button text-light display-5">Email</label>
                <input class="w-100 rounded-pill" type="email" required name="email" id="email" value="<?php if (isset($success) && !$success) echo arrayValue($_POST, 'email') ?>">
            </div>
            <div class="col-9 mx-auto mt-3">
                <label for="password" class="button text-light display-5"><?php echo getString("password")?></label>
                <input class="w-100 rounded-pill" type="password" required name="password" id="password">
            </div>
			<?php if (isset($success) && !$success) { ?>
				<div class="col-9 mx-auto mt-2 alert alert-danger">
					Une erreur est survenue lors de la tentative de connexion...<br /> Adresse e-mail ou mot de passe incorrect...
				</div>
			<?php } ?>
            <div class="col-8 mx-auto mt-4">
                <input class="w-100 button rounded-pill shadow-sm" type="submit" name="connexion" id="connexion" value="<?php echo getString("connection")?>">
            </div>
            <a href="?page=<?php echo EnumPages::Register . "&action=" . $_GET['action'] ?>" class="button text-light" style="text-shadow: 2px 2px 4px #000000;"><?php echo getString("createAccount")?></a>
        </form>
    </div>
</div>
