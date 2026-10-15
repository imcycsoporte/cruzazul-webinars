<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: https://cruzazul.webinarsenconcreto.com/");
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
                                $sqle = "SELECT * FROM lideres ORDER BY id";
                                $result = $connb->query($sqle);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_array()) {
                                        ?>
                                        <div class="col-md-3" style="margin-bottom: 5px;padding: 5px;max-height: 250px;overflow: hidden;height: 250px;">
                                            <a class="lideres" href="lideres_detalle.php?categoria=lideres&id=<?php echo $row['id']; ?>&nombre=<?php echo $row['nombre']; ?>">
                                                    <div class="card">
                                                        <img src="https://www.webinarsenconcreto.com/images/lideres/<?php echo $row['foto']; ?>" class="img-responsive" data-zoom-image="/images/lideres/<?php echo $row['foto']; ?>" alt="<?php echo $row['nombre']; ?>" title="<?php echo $row['nombre']; ?>">
                                                        <div class="col-md-12" style="margin: 0;padding: 10px;text-align: center;background: #dedede;height: 80px;display: flex;justify-content: center;align-items: center;">
                                                            <h3 style="margin:0;padding:0;"><?php echo $row['nombre']; ?></h3>
                                                        </div>
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
                            <img src="images/logo-interior-cruz-azul.jpg" class="img-responsive" alt="Grupo Cementos de Chihuahua" title="Grupo Cementos de Chihuahua" style="width: 70%;margin: 0 auto;margin-top: 30px;background: #000;" >
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