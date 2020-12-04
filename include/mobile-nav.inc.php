<div id="menu" class="text-center justify-content-space-between">
    <a href="?page=home" class="button text-dark">Accueil</a>
    <a href="#" class="button text-dark">Session</a>
	<?php if (isConnected()) {
		/** @var User $account */?>
		<a href="?page=<?php echo EnumPages::Profile . '&id=' . $account->getUserId() ?>" class="button text-dark">Profil</a>
    <?php } else { ?>
		<a href="?page=<?php echo EnumPages::Connection ?>" class="button text-dark">Se connecter</a>
    <?php } ?>
</div>
