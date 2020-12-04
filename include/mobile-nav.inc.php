<div id="menu" class="text-center justify-content-space-between">
    <a href="?page=<?php echo EnumPages::Home ?>" class="button text-dark"><?php echo getString("accueil")?></a>
    <a href="?page=<?php echo EnumPages::Search ?>" class="button text-dark">Session</a>
	<?php if (isConnected()) {
		/** @var User $account */?>
		<a href="?page=<?php echo EnumPages::Profile . '&id=' . $account->getUserId() ?>" class="button text-dark"><?php echo getString("profil")?></a>
    <?php } else { ?>
		<a href="?page=<?php echo EnumPages::Connection ?>" class="button text-dark"><?php echo getString("seConnecter")?></a>
    <?php } ?>
</div>
