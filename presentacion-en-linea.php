<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: https://cemex.webinarsenconcreto.com/");
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

?>

<style>
    .mobilemenu-toggle {
        display: none !important;
    }
    #player4 {
        width: 100%;
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
                    <div class="col-md-9 contenidos" style="background: rgba(0,0,0,0.8);">
                        <div class="row" style="padding:20px;">
                            <?php
                                if($categoria == "tecnico-en-pruebas-de-agregados"){
                            ?>
                                <div id="player4" data-plyr-provider="youtube" data-plyr-embed-id="eX9jOe_w7ho"></div>
                            <?php
                                }else if($categoria == "módulo-durabilidad-de-las-estructuras-de-concreto" && $id == "8" && $webinar == "uno"){
                                    echo '<div id="player4" data-plyr-provider="youtube" data-plyr-embed-id="LP86-Hs-ld4"></div>';
                                }else if($categoria == "módulo-durabilidad-de-las-estructuras-de-concreto" && $id == "8" && $webinar == "dos"){
                                    echo '<div id="player4" data-plyr-provider="youtube" data-plyr-embed-id="LhxOYi0zpCs"></div>';
                                }else if($categoria == "módulo-durabilidad-de-las-estructuras-de-concreto" && $id == "8" && $webinar == "cuatro"){
                                    echo '<div id="player4" data-plyr-provider="youtube" data-plyr-embed-id="kBlA5NQGojo"></div>';
                                }else if($categoria == "estrategia-comercial"){
                                    echo '<div id="player4" data-plyr-provider="youtube" data-plyr-embed-id="5mg13vTJg6o"></div>';
                                }else if($categoria == "técnico-en-pruebas-al-concreto-en-estado-fresco"){
                                    echo '<div id="player4" data-plyr-provider="youtube" data-plyr-embed-id="hjEDdRusHLE"></div>';
                                }else if($categoria == "tecnico-en-pruebas-de-resistencia"){
                                    echo '<div id="player4" data-plyr-provider="youtube" data-plyr-embed-id="_pQYvAMFqNM"></div>';
                                }else if($categoria == "tecnico-en-pruebas-de-agregados"){
                                    echo '<div id="player4" data-plyr-provider="youtube" data-plyr-embed-id="eX9jOe_w7ho"></div>';
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php require 'inc/footer.php'; ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/plyr/3.6.2/plyr.min.js"></script>
    <script src="js/app.js"></script>
    <script>
    const player = new Plyr('#player', {});
    window.player = player;
    const player1 = new Plyr('#player1', {});
    window.player = player1;
    const player2 = new Plyr('#player2', {});
    window.player = player2;
    const player3 = new Plyr('#player3', {});
    window.player = player3;
    const player4 = new Plyr('#player4', {});
    window.player = player4;
    </script>
</body>