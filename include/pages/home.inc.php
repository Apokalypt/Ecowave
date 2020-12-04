<?php
// Redirection if direct access <=> session not active
if (session_status() !== PHP_SESSION_ACTIVE) {
    header('Location:../../?page=error404');
    exit();
} ?>

<div class="d-flex h-100 background">
	<div class="w-100 wrap justify-content-center align-self-center wow fadeIn" data-wow-duration="1.3s" data-wow-delay="0.4s">
		<h1 class="col-12 text-center title mb-0 text-light pr-0 pl-3">ECOWAVE</h1>
		<h2 class="col-12 text-center normal text-light">#BALANCETONSPOT</h2>
		
		<div class="row justify-content-center m-0">
			<a class="button btn btn-primary mt-5 rounded-pill px-4 py-2" role="button">SURFEZ !</a>
		</div>
	</div>
</div>

<div class="col-md-10 col-12 m-auto h-100">
	<div class="col-md-10 col-12 m-auto">
		<div class="row mt-4 wow bounceInDown">
			<h1 class="w-100 text-center button display-4">Rallier notre cause !</h1>
			<h5 class="w-100 text-center font-weight-normal" style="font-family: 'Lucida Sans',serif">Ecowave une application by Surfrider</h5>
		</div>
		
		<div class="d-flex flex-wrap mt-5 wow bounceInLeft">
			<img class="col-md-4 col-12 p-0" src="images/surfer1.jpg">
			<p class="ml-0 ml-md-3 col-md col-12 p-0" style="font-family: 'Lucida Sans',serif">
				Fondée en 1990, Surfrider Fondation France est devenue une référence dans le combat pour la protection de
				l’océan et de ses usagers, forte de la passion et de l’engagement de sa communauté sur le terrain.
			</p>
		</div>

		<div class="d-flex flex-row-reverse flex-wrap mt-5 wow bounceInRight">
			<img class="col-md-4 col-12 p-0" src="images/surfer2.jpg">
			<p class="mr-0 mr-md-3 col-md col-12 p-0" style="font-family: 'Lucida Sans',serif">
				Ecowave est une application de Surfrider qui accompagne les surfeur·euse·s dans leur pratique de leur
				activité tout en remontant des données sur la pratique des surfeurs et leurs observations sur le milieu.
				Les surfeurs ont la possibilité de préparer une session de surf et d’estimer quand et où les vagues
				seront les meilleures.
			</p>
		</div>
	</div>
</div>
