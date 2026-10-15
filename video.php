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
                    <div class="col-md-9 contenidos" style="background: rgba(0,0,0,0.8);">
                        <div class="row" style="padding:20px;">
                            <?php
                            $sqleV = "SELECT * FROM videos WHERE id_contenido=" . (int) $id . " AND webinar='" . addslashes((string) $webinar) . "' ORDER BY id";
                            $resultV = $conn->query($sqleV);
                            if ($resultV->num_rows > 0) {
                                while ($rowV = $resultV->fetch_array()) {
                                    ?>
                                    <div class="col-md-6">
                                        <a href="/video_norma.php?categoria=<?php echo $categoria; ?>&id=<?php echo $id; ?>&webinar=<?php echo $webinar; ?>&tipo=video&codigo=<?php echo $rowV['codigo']; ?>" class="tarjeta_webinar">
                                            <span class="material-symbols-outlined">play_circle</span> <?php echo $rowV['titulo']; ?>
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
    <script src="https://www.webinarsenconcreto.com/js/vendor/bootstrap/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.js"></script>
</body>