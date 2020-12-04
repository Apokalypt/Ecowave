<?php
// Redirection if direct access <=> session not active
if (session_status() !== PHP_SESSION_ACTIVE) {
    header('Location:../../?page=error404');
    exit();
}

if (!isConnected()) {
    header('Location:?page=' . EnumPages::Home);
    exit();
} else if (empty($_GET['id'])) {
    header('Location:?page=' . EnumPages::Home);
    exit();
} else {
    if (empty($_GET['action'])) {
        $_GET['action'] = 'home';
    }
    
    if (!oneIsEmpty($_POST, 'mdp', 'mdp_confirm', 'email', 'pseudo') && isEmail($_POST['email']) && $_POST['mdp'] === $_POST['mdp_confirm']) {
		$user = new User(array(
			'user_id' => $_GET['id'],
			'user_pseudo' => $_POST['pseudo'],
			'user_picture' => arrayValue($_POST, 'photo'),
			'user_biography' => arrayValue($_POST, 'description'),
            'user_password' => encryptStringNoDecrypt($_POST['mdp']),
            'user_mail' => $_POST['email']
		 ));
        if ((new UserManager(new MyPDO()))->updateUser($user)) {
    		$_SESSION['user_mail'] = $_POST['email'];
    		$_SESSION['user_password'] = $_POST['mdp'];
      
    		switch ($_GET['action']) {
    			case 'surf' :
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
    /** @var User $account */?>
	<div class="d-flex background" style="background-attachment: fixed; min-height: 100%">
		<div class="col-sm-10 col-md-8 col-lg-6 m-auto mb-5 text-center wow fadeIn" data-wow-duration="1.3s" data-wow-delay="0.4s">
			<img src="images/Logo.png" alt="Logo" class="col-5 col-md-4">
			<h2 class="title mb-0 text-light">ECOWAVE</h2>
			<form action="" method="post">
				<div class="col-8 mx-auto mt-3">
					<label for="photo" class="button display-5 text-light">Photo</label>
					<input type="file" name="photo" id="photo" class="w-100 rounded-pill" value="<?php echo $account->getUserPicture()?>">
				</div>
				<div class="col-8 mx-auto mt-3">
					<label for="pseudo" class="button display-5 text-light">Pseudo</label>
					<input type="text" required name="pseudo" id="pseudo" class="w-100 rounded-pill" value="<?php echo $account->getUserPseudo()?>">
				</div>
				<div class="col-8 mx-auto mt-3">
					<label for="email" class="button display-5 text-light">Email</label>
					<input type="text" required name="email" id="email" class="w-100 rounded-pill" value="<?php echo $account->getUserMail()?>">
				</div>
				<div class="col-8 mx-auto mt-3">
					<label for="mdp" class="button display-5 text-light"><?php echo getString("password")?></label>
					<input type="password" required name="mdp" id="mdp" class="w-100 rounded-pill">
				</div>
				<div class="col-8 mx-auto mt-3">
					<label for="mdp_confirm" class="button display-5 text-light"><?php echo getString("confirmPassword")?></label>
					<input type="password" required name="mdp_confirm" id="mdp_confirm" class="w-100 rounded-pill">
				</div>
				<div class="col-8 mx-auto mt-3">
					<label for="description" class="button display-5 text-light">Description</label>
					<input type="text" name="description" id="description" class="w-100 rounded-pill" value="<?php echo $account->getUserBiography()?>">
				</div>
				<div class="col-8 mx-auto mt-4">
					<input value="<?php echo getString("update")?>" class="button w-100 rounded-pill" type="submit" name="connexion" id="connexion">
				</div>
			</form>
		</div>
	</div>
<?php } ?>
