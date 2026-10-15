<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: https://gcc.webinarsenconcreto.com/");
    exit;
}

require $_SERVER['DOCUMENT_ROOT'] . '/inc/head.php';
require $_SERVER['DOCUMENT_ROOT'].'/api/db.php';
$ide = $_SESSION['ide'];
$nombre = $_SESSION['nombre'];
$email = $_SESSION['email'];
$categoria = $_GET['categoria'];
$id = $_GET['id'];
$tipo = $_GET['tipo'];
$webinar = $_GET['webinar'];
$codigo = $_GET['codigo'];
?>

<style>
    .mobilemenu-toggle {
        display: none !important;
    }
</style>
<body class="boxed">
    <!-- Loader -->
    <!--
    <div id="loader-wrapper">
        <div class="cube-wrapper">
            <div class="cube-folding">
                <span class="leaf1"></span>
                <span class="leaf2"></span>
                <span class="leaf3"></span>
                <span class="leaf4"></span>
            </div>
        </div>
    </div>
    <!-- /Loader -->
    <div class="fixed-btns">
        <!-- Back To Top -->
        <a href="#" class="top-fixed-btn back-to-top"><span class="lnr lnr-chevron-up"></span></a>
        <!-- /Back To Top -->
    </div>
    <div id="wrapper">
        <!-- Page -->
        <div class="page-wrapper contenidos" style="margin: 0; padding: 0;width: 100%;">
            <!-- Header -->
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/inc/header.php'; ?>
            
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3 barra menu">
                        <?php require $_SERVER['DOCUMENT_ROOT'] . '/inc/menu_contenido.php'; ?>
                    </div>
                    <div class="col-md-9 contenidos" style="background: rgba(255,255,255,0.8);">
                        <div class="row" style="padding:20px;">
                            <div id="player" data-plyr-provider="youtube" data-plyr-embed-id="<?php echo $codigo; ?>" data-plyr-rel="0"></div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <?php require 'inc/footer.php'; ?>
    <script src="https://www.webinarsenconcreto.com/js/vendor/jquery/jquery.js"></script>
    <script src="https://www.webinarsenconcreto.com/js/vendor/bootstrap/bootstrap.min.js"></script>
    <script src="https://www.webinarsenconcreto.com/js/vendor/swiper/swiper.min.js"></script>
    <script src="https://www.webinarsenconcreto.com/js/vendor/slick/slick.min.js"></script>
    <script src="https://www.webinarsenconcreto.com/js/vendor/parallax/parallax.js"></script>
    <script src="https://www.webinarsenconcreto.com/js/vendor/isotope/isotope.pkgd.min.js"></script>
    <script src="https://www.webinarsenconcreto.com/js/vendor/magnificpopup/dist/jquery.magnific-popup.js"></script>
    <script src="https://www.webinarsenconcreto.com/js/vendor/countdown/jquery.countdown.min.js"></script>
    <script src="https://www.webinarsenconcreto.com/js/vendor/nouislider/nouislider.min.js"></script>
    <script src="https://www.webinarsenconcreto.com/js/vendor/ez-plus/jquery.ez-plus.js"></script>
    <script src="https://www.webinarsenconcreto.com/js/vendor/tocca/tocca.min.js"></script>
    <script src="https://www.webinarsenconcreto.com/js/vendor/bootstrap-tabcollapse/bootstrap-tabcollapse.js"></script>
    <script src="https://www.webinarsenconcreto.com/js/vendor/scrollLock/jquery-scrollLock.min.js"></script>
    <script src="https://www.webinarsenconcreto.com/js/vendor/darktooltip/dist/jquery.darktooltip.js"></script>
    <script src="https://www.webinarsenconcreto.com/js/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="https://www.webinarsenconcreto.com/js/vendor/instafeed/instafeed.min.js"></script>
    <script src="https://www.webinarsenconcreto.com/js/megamenu.min.js"></script>
    <script src="https://pay.conekta.com/v1.0/js/components.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/plyr/3.6.2/plyr.min.js"></script>
    <script>
    const player = new Plyr('#player', {
        loop: { active: true }
    });
    window.player = player;
    </script>
</body>