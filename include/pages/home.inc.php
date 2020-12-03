<?php
// Redirection if direct access <=> session not active
if (session_status() !== PHP_SESSION_ACTIVE) {
    header('Location:../../?page=error404');
    exit();
} ?>


<div class="jumbotron">
	<h1 class="display-4">Hello, world!</h1>
	<p class="lead">Welcome to the magnificent site for the info night, come and discover it with us!</p>
	<hr class="my-4">
	<p>This page is just a home page so please be patient and wait a bit 😏.</p>
</div>