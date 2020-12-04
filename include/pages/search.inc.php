<?php
// Redirection if direct access <=> session not active
if (session_status() !== PHP_SESSION_ACTIVE) {
    header('Location:../../?page=error404');
    exit();
}

if (isConnected()) {
    header('Location:?page=' . EnumPages::Connection . '&action=search');
    exit();
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
                            <select class="w-100" name="pays" id="pays">
                                <option value="1"></option>
                                <option value="2"></option>
                            </select>
                        </div>
                        <div class="col-6 mx-auto mt-3">
                            <label class="col-12 button display-5 text-light"  for="region">Region</label>
                            <select class="w-100" name="region" id="region">
                                <option value="1"></option>
                                <option value="2"></option>
                            </select>
                        </div>
                    </div>
                </div>
            </form>
            <form action="" method="post">
                <div class="col-sm-10 mx-auto mt-3">
                    <div class="input-group mb-3">
                        <input type="search" class="form-control" placeholder="Rechercher un spot" aria-label="Rechercher un spot" aria-describedby="search-button">
                        <div class="input-group-append">
                            <span class="input-group-text" id="search-button"><i class="search"></i></span>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-sm-10 col-md-8 col-lg-12 mx-auto mt-3">
            <div class="spot-preview rounded w-100">
                <div class="row">
                    <div class="col-7 col-lg-4 mt-3"><h3>Lacanau plage</h3></div>
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
            </div>
        </div>
    </div>
</div>