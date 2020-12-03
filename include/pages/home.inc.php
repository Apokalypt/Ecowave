<?php
// Redirection if direct access <=> session not active
if (session_status() !== PHP_SESSION_ACTIVE) {
    header('Location:../../?page=error404');
    exit();
} ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<div class="d-flex h-100 background">
	<div class="w-100 wrap justify-content-center align-self-center wow fadeIn" data-wow-duration="1.3s" data-wow-delay="0.4s">
		<h1 class="col-12 text-center title mb-0 text-light">ECOWAVE</h1>
		<h2 class="col-12 text-center normal text-light">#BALANCETONSPOT</h2>
		
		<div class="row justify-content-center m-0">
			<a class="button btn btn-primary mt-5 rounded-pill px-4 py-2" role="button">SURFEZ !</a>
		</div>
	</div>
</div>