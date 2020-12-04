<?php session_start();

require_once("include/autoLoad.inc.php");
require_once("include/config.inc.php");
require_once("include/functions.inc.php");

/* This code is used to check that the site is in HTTPS access.
 * If this is not the case, the person is redirected to the HTTPS link.
 *
 * if (ENV == 'prod') {
 *  	if (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === 'off') {
 *         header('Location: https://............');
 *         exit();
 *  	}
 * }
 */

// This code initialize session value to default value
if (!empty($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
    
    $url = $_SERVER['REQUEST_URI'];
    if (count($_GET) == 1) {
        $url = str_replace('?lang=' . $_GET['lang'], '', $url);
    } else {
        $url = str_replace('&lang=' . $_GET['lang'], '', $url);
    }
    header('Location: ' . $url);
} else {
    if (!isset($_SESSION['lang'])) {
        $_SESSION['lang'] = 'fr';
    }
}


// Initialize value for $page
if (!empty($_GET["page"])){
    $page = $_GET["page"];
} else {
    $page = EnumPages::Home;
} ?>

<!DOCTYPE html>
<html lang="fr" class="h-100">
<head>
	<!-- CSS for bootstrap -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

	<!-- CSS for animation -->
	<link rel="stylesheet" href="css/animation.css">
	<link rel="stylesheet" href="css/slick.css">
	<link rel="stylesheet" href="css/swiper.min.css">
	
	<!-- CSS customize -->
	<link rel="stylesheet" href="css/style.css">
	
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Ensures optimal rendering on mobile devices. -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge" /> <!-- Optimal Internet Explorer compatibility -->
	
	<link rel="shortcut icon" href="images/Logo.png">
	<title><?php echo getTitle() ?></title>
	<meta name="description" content="The website for the ''Nuit de l'Info''">
	<meta name="keywords" content="Nuit de l'Info">
</head>
<body class="h-100">
    <?php require_once("include/header.inc.php"); ?>

	<?php require_once("include/content.inc.php"); ?>

	<!-- Footer -->
	<footer class="wow fadeIn sticky-footer fixed-bottom" data-wow-duration="1.3s" data-wow-delay="0.4s">
		<div class="container my-auto">
			<div class="copyright text-center my-auto ">
<!--				<span>Copyright 2020 &copy; LADRAT Mattéo — NGUYEN VAN GIAU Emma — ROUGIER Valentin — LAURENT Jean — PELAUDEIX Benjamin</span>-->
			</div>
		</div>
	</footer>
	<!-- End of Footer -->

	<!-- Javascript for bootstrap -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

	
	<!-- Jquery js -->
	<script src="js/vendor/jquery-1.12.4.min.js" ></script>
	<script src="js/vendor/modernizr-3.7.1.min.js" ></script>
	<!-- WOW js-->
	<script src="js/wow.min.js" ></script>
	<script src="js/swiper.min.js" ></script>
	<!-- Main js -->
	<script src="js/main.js" ></script>
</body>
</html>



