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
            <h2 class="mx-auto">Lacanau plage</h2>
            <div class="row mx-3">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-3"><i class="personne1 mx-auto"></i><p>1-10</p></div>
                        <div class="col-3"><i class="personne2 mx-auto"></i><p>10-50</p></div>
                        <div class="col-3"><i class="personne3 mx-auto"></i><p>50+</p></div>
                    </div>
                    <div class="col-12">
                        <div class="col-3"><i class=""></i></div>
                        <div class="col-3"><i class=""></i></div>
                        <div class="col-3"><i class=""></i></div>
                        <div class="col-3"><i class=""></i></div>
                    </div>
                    <div class="col-12">
                        <div class="col-3"><i class=""></i></div>
                        <div class="col-3"><i class=""></i></div>
                        <div class="col-3"><i class=""></i></div>
                        <div class="col-3"><i class=""></i></div>
                    </div>
                    <div class="col-12">
                        <div class="col-3"><i class=""></i></div>
                        <div class="col-3"><i class=""></i></div>
                        <div class="col-3"><i class=""></i></div>
                        <div class="col-3"><i class=""></i></div>
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
        </form>
    </div>
</div>