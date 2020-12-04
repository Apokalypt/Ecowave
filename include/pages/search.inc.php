<?php
// Redirection if direct access <=> session not active
if (session_status() !== PHP_SESSION_ACTIVE) {
    header('Location:../../?page=error404');
    exit();
}

if (isConnected()) {
    header('Location:?page=' . EnumPages::Connection . '&action=search');
    exit();
}

$listPays = (new CountryManager(new MyPDO()))->getAllCountry();
if (!empty($_POST['pays'])) {
    $listRegion = (new RegionManager(new MyPDO()))->getRegionByCountryId($_POST['pays']);
    
    if (!empty($_POST['region'])) {
    	$listSpot = (new SpotManager(new MyPDO()))->getSpotByRegion(new Region(array("region_id" => $_POST['region'])));
    }
} ?>

<div class="d-flex h-100 background">
    <div class="col-sm-10 m-auto text-center wow fadeIn" data-wow-duration="1.3s" data-wow-delay="0.4s">
        <div class="col-md-8 m-auto">
            <img src="images/Logo.png" alt="Logo" class="col-5 col-md-4">
            <h2 class="title mb-0 text-light">ECOWAVE</h2>
            <form action="" method="post">
                <div class="col-sm-10 mx-auto">
                    <div class="row">
                        <div class="col-6 mx-auto mt-3">
                            <label class="col-12 button display-5 text-light" for="pays">Pays</label>
                            <select class="w-100" name="pays" id="pays" onchange="this.form.submit()">
								<?php foreach ($listPays as $value) { ?>
									<option <?php if (!empty($_POST['pays']) && $_POST['pays'] == $value->getCountryId()) echo 'selected'?> value="<?php echo $value->getCountryId() ?>"><?php if ($_SESSION['lang'] == 'en') {echo $value->getEnCountryName();} else {echo $value->getFrCountryName();} ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-6 mx-auto mt-3">
                            <label class="col-12 button display-5 text-light"  for="region">Region</label>
                            <select class="w-100" name="region" id="region" <?php if (empty($_POST['pays'])) echo 'disabled' ?> onchange="this.form.submit()">
                                <?php foreach ($listRegion as $value) { ?>
									<option <?php if (!empty($_POST['region']) && $_POST['region'] == $value->getRegionId()) echo 'selected'?> value="<?php echo $value->getRegionId() ?>"><?php echo $value->getRegionName() ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
            </form>
            <form action="" method="post">
                <div class="col-sm-10 mx-auto mt-3">
                    <div class="input-group mb-3">
                        <input type="search" id="search_spot" class="form-control" placeholder="Rechercher un spot" aria-label="Rechercher un spot" aria-describedby="search-button" onkeyup="filterSpot()" <?php if (!isset($listSpot)) echo 'disabled'?>>
                        <div class="input-group-append">
                            <span class="input-group-text" id="search-button"><i class="search"></i></span>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-sm-10 col-md-8 col-lg-12 mx-auto mt-3">
            <div class="spot-preview rounded w-100">
				<?php if (isset($listSpot)) {
					foreach ($listSpot as $value) { ?>
						<div class="row spot-founded" onclick="clickSpot(<?php echo $value->getSpotId() ?>)">
							<div class="col-7 col-lg-4 mt-3"><h3><?php echo $value->getSpotName() ?></h3></div>
							<div class="col-5 col-lg-2 my-1 mx-auto"><i class="cloudy"></i></div>
							<div class="col-4 col-lg-2">
								<h6 class="mx-auto mt-2">Marée</h6>
								<p class="mx-auto">70</p>
							</div>
							<div class="col-4 col-lg-2">
								<h6 class="mx-auto mt-2">Vent</h6>
								<p class="mx-auto">20km/h NO</p>
							</div>
							<div class="col-4 col-lg-2">
								<h6 class="mx-auto mt-2">Houle</h6>
								<p class="mx-auto">2,2</p>
							</div>
						</div>
                <?php }
                } ?>
            </div>
        </div>
    </div>
</div>
<script>
	function clickSpot(id) {
	    window.open("?page=spotdetails&id=" + id);
	}
	
    function filterSpot() {
        const input = document.getElementById('search_spot').value;

        const listSpot = document.getElementsByClassName('spot-founded');
        for (let i = 0; i < listSpot.length; i++) {
            const spot = listSpot[i];

            // Vérifie que le nom contient
            if (input === '' || spot.getElementsByTagName('h3')[0].textContent.toLowerCase().includes(input.toLowerCase())) {
                listSpot[i].classList.remove('d-none');
            } else {
                listSpot[i].classList.add('d-none');
            }
        }
    }
</script>