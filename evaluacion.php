<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: https://gcc.webinarsenconcreto.com/");
    exit;
}

require $_SERVER['DOCUMENT_ROOT'] . '/inc/head.php';
require $_SERVER['DOCUMENT_ROOT'] . '/api/db.php';
$ide = $_SESSION['ide'];
$nombre = $_SESSION['nombre'];
$email = $_SESSION['email'];
$categoria = $_GET['categoria'];
$id = $_GET['id'];
$tipo = $_GET['tipo'];
$webinar = $_GET['webinar'];
?>

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
                    <div class="col-md-9 contenidos examen" style="background: rgba(255,255,255,0.8);">
                        <?php
                        $titulo = $tipo == "evaluación-diagnóstico" ? "Evaluación diagnóstico" : "Evaluación final";
                        ?>
                        <div class="row">
                            <div class="col-md-12">
                                <h3 style="margin-top:15px;"><?php echo $titulo; ?></h3>
                                <h2 class="size-lg"><?php echo $resultTitulo; ?></h2>
                                <p style="margin: 10px 0;"><small>Evaluación para <?php echo $email; ?></small></p>
                                <h2 class="no-line size-lg contacontenedor rojo">Cuenta con <b><span id="contador"></span></b> para terminar la evaluación</h2>
                            </div>
                        </div>
                        
                        
                        <div class="row">
                            <div class="col-md-12">
                                <form class="evaluacion" method="POST" style="margin-bottom: 40px">
                                    <input type="hidden" name="eltipox" value="<?php echo $categoria; ?>" >
                                    <input type="hidden" name="tipoevaluacion" value="<?php echo $tipo; ?>" >
                                    <input type="hidden" name="modulo" value="<?php echo $modulo; ?>" >
                                    <input type="hidden" name="categoria" value="<?php echo $categoria; ?>" >
                                    <input type="hidden" name="email" value="<?php echo $email; ?>" >
                                    <div class="panel-group faq" id="delivery">
                                        <?php
                                        if($webinar && $categoria){
                                            EvaluacionWebinar($categoria, $webinar);
                                        } else if ($categoria){
                                            Evaluacion($categoria);
                                        } else {
                                            echo "<h2 class='text-center'>No hay evaluación para este webinar</h2>";
                                        }
                                        ?>
                                    </div>
                                    <div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <button type="submit" class="btn btn-lg" style="position:relative;float:right;width: 100%;">FINALIZAR EVALUACIÓN <span class="lnr lnr-chevron-right-circle"></span></button>
                                            </div>
                                            <?php
                                             if($tipo === "admin"){
                                                ?>
                                                    <div class="col-md-6">
                                                        <button class="btn btn-lg demoex" style="position:relative;float:right;background:#333;width: 100%;">DEMO <span class="lnr lnr-chevron-right-circle"></span></button>
                                                    </div>
                                                <?php
                                             }
                                            ?>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                        
                        <div class="resultadosEvaluacion"></div>
                        
                        <?php
                            if($tipo === "admin"){
                        ?>
                        <div class="demoexamen">
                            <div class="alerta"></div>
                            <form action="/diploma/index23.php" method="post" enctype="multipart/form-data">
                            <!--<form method="post" class="diplomaencriptado" enctype="multipart/form-data">-->
                                <div class="row">
                                    <div class="col-md-3">
                                        <?php if($clima === 'penetron') { ?>
                                            <img src="/images/diploma_mini_penetron.jpg" style="width:100%;" alt="webinars sobre concreto y cemento" title="webinars sobre concreto y cemento">
                                        <?php } else { ?>
                                            <img src="/images/diploma_mini.jpg" style="width:100%;" alt="webinars sobre concreto y cemento" title="webinars sobre concreto y cemento">
                                        <?php } ?>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group">

                                            <label for="exampleInputEmail1"><span class="lnr lnr-chevron-right"></span> Ingrese su nombre completo para generar su certificado (incluya su Título):</label>
                                            <input type="hidden" name="email" value="<?php echo $email; ?>">
                                            <input type="hidden" name="empresa" value="<?php echo $empresa; ?>">
                                            <input type="hidden" name="elcursox" value="<?php echo $elcursox; ?>" class="tipeteaditivos">
                                            <input type="hidden" name="idcertificado" value="<?php echo $idcertificado; ?>">
                                            <input type="hidden" name="tiempoTranscurrido" id="tiempoTranscurrido" value=""></span>

                                            <input type="text" class="form-control" name="nombre" placeholder="Ej. Ing. Fernanda Vera Monroy" required="required">
                                            <label for="exampleInputEmail1"><span class="lnr lnr-chevron-right"></span> Ingrese su CURP:</label>
                                            <input type="text" class="form-control" name="curp" required="required">
                                            <label for="exampleInputEmail1"><span class="lnr lnr-chevron-right"></span> Ingrese su Código Postal:</label>
                                            <input type="number" class="form-control" name="zip" required="required" style="margin-bottom: 0;">
                                            <p><small>* Ingrese la ubicación en la que le gustaría ofrecer sus servicios profesionales.</small></p>
                                            <label for="exampleInputEmail1">Seleccione su fotografía (tipo pasaporte):</label>
                                            <p><small><b>NOTA IMPORTANTE:</b> Unicamente se aceptan archivos con terminación .jpg, .png</small></p>
                                            <input type="file" name="image" required="required" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <hr>
                                        <h1 style="text-align: center;">De click en el siguiente enlace para generar su certificado:</h1>
                                        <div align="center">
                                            <button type="submit" class="btn btn-default">GENERAR SU CERTIFICADO</button>
                                        </div>
                                    </div>

                                </div>
                            </form>
                            <div class="row diplomaQR">
                                <div class="col-md-12">
                                    <hr>
                                    <h2>Su certificado ha sido generado correctamente, por favor ingrese a la siguiente liga:</h2>
                                    <h3>1) Ingrese a la siguiente dirección:</h3>
                                    <div align="center">
                                        <a href="http://webinarsenconcreto.com/diplomas/" target="_blank">
                                            <img src="images/qr.svg" alt="" title="" >
                                        </a>
                                    </div>
                                    <h3>2) Con el siguiente código:</h3>
                                    <h1 class="font-bold text-center">
                                        <?php
                                            echo "https://qr.imcyc.com/?id=".$idcertificado;
                                        ?>
                                    </h1>
                                </div>
                            </div>
                        </div>
                        <?php
                            }
                        ?>
                        
                    </div>

                </div>
            </div>
        </div>
    </div>
    
    <script src="https://www.webinarsenconcreto.com/js/vendor/jquery/jquery.js"></script>
    <script src="https://www.webinarsenconcreto.com/js/vendor/bootstrap/bootstrap.min.js"></script>
    <script src="https://www.webinarsenconcreto.com/js/vendor/swiper/swiper.min.js"></script>
    <script src="https://www.webinarsenconcreto.com/js/vendor/slick/slick.min.js"></script>
    <script src="https://www.webinarsenconcreto.com/js/vendor/parallax/parallax.js"></script>
    <script src="https://www.webinarsenconcreto.com/js/vendor/isotope/isotope.pkgd.min.js"></script>
    <script src="https://www.webinarsenconcreto.com/js/vendor/magnificpopup/dist/jquery.magnific-popup.js"></script>
    <script src="https://www.webinarsenconcreto.com/js/vendor/countdown/jquery.countdown.min.js"></script>
    <script src="https://www.webinarsenconcreto.com/js/vendor/nouislider/nouislider.min.js"></script>
    <script src="https://www.webinarsenconcreto.com/js/vendor/ez-plus/jquery.ez-plus.js"></script>
    <script src="https://www.webinarsenconcreto.com/js/vendor/tocca/tocca.min.js"></script>
    <script src="https://www.webinarsenconcreto.com/js/vendor/bootstrap-tabcollapse/bootstrap-tabcollapse.js"></script>
    <script src="https://www.webinarsenconcreto.com/js/vendor/scrollLock/jquery-scrollLock.min.js"></script>
    <script src="https://www.webinarsenconcreto.com/js/vendor/darktooltip/dist/jquery.darktooltip.js"></script>
    <script src="https://www.webinarsenconcreto.com/js/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="https://www.webinarsenconcreto.com/js/vendor/instafeed/instafeed.min.js"></script>
    <script src="https://www.webinarsenconcreto.com/js/megamenu.min.js"></script>
    <!-- Resources -->
    <script src="https://www.amcharts.com/lib/4/core.js"></script>
    <script src="https://www.amcharts.com/lib/4/charts.js"></script>
    <script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>
    <script src="js/app.js"></script>
    <script>
        // Set the date we're counting down to
        var date = new Date();
        date.setHours(date.getHours() + 1);

        var countDownDate = new Date(date).getTime();

        // Update the count down every 1 second
        var x = setInterval(function () {

            // Get today's date and time
            var now = new Date().getTime();

            // Find the distance between now and the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 *
<?php
if ($clima == "calido") {
    echo 120;
} else if ($clima == "grado" || $clima == "grado1" || $clima == "resistencia" || $clima == "resistencia1" || $clima == "agregados" || $clima == "agregados1" || $clima == "fisicas" || $clima == "frio" || $clima == "bombeo" || $clima == "bombeoseguridad" || $clima == "grambell" || $clima == "durabilidad" || $clima == "matech") {
    echo 60;
} else {
    echo 120;
}
?>
            ));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Display the result in the element with id="demo"
            //document.getElementById("contador").innerHTML = hours + "h. " + minutes + "m. " + seconds + "s. ";
            document.getElementById("contador").innerHTML = minutes + "m. " + seconds + "s. ";
            document.getElementById("tiempoTranscurrido").value = minutes + ":" + seconds;

            // If the count down is finished, write some text
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("contador").innerHTML = "SU TIEMPO HA EXPIRADO";
                document.getElementById("tiempoTranscurrido").value = "tiempo agotado";
            }
        }, 1000);
    </script>
</body>