<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: https://cruzazul.webinarsenconcreto.com/");
    exit;
}

require $_SERVER['DOCUMENT_ROOT'] . '/inc/head.php';
require $_SERVER['DOCUMENT_ROOT'].'/api/db.php';
$ide = $_SESSION['ide'];
$nombre = $_SESSION['nombre'];
$email = $_SESSION['email'];
$categoria = $_GET['categoria'];
$id = $_GET['id'];

$stringTitulo = $categoria;
$delimiterTitulo = "-";
$replacementTitulo = " ";

$sql = "INSERT INTO actividad (usuario, url) VALUES ('" . addslashes((string) $email) . "','" . addslashes((string) $_SERVER['REQUEST_URI']) . "')";
mysqli_query($conn, $sql);

$resultTitulo = str_replace($delimiterTitulo, $replacementTitulo, ucwords($stringTitulo));
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
                    <div class="col-md-9 contenidos" style="background: rgba(0,0,0,0.5);">
                        <div class="row" style="padding:20px;">
                            <h4 class="sectoter"><?php echo $resultTitulo ?> / <span>UNA RED DE PROFESIONALES EN CONCRETO</span></h4>
                            <?php
                            $sqlWebinars = "SELECT * FROM contenido WHERE id_categoria=" . (int) $id . " ORDER BY id";
                            $categoriasWebinars = $conn->query($sqlWebinars);
                            if ($categoriasWebinars->num_rows > 0) {
                                while ($row = $categoriasWebinars->fetch_array()) {
                                    ?>
                                    <div class="col-md-2">
                                        <?php 
                                            if($row['modulo'] && $row['tipo'] != "aci"){
                                        ?>
                                        <a href="/modulo.php?categoria=<?php echo $row["url"]; ?>&id=<?php echo $row["id"]; ?>&tipo=presentación-ejecutiva&cert=<?php echo $categoria; ?>" class="carta-manuales empresas-bloque grambelprods">
                                        <?php 
                                            } else if($row['modulo'] && $row['tipo'] == "aci") {
                                        ?>
                                        <a href="/webinar.php?categoria=<?php echo $row["url"]; ?>&id=<?php echo $row["id"]; ?>&tipo=presentación-ejecutiva&cert=aci" class="carta-manuales empresas-bloque grambelprods">
                                        <?php 
                                            } else if($categoria == "certificacion-aci") {
                                        ?>
                                        <a href="/webinar.php?categoria=<?php echo $row["url"]; ?>&id=<?php echo $row["id"]; ?>&tipo=presentación-ejecutiva&cert=aci" class="carta-manuales empresas-bloque grambelprods">
                                        <?php
                                            } else {
                                        ?>
                                        <a href="/webinar.php?categoria=<?php echo $row["url"]; ?>&id=<?php echo $row["id"]; ?>&tipo=presentación-ejecutiva" class="carta-manuales empresas-bloque grambelprods">
                                        <?php 
                                            }
                                        ?>
                                        
                                            <div class="capucha" style="background: url('/images/<?php echo $row["imagen"]; ?>.png') center center;"></div>
                                            <div class="capucha-txt">
                                                <h4 style="flex-direction: column;height: 90px;"><?php echo $row["nombre"]; ?></h4>
                                            </div>
                                        </a>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-md-3 barra">
                        <div style="text-align: center;">
                            <img src="images/logo-interior-cruz-azul.jpg" class="img-responsive" alt="CRUZ AZUL" title="CRUZ AZUL" style="width: 70%;margin: 0 auto;margin-top: 30px;background: #000;" >
                        </div>
                        <div style="text-align: center;">
                            <img src="images/badge_imcyc.png" class="img-responsive" alt="Grupo Cementos de Chihuahua" title="Grupo Cementos de Chihuahua" style="width: 30%;margin: 0 auto;margin-bottom: 50px;" >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>