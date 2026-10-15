<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: https://gcc.webinarsenconcreto.com/");
    exit;
}

require $_SERVER['DOCUMENT_ROOT'] . '/inc/head.php';
require $_SERVER['DOCUMENT_ROOT'].'/api/db.php';
require 'datos/datos.php';
$ide = $_SESSION['ide'];
$nombre = $_SESSION['nombre'];
$email = $_SESSION['email'];
$id = $_GET['id'];
$categoria = $_GET['categoria'];
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
    -->
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
                    <div class="col-md-9 contenidos" style="background: rgba(0,0,0,0.8);">
                        <div class="row" style="padding:20px;">
                            <h4 class="sectoter"><span>CONSTANCIA DE ASISTENCIA</span></h4>
                            <div class="row" style="padding: 0 20px;">
                                <div class="col-md-3">
                                    <img src="images/dilpoma_mini.jpg" style="width:100%;" alt="webinars sobre concreto y cemento" title="webinars sobre concreto y cemento">
                                </div>
                                <div class="col-md-9">
                                    <form action="diploma/indexConstancia.php" method="post" enctype="multipart/form-data" style="text-align:left;background: rgba(255,255,255,0.8);padding: 10px;">
                                        <input type="hidden" name="elcursox" value="<?php echo $categoria; ?>" class="tipeteaditivos">
                                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                                        <input type="hidden" name="empresa" value="GCC">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nombre completo:</label>
                                            <input type="text" name="nombre" class="form-control" required="required">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Empresa:</label>
                                            <input type="text" name="empresa" class="form-control" required="required">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Correo electrónico:</label>
                                            <input type="email" name="email" class="form-control" required="required">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">CURP:</label>
                                            <input type="text" name="curp" class="form-control" required="required">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlFile1">Fotografía:</label>
                                            <input type="file" name="image" required="required">
                                        </div>
                                        <button type="submit" class="btn btn-primary">GENERAR CONSTANCIA</button>
                                    </form>
                                    <!--
                                    <div class="block-title elmenu">
                                        <a href="/diploma/asistencia.php" class="chispas"><i class="bi bi bi-file-arrow-down-fill menu"></i> CONSTANCIA DE ASISTENCIA</a>
                                        <div class="toggle-arrow"></div>
                                    </div>
                                    -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 barra">
                        <div style="text-align: center;">
                            <img src="images/badge_gcc.png" class="img-responsive" alt="Grupo Cementos de Chihuahua" title="Grupo Cementos de Chihuahua" style="width: 70%;margin: 0 auto;box-shadow: 11px 9px 10px 0px #333;border-radius: 50%;margin-top: 30px;" >
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