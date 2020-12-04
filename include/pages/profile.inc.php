<?php
// Redirection if direct access <=> session not active
if (session_status() !== PHP_SESSION_ACTIVE) {
    header('Location:../../?page=error404');
    exit();
}

if (!isConnected()) {
	header('Location:?page=' . EnumPages::Connection . '&action=profil');
	exit();
} else if (empty($_GET['id'])) {
    header('Location:?page=' . EnumPages::Home);
    exit();
} else {
    /** @var User $account */ ?>
	<div class="d-flex h-100 background">
		<div class="col-sm-10 col-md-8 col-lg-6 m-auto text-center wow fadeIn" data-wow-duration="1.3s" data-wow-delay="0.4s">
			<img src="images/Logo.png" alt="Logo" class="col-5 col-md-4">
			<h2 class="title mb-0 text-light">ECOWAVE</h2>
			<div class="rond m-auto"></div>
			<h2 class="button text-light"><?php echo $account->getUserPseudo() == '' ?  '<az>' . $account->getUserMail() . '</az>' : '<az>' . $account->getUserPseudo() . '</az>' ?> <span>(<a href="?page=<?php echo EnumPages::ModifyProfile . "&id=" . $account->getUserId() . "&action=profil" ?>" class="text display-6 text-light">Modifier profil</a>)</span></h2>
			<h2 class="button text-light">Description</h2>
			<p class="text text-light"><?php echo $account->getUserBiography() == '' ?  '<i>Aucune description</i>' : '<az>' . $account->getUserBiography() . '</az>' ?></p>
			<!--
            <h2 class="button text-light">Dernier avis</h2>
            <p class="text text-light">Date / Lieu</p>
            <p class="text text-light">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque, eveniet iure molestiae qui sapiente vel veniam. Accusantium aliquam, aut eligendi, esse expedita fugit in ipsum itaque iure ullam unde vel.</p>
            -->
		</div>
	</div>
<?php } ?>

