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
		if ((new UserManager(new MyPDO()))->connect($_POST['email'], encryptStringNoDecrypt($_POST['password']))) {
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

<div class="d-flex h-100 background">
    <div class="col-sm-10 col-md-8 col-lg-6 m-auto text-center wow fadeIn" data-wow-duration="1.3s" data-wow-delay="0.4s">
        <img src="images/Logo.png" alt="Logo" class="col-5 col-md-4">
        <h2 class="title mb-0 text-light">ECOWAVE</h2>
        <form action="" method="post">
            <div class="col-8 mx-auto mt-3">
                <label for="email" class="button text-light display-5">Email</label>
                <input class="w-100 rounded-pill" type="email" required name="email" id="email">
            </div>
            <div class="col-8 mx-auto mt-3">
                <label for="password" class="button text-light display-5"><?php echo getString("password")?></label>
                <input class="w-100 rounded-pill" type="password" required name="password" id="password">
            </div>
            <div class="col-8 mx-auto mt-4">
                <input class="w-100 button rounded-pill" type="submit" name="connexion" id="connexion" value="<?php echo getString("connection")?>">
            </div>
            <a href="?page=<?php echo EnumPages::Register . "&action=" . $_GET['action'] ?>" class="button text-light"><?php echo getString("createAccount")?></a>
        </form>
    </div>
</div>
