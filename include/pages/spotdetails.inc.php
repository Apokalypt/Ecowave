<?php
// Redirection if direct access <=> session not active
if (session_status() !== PHP_SESSION_ACTIVE) {
    header('Location:../../?page=error404');
    exit();
}
$id = $_GET["id"];
$manager = new SpotManager(new MyPDO());
$sessionManager = new SessionManager(new MyPDO());
$spot = $manager->getSpotById($id);
$api = "http://api.worldweatheronline.com/premium/v1/marine.ashx?key=06e2aceb18594188b23232150200312&q=" . $spot->getSpotDetails() . "&format=json&lang=fr"
?>

<div class="d-flex h-100 background">
    <div class="col-sm-10 col-md-8 col-lg-6 m-auto pb-5 text-center wow fadeIn" data-wow-duration="1.3s" data-wow-delay="0.4s">
        <img src="images/Logo.png" alt="Logo" class="col-5 col-md-4">
        <h2 class="title mb-0 text-light">ECOWAVE</h2>
        <section class="my-4 d-inline-flex">
            <div class="bg-white spot-details-panel p-3 mr-3 w-100">
                <div class="row">
                    <h3 class="col-8"><?php echo $spot->getSpotName(); ?> </h3>
                    <i class="cloudy col-4"></i>
                </div>
                <table class="mt-4">
                    <tr>
                        <td class="text-left"><h5>Qualité de l'eau</h5></td>
                        <td class="d-flex pl-5">
                            <?php
                                for ($i = 0; $i < $sessionManager->getNumberStarsSpotQualities($id)->getSessionQualityWater(); $i++) {
                            ?>
                                    <i class="star"></i>
                            <?php
                                }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-left"><h5>Qualité de Plage</h5></td>
                        <td class="d-flex pl-5">
                            <?php
                            for ($i = 0; $i < $sessionManager->getNumberStarsSpotQualities($id)->getSessionQualityBeach(); $i++) {
                                ?>
                                <i class="star"></i>
                                <?php
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-left"><h5>Marée</h5></td>
                        <td class="pl-4"><p><?php echo getDataTideHeightByAPI($api) ?></p></td>
                    </tr>
                    <tr>
                        <td class="text-left"><h5>Vent</h5></td>
                        <td class="pl-5"><p><?php echo getDataWindSpeedByAPI($api) . ' ' .getDataWindDirectionByAPI($api) ?>/p></td>
                    </tr>
                    <tr>
                        <td class="text-left"><h5>Houle</h5></td>
                        <td class="pl-4"><p><?php echo getDataSwellHeightByAPI($api) . ' ' . getDataSwellDirectionByAPI($api) ?></p></td>
                    </tr>
                </table>
            </div>
            <aside class="w-75 spot-details-panel text-left d-none d-md-block">
               <?php
                    foreach ($sessionManager->getCommentary($id) as $comment) {
               ?>
                        <div class="bg-white p-2">
                            <p><?php echo $comment->getUser() ?></p>
                            <p><?php echo $comment->getSessionNotice() ?></p>
                        </div>
               <?php
                    }
               ?>
            </aside>
        </section>
        <a href="?page=session_count">
            <div class="rond green mx-auto p-2 start">
                <i class="arrow-right"></i>
            </div>
        </a>
    </div>
</div>
