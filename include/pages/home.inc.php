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
			<a class="button btn btn-primary mt-5 rounded-pill px-4 py-2" href="?page=<?php echo EnumPages::Search ?>" role="button"><?php echo getString("surf")?> !</a>
		</div>
	</div>
</div>

<div class="col-md-10 col-12 m-auto h-100">
	<div class="col-md-10 col-12 m-auto">
		<div class="row mt-4 wow bounceInDown">
			<h1 class="w-100 text-center button display-4"> <?php echo getString("join")?> !</h1>
			<h5 class="w-100 text-center font-weight-normal" style="font-family: 'Lucida Sans',serif"><?php echo getString("bySurfrider")?></h5>
		</div>
		
		<div class="d-flex flex-wrap mt-5 wow bounceInLeft">
			<img class="col-md-4 col-12 p-0" src="images/surfer1.jpg">
			<p class="ml-0 ml-md-3 col-md col-12 p-0" style="font-family: 'Lucida Sans',serif">
                <?php echo getString("textHomeA")?>
			</p>
		</div>

		<div class="d-flex flex-row-reverse flex-wrap mt-5 wow bounceInRight p-3">
			<img class="col-md-4 col-12 p-0" src="images/surfer2.jpg">
			<p class="mr-0 mr-md-3 col-md col-12 p-0" style="font-family: 'Lucida Sans',serif">
                <?php echo getString("textHomeB")?>
			</p>
		</div>
	</div>
</div>
