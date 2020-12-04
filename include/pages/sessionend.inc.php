<?php
// Redirection if direct access <=> session not active
if (session_status() !== PHP_SESSION_ACTIVE) {
    header('Location:../../?page=error404');
    exit();
} ?>

<div class="d-flex h-100 background">
    <div class="col-sm-10 m-auto text-center wow fadeIn" data-wow-duration="1.3s" data-wow-delay="0.4s">
        <div class="col-md-8 m-auto">
            <img src="images/Logo.png" alt="Logo" class="col-5 col-md-4">
            <h2 class="title mb-0 text-light">ECOWAVE</h2>
        </div>
        <form class="spot-preview rounded" action="" method="post">
            <h2 class="button mx-auto">Lacanau plage</h2>
            <div class="row mx-3">
                <div class="col-lg-6">
                    <div class="col-12">
                        <label for="frequentation" class="col-5">Fréquentation : </label>
                        <select name="frequentation" id="frequentation" class="col-6 w-100 rounded">
                            <option value="1">1 - 10</option>
                            <option value="2">10 - 50</option>
                            <option value="3">50+</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="col-12">
                        <label for="pollution" class="col-5">Pollution : </label>
                        <select name="pollution" id="pollution" class="col-6 w-100 rounded">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <label class="col-12" for="commentaire">Commentaire</label>
                        <textarea class="w-100 rounded" name="commentaire" id="commentaire" rows="5"></textarea>
                    </div>
                </div>
            </div>
            <input type="submit" value="Valider" class="button text-dark rounded-pill p-2">
        </form>
    </div>
</div>