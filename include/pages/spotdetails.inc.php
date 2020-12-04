<?php
// Redirection if direct access <=> session not active
if (session_status() !== PHP_SESSION_ACTIVE) {
    header('Location:../../?page=error404');
    exit();
} ?>

<div class="d-flex h-100 background">
    <div class="col-sm-10 col-md-8 col-lg-6 m-auto pb-5 text-center wow fadeIn" data-wow-duration="1.3s" data-wow-delay="0.4s">
        <img src="images/Logo.png" alt="Logo" class="col-5 col-md-4">
        <h2 class="title mb-0 text-light">ECOWAVE</h2>
        <section class="my-4 d-inline-flex">
            <div class="bg-white spot-details-panel p-3 mr-3 w-100">
                <div class="row">
                    <h3 class="col-8">Lacanau plage </h3>
                    <i class="cloudy col-4"></i>
                </div>
                <table class="mt-4">
                    <tr>
                        <td class="text-left"><h5>Qualité de l'eau</h5></td>
                        <td class="d-flex pl-5">
                            <i class="star"></i>
                            <i class="star"></i>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-left"><h5>Qualité de Plage</h5></td>
                        <td class="d-flex pl-5">
                            <i class="star"></i>
                            <i class="star"></i>
                            <i class="star"></i>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-left"><h5>Marée</h5></td>
                        <td class="pl-4"><p>70</p></td>
                    </tr>
                    <tr>
                        <td class="text-left"><h5>Vent</h5></td>
                        <td class="pl-5"><p>2 km/h NO</p></td>
                    </tr>
                    <tr>
                        <td class="text-left"><h5>Houle</h5></td>
                        <td class="pl-4"><p>2.2</p></td>
                    </tr>
                </table>
            </div>
            <aside class="w-75 spot-details-panel text-left d-none d-md-block">
                <div class="bg-white p-2">
                    <p>@titi-surf</p>
                    <p>Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum </p>
                </div>
                <div class="bg-white p-2 mt-2">
                    <p>@titi-surf</p>
                    <p>Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum </p>
                </div>
                <div class="bg-white p-2 mt-2">
                    <p>@titi-surf</p>
                    <p>Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum </p>
                </div>
                <div class="bg-white p-2 mt-2">
                    <p>@titi-surf</p>
                    <p>Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum </p>
                </div>
                <div class="bg-white p-2 mt-2">
                    <p>@titi-surf</p>
                    <p>Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum </p>
                </div>
            </aside>
        </section>
        <a href="?page=session_count">
            <div class="rond green mx-auto p-2 start">
                <i class="arrow-right"></i>
            </div>
        </a>
    </div>
</div>
