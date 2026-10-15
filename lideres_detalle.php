<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: https://cruzazul.webinarsenconcreto.com/");
    exit;
}

require $_SERVER['DOCUMENT_ROOT'] . '/inc/head.php';
require $_SERVER['DOCUMENT_ROOT'].'/api/dbb.php';
$ide = $_SESSION['ide'];
$nombre = $_SESSION['nombre'];
$email = $_SESSION['email'];
$id = $_GET['id'];
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
                            require('api/dbb.php');
                            $sqle = "SELECT * FROM lideres WHERE id=" . (int) $id;
                            $result = $connb->query($sqle);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_array()) {
                                    ?>
                                    <div class="col-md-3">
                                        <div class="card">
                                            <div class="col-md-12" style="margin: 0;padding: 0;">
                                                <img src="https://www.webinarsenconcreto.com/images/lideres/<?php echo $row['logo']; ?>" class="img-responsive" alt="" title="" />
                                                <p style="background: #222;color:#fff;padding: 5px;text-align: center;margin:0;font-weight: 100;"><?php echo $row['nombre']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div id="player" data-plyr-provider="youtube" data-plyr-embed-id="/<?php echo $row['video']; ?>"></div>
                                            </div>
                                            <div class="col-md-12" style="text-align:left;color:#fff;">
                                                <?php echo $row['resumen']; ?>
                                            </div>
                                        </div>
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
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/plyr/3.6.2/plyr.min.js"></script>
    <script>
        const player = new Plyr('#player', {});
        window.player = player;
    </script>
</body>