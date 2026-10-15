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
$categoria = $_GET['categoria'];

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
                    <div class="col-md-9 contenidos" style="background: rgba(0,0,0,0.8);height: auto;">
                        <div class="row">
                        <?php
                        require('api/dbb.php');
                        $sqle = "SELECT * FROM encuentro" . preg_replace('/[^a-z0-9_]/i', '', (string) $categoria) . " WHERE tipo='conferencia' ORDER BY id ASC";
                        $result = $connb->query($sqle);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_array()) {
                                ?>
                                <a href="congresodoc.php?categoria=<?php echo $categoria; ?>&id=<?php echo $row['id']; ?>">
                                    <div class="col-md-3" style="margin-bottom: 10px;">
                                        <div class="card">

                                            <?php
                                                if($categoria == "2019"){
                                                    ?>
                                                    <img src="https://www.webinarsenconcreto.com/imcyc/eventos/encuentrodos/<?php echo $row['imagen']; ?>" class="zoom" data-zoom-image="https://www.webinarsenconcreto.com/imcyc/eventos/encuentrodos/<?php echo $row['imagen']; ?>" alt="<?php echo $row['autor']; ?>" title="<?php echo $row['autor']; ?>" style="width: 100%;" >
                                                    <?php
                                                } else if($categoria == "2022"){
                                                    ?>
                                                    <img src="https://www.webinarsenconcreto.com/imcyc/eventos/encuentro3.jpeg" class="zoom" data-zoom-image="https://www.webinarsenconcreto.com/imcyc/eventos/encuentro3.jpeg" alt="<?php echo $row['autor']; ?>" title="<?php echo $row['autor']; ?>" style="width: 100%;" >
                                                    <?php
                                                } else {
                                                    ?>
                                                    <img src="https://www.webinarsenconcreto.com/imcyc/eventos/encuentro/<?php echo $row['imagen']; ?>" class="zoom" data-zoom-image="https://www.webinarsenconcreto.com/imcyc/eventos/encuentro/<?php echo $row['imagen']; ?>" alt="<?php echo $row['autor']; ?>" title="<?php echo $row['autor']; ?>" style="width: 100%;" >
                                                    <?php
                                                }
                                            ?>

                                            <div class="col-md-12" style="margin: 0;padding: 0;">
                                                <p style="background: #222;color:#fff;padding: 10px;text-align: center;margin:0;font-weight: 900;height: 120px;display: flex;justify-content: center;align-items: center;flex-direction:column;"><?php echo $row['titulo']; ?><span style="font-weight: 100;"><?php echo $row['autor']; ?></span></p>

                                            </div>
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
    <?php require 'inc/footer.php'; ?>
</body>