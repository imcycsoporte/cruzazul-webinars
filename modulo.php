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
$categoria = $_GET['categoria'];
$cert = $_GET['cert'];
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
                        <div class="tit_webinar">
                            <?php
                            $sqleT = "SELECT * FROM contenido WHERE id=" . (int) $id;
                            $resultT = $conn->query($sqleT);
                            if ($resultT->num_rows > 0) {
                                while ($rowT = $resultT->fetch_array()) {
                                    ?>
                                        <h2><?php echo $rowT['nombre']; ?></h2>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-md-9 contenidos" style="background: rgba(0,0,0,0.5);">
                        <div class="row" style="padding:20px;">
                            <?php
                            $sqleW = "SELECT * FROM webinars WHERE id_contenido=" . (int) $id . " ORDER BY id";
                            $resultW = $conn->query($sqleW);
                            if ($resultW->num_rows > 0) {
                                while ($rowW = $resultW->fetch_array()) {
                                    ?>
                                    <div class="col-md-6">
                                        <a href="/webinar.php?categoria=<?php echo $categoria; ?>&id=<?php echo $id; ?>&webinar=<?php echo $rowW['webinar']; ?>&tipo=presentaci%C3%B3n-ejecutiva&cert=<?php echo $cert; ?>" class="tarjeta_webinar">
                                            <?php echo $rowW['titulo']; ?>
                                        </a>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <?php require 'inc/footer.php'; ?>
    <script src="https://www.webinarsenconcreto.com/js/vendor/jquery/jquery.js"></script>
</body>