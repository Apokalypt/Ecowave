<?php
// Redirection if direct access <=> session not active
if (session_status() !== PHP_SESSION_ACTIVE) {
    header('Location:../?page=error404');
    exit();
}

/** @var $page */ ?>



<nav class="navbar navbar-expand-lg w-100 navbar-dark bg-transparent fixed-top justify-content-end">
	<!--
	<div class="btn-group" >
		<button type="button" class="btn btn-secondary bg-transparent border-0 dropdown-toggle shadow-none" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<img src="images/UnitedKingdom_Flag.svg" height="30" class="d-inline-block align-top mr-2">
		</button>
		<div class="dropdown-menu dropdown-menu-left bg-transparent border-0" style="min-width: 0!important; padding: .375rem .75rem!important;">
			<button class="dropdown-item p-0" type="button">
				<img src="images/France_Flag.svg" height="30">
			</button>
		</div>
	</div>
	-->

	<div class="accordion" id="accordionExample">
		<div class="card bg-transparent border-0">
			<div class="card-header p-0 border-0 bg-transparent" id="headingOne">
				<button class="btn btn-link shadow-none" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
					<?php if ($_SESSION['lang'] == 'fr') { ?>
						<img src="images/France_Flag.svg" height="30" class="d-inline-block align-top mr-2">
                    <?php } else { ?>
						<img src="images/UnitedKingdom_Flag.svg" height="30" class="d-inline-block align-top mr-2">
                    <?php } ?>
				</button>
			</div>

			<div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
				<div class="card-body p-0">
					<button class="btn btn-link pt-0" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" onclick="onClick()">
                        <?php if ($_SESSION['lang'] == 'fr') { ?>
							<img id="en" src="images/UnitedKingdom_Flag.svg" height="30">
                        <?php } else { ?>
							<img id="fr" src="images/France_Flag.svg" height="30">
                        <?php } ?>
					</button>

					<button class="btn btn-link pt-0" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" onclick="onClick2()">
						<img id="en" src="images/hacker.svg" height="30">
					</button>
				</div>
			</div>
		</div>
	</div>
	
	<script>
		function onClick() {
            const currentUrl = window.location.href;
            let lang = 'en';
            if (document.getElementById('fr') != null) {
                lang = 'fr';
            }
            
            if (currentUrl.includes("?")) {
                window.open(currentUrl + "&lang=" + lang, "_self");
            } else {
                window.open(currentUrl + "?lang=" + lang, "_self");
            }
		}
		
		function onClick2() {
            const currentUrl = window.location.href;
            if (currentUrl.includes("?")) {
                window.open(currentUrl + "&lang=leet", "_self");
            } else {
                window.open(currentUrl + "?lang=leet", "_self");
            }
        }
	</script>
</nav>