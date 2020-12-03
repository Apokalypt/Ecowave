<?php
// Redirection if direct access <=> session not active
if (session_status() !== PHP_SESSION_ACTIVE) {
    header('Location:../?page=error404');
    exit();
}

/** @var $page */ ?>



<nav class="navbar navbar-expand-lg w-100 navbar-dark bg-dark sticky-top wow bounceInDown">
	<!-- NAVBAR -->
	<a class="navbar-brand" href="index.php">
		<img src="images/Logo.png" width="30" height="30" class="d-inline-block align-top mr-2" alt="" loading="lazy">
		Nuit de l'Info
	</a>
</nav>