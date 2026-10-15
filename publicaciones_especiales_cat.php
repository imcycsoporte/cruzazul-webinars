<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: https://gcc.webinarsenconcreto.com/");
    exit;
}

require $_SERVER['DOCUMENT_ROOT'] . '/inc/head.php';
require $_SERVER['DOCUMENT_ROOT'].'/api/dbb.php';
$ide = $_SESSION['ide'];
$nombre = $_SESSION['nombre'];
$email = $_SESSION['email'];
$categoria = $_GET['categoria'];
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
                            <?php
                                if($categoria === "IT"){
                            ?>
                                <a href="publicaciones_especiales_doc.php?categoria=IT1">
                                    <div class="col-md-3" style="margin-bottom: 5px;padding: 5px;">
                                        <div class="card">
                                            <img src="https://webinarsenconcreto.com/imcyc/publicaciones/t1.png" class="zoom" data-zoom-image="imcyc/publicaciones/t1.png" alt="" title="" style="width: 100%;">
                                        </div>
                                    </div>
                                </a>
                                <a href="publicaciones_especiales_doc.php?categoria=IT2">
                                    <div class="col-md-3" style="margin-bottom: 5px;padding: 5px;">
                                        <div class="card">
                                            <img src="https://webinarsenconcreto.com/imcyc/publicaciones/t2.png" class="zoom" data-zoom-image="imcyc/publicaciones/t2.png" alt="" title="" style="width: 100%;">
                                        </div>
                                    </div>
                                </a>
                            <?php
                                }else if($categoria === "NE"){
                            ?>
                                <a href="publicaciones_especiales_doc.php?categoria=NE1">
                                    <div class="col-md-3" style="margin-bottom: 5px;padding: 5px;">
                                        <div class="card">
                                            <img src="https://webinarsenconcreto.com/imcyc/publicaciones/n1.png" class="zoom" data-zoom-image="imcyc/publicaciones/n1.png" alt="" title="Publicaciones especiales imcyc" alt="Publicaciones especiales imcyc" style="width: 100%;">
                                        </div>
                                    </div>
                                </a>
                                <a href="publicaciones_especiales_doc.php?categoria=NE2">
                                    <div class="col-md-3" style="margin-bottom: 5px;padding: 5px;">
                                        <div class="card">
                                            <img src="https://webinarsenconcreto.com/imcyc/publicaciones/n2.png" class="zoom" data-zoom-image="imcyc/publicaciones/n2.png" alt="" title="Publicaciones especiales imcyc" alt="Publicaciones especiales imcyc" style="width: 100%;">
                                        </div>
                                    </div>
                                </a>
                                <a href="publicaciones_especiales_doc.php?categoria=NE3">
                                    <div class="col-md-3" style="margin-bottom: 5px;padding: 5px;">
                                        <div class="card">
                                            <img src="https://webinarsenconcreto.com/imcyc/publicaciones/n3.png" class="zoom" data-zoom-image="imcyc/publicaciones/n3.png" alt="" title="Publicaciones especiales imcyc" alt="Publicaciones especiales imcyc" style="width: 100%;">
                                        </div>
                                    </div>
                                </a>
                            <?php
                                } else {
                            ?>
                                <a href="publicaciones_especiales_doc.php?categoria=S1">
                                    <div class="col-md-3" style="margin-bottom: 5px;padding: 5px;">
                                        <div class="card">
                                            <img src="https://webinarsenconcreto.com/imcyc/publicaciones/s1.png" class="zoom" data-zoom-image="imcyc/publicaciones/s1.png" alt="" title="" style="width: 100%;">
                                        </div>
                                    </div>
                                </a>
                            <?php
                                }
                            ?>
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