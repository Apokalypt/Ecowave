<?php
// Redirection if direct access <=> session not active
if (session_status() !== PHP_SESSION_ACTIVE) {
    header('Location:../?page=error404');
    exit();
}


spl_autoload_register(function ($className) {
	$repClasses='classes/';
	require $repClasses.$className.'.class.php';
});