<?php
session_start();
require 'inc/head.php';
?>

<body class="boxed gccentrada" style="overflow: hidden;">
    
    <div class="entrada22">
        <div class="logo22">
        </div>
        <div class="tituloentrada">
            <img src="images/logo.svg" alt="Instituto Mexicano del Cemento y del Concreto A.C." title="Instituto Mexicano del Cemento y del Concreto A.C." />
        </div>
        <div class="btn-entrada-22" style="display: flex;flex-direction: column;">
            <img src="images/logo-plataforma-cruz-azul.jpg" alt="Instituto Mexicano del Cemento y del Concreto A.C." title="Instituto Mexicano del Cemento y del Concreto A.C." style="margin-bottom: 20px;" />
            <button class="btn btn-entrada">Ingresar</button>
        </div>
        <a href="https://imcyc.com/privacidad.html" target="_blank" style="position: fixed; bottom: 0; width: 100%; display: block; text-align: center; color: #111;font-weight: bold;font-size: 10px;">POLÍTICA DE PRIVACIDAD</a>
    </div>
    
    <div class="fixed-btns">
        <!-- Back To Top -->
        <a href="#" class="top-fixed-btn back-to-top"><i class="icon icon-arrow-up"></i></a>
        <!-- /Back To Top -->
    </div>
    <div id="wrapper">
        <!-- Page -->
        <div class="page-wrapper">
            <!-- Page Content -->
            <main class="page-main">
                <div class="logoogin22">
                </div>
                <div class="tituloentrada">
                    <img src="images/logo.svg" alt="Instituto Mexicano del Cemento y del Concreto A.C." title="Instituto Mexicano del Cemento y del Concreto A.C." />
                </div>
                <div class="container form-card">
                    <div class="col-md-4 col-md-offset-8">
                        <img src="images/logo-plataforma-cruz-azul.jpg" alt="Instituto Mexicano del Cemento y del Concreto A.C." title="Instituto Mexicano del Cemento y del Concreto A.C." style="margin-bottom: 20px;width: 100%;" />
                        <div class="form-card gcc">
                            <div class="alerta"></div>
                            <form class="account-create-gcc" method="POST">
                                <!--<a href="registro.php" style="position: relative;float: right;">NO TIENE CUENTA?, <b>REGÍSTRESE AQUÍ</b></a><br><hr>-->
                                <input name="email" type="email" placeholder="Usuario" class="form-control input-lg veintedos" required="required">
                                <input name="password" type="password" placeholder="Contraseña" class="form-control input-lg veintedos" required="required">
                                <button type="submit" class="btn btn-lg login veintedos"><span class="lnr lnr-user"></span> Ingresar a su cuenta</button>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
            <a href="https://imcyc.com/privacidad.html" target="_blank" style="position: fixed; bottom: 0; width: 100%; display: block; text-align: center; color: #111;font-weight: bold;font-size: 10px;">POLÍTICA DE PRIVACIDAD</a>
            <!-- /Page Content -->
            <?php require '../inc/footer2022.php'; ?>
        </div>
        <!-- Page Content -->
    </div>
    <!-- ProductStack -->

    <!-- jQuery Scripts  -->
    <script src="https://webinarsenconcreto.com/js/vendor/jquery/jquery.js"></script>
    <script src="https://webinarsenconcreto.com/js/vendor/bootstrap/bootstrap.min.js"></script>
    <script src="https://webinarsenconcreto.com/js/vendor/swiper/swiper.min.js"></script>
    <script src="https://webinarsenconcreto.com/js/vendor/slick/slick.min.js"></script>
    <script src="https://webinarsenconcreto.com/js/vendor/parallax/parallax.js"></script>
    <script src="https://webinarsenconcreto.com/js/vendor/isotope/isotope.pkgd.min.js"></script>
    <script src="https://webinarsenconcreto.com/js/vendor/magnificpopup/dist/jquery.magnific-popup.js"></script>
    <script src="https://webinarsenconcreto.com/js/vendor/countdown/jquery.countdown.min.js"></script>
    <script src="https://webinarsenconcreto.com/js/vendor/nouislider/nouislider.min.js"></script>
    <script src="https://webinarsenconcreto.com/js/vendor/ez-plus/jquery.ez-plus.js"></script>
    <script src="https://webinarsenconcreto.com/js/vendor/tocca/tocca.min.js"></script>
    <script src="https://webinarsenconcreto.com/js/vendor/bootstrap-tabcollapse/bootstrap-tabcollapse.js"></script>
    <script src="https://webinarsenconcreto.com/js/vendor/scrollLock/jquery-scrollLock.min.js"></script>
    <script src="https://webinarsenconcreto.com/js/vendor/darktooltip/dist/jquery.darktooltip.js"></script>
    <script src="https://webinarsenconcreto.com/js/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="https://webinarsenconcreto.com/js/vendor/instafeed/instafeed.min.js"></script>
    <script src="https://webinarsenconcreto.com/js/megamenu.min.js"></script>
    <script src="https://webinarsenconcreto.com/js/app.js"></script>
    <script src="js/app.js"></script>
    <script>
        $(document).ready(function(){
           $('.entrada22 .btn-entrada-22 .btn').on('click', function(){
               $('.entrada22').fadeToggle();
           });
        });
    </script>
</body>
</html>