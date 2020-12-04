<?php
// Redirection if direct access <=> session not active
if (session_status() !== PHP_SESSION_ACTIVE) {
    header('Location:../../?page=error404');
    exit();
} ?>

<div class="d-flex h-100 background">
	<div class="w-100 wrap justify-content-center align-self-center wow fadeIn" data-wow-duration="1.3s" data-wow-delay="0.4s">
		<h1 class="col-12 text-center title mb-0 text-light">ECOWAVE</h1>
		<h2 class="col-12 text-center normal text-light">#BALANCETONSPOT</h2>
		
		<div class="row justify-content-center m-0">
			<a class="button btn btn-primary mt-5 rounded-pill px-4 py-2" role="button">SURFEZ !</a>
		</div>
	</div>
</div>

<div class="col-10 m-auto h-100">
	<div class="col-10 m-auto">
		<div class="row mt-4 wow bounceInDown">
			<h1 class="w-100 text-center button display-4">Rallier notre cause !</h1>
			<h5 class="w-100 text-center font-weight-normal" style="font-family: 'Lucida Sans',serif">Ecowave une application by Surfrider</h5>
		</div>
		
		<div class="row mt-5 wow bounceInLeft">
			<img class="col-4" src="images/surfer1.jpg">
			<p class="ml-3 col-7" style="font-family: 'Lucida Sans',serif">
				Fondée en 1990, Surfrider Fondation France est devenue une référence dans le combat pour la protection de
				l’océan et de ses usagers, forte de la passion et de l’engagement de sa communauté sur le terrain.
			</p>
		</div>

		<div class="row mt-5 wow bounceInRight">
			<p class="mr-3 col-7" style="font-family: 'Lucida Sans',serif">
				Fondée en 1990, Surfrider Fondation France est devenue une référence dans le combat pour la protection de
				l’océan et de ses usagers, forte de la passion et de l’engagement de sa communauté sur le terrain.
			</p>
			<img class="col-4" src="images/surfer2.jpg">
		</div>
	</div>
</div>
