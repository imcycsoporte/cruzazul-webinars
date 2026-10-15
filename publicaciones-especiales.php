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
$id = $_GET['id'];

$sql = "INSERT INTO actividad (usuario, url) VALUES ('" . addslashes((string) $email) . "','" . addslashes((string) $_SERVER['REQUEST_URI']) . "')";
mysqli_query($conn, $sql);
?>

<style>
    .mobilemenu-toggle {
        display: none !important;
    }
</style>
<body class="boxed">
    <!-- Loader -->
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
                    <div class="col-md-9 contenidos" style="background: rgba(0,0,0,0.5);">
                        <div class="row" style="padding:20px;">
                            <div class="col-md-12">
                                <a href="publicaciones_especiales_cat.php?categoria=IT">
                                    <div class="col-md-4" style="margin-bottom: 5px;padding: 5px;">
                                        <div class="card">
                                            <img src="https://webinarsenconcreto.com/images/publicaciones/image0.jpeg" class="zoom" data-zoom-image="images/publicaciones/image0.jpeg" alt="" title="" style="width: 100%;">
                                        </div>
                                    </div>
                                </a>
                                <a href="publicaciones_especiales_cat.php?categoria=NE">
                                    <div class="col-md-4" style="margin-bottom: 5px;padding: 5px;">
                                        <div class="card">
                                            <img src="https://webinarsenconcreto.com/images/publicaciones/image1.jpeg" class="zoom" data-zoom-image="images/publicaciones/image0.jpeg" alt="" title="" style="width: 100%;">
                                        </div>
                                    </div>
                                </a>
                                <a href="publicaciones_especiales_cat.php?categoria=S">
                                    <div class="col-md-4" style="margin-bottom: 5px;padding: 5px;">
                                        <div class="card">
                                            <img src="https://webinarsenconcreto.com/images/publicaciones/image2.jpeg" class="zoom" data-zoom-image="images/publicaciones/image0.jpeg" alt="" title="" style="width: 100%;">
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 barra">
                        <div style="text-align: center;">
                            <img src="images/logo-interior-cruz-azul.jpg" class="img-responsive" alt="CRUZ AZUL" title="CRUZ AZUL" style="width: 70%;margin: 0 auto;margin-top: 30px;background: #000;" >
                        </div>
                        <div style="text-align: center;">
                            <img src="images/badge_imcyc.png" class="img-responsive" alt="Grupo Cementos de Chihuahua" title="Grupo Cementos de Chihuahua" style="width: 20%;margin: 0 auto;margin-bottom: 50px;" >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>