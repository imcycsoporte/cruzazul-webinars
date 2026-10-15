<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: https://gcc.webinarsenconcreto.com/");
    exit;
}

require $_SERVER['DOCUMENT_ROOT'] . '/inc/head.php';
require $_SERVER['DOCUMENT_ROOT'].'/api/db.php';
require $_SERVER['DOCUMENT_ROOT'].'/api/dbb.php';
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
                            <?php
                            require('api/db.php');
                            $sqle = "SELECT * FROM journal ORDER BY id ASC";
                            $result = $connb->query($sqle);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_array()) {
                                    ?>
                                    <a href="journaldoc.php?id=<?php echo $row['id']; ?>">
                                        <div class="col-md-2" style="margin-bottom: 5px;padding-right: 0">
                                            <img src="https://webinarsenconcreto.com/imcyc/journal/<?php echo $row['imagen']; ?>" class="zoom" data-zoom-image="http://redcyc.com/imcyc//journal/<?php echo $row['imagen']; ?>" alt="<?php echo $row['imagen']; ?>" title="<?php echo $value['imagen']; ?>" style="width: 100%;" >
                                            <div class="col-md-12" style="margin: 0;padding: 0;">
                                                <p style="background: #222;color:#fff;padding: 5px;text-align: center;margin:0;font-weight: 100;font-size: 1rem;">FECHA. <?php echo $row['fecha']; ?></p>

                                            </div>
                                    </div>
                                    </a>
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
                            <img src="images/badge_imcyc.png" class="img-responsive" alt="Grupo Cementos de Chihuahua" title="Grupo Cementos de Chihuahua" style="width: 20%;margin: 0 auto;margin-bottom: 50px;" >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>