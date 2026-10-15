<?php
session_start();
require '../inc/head.php';
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
        <a href="#" class="top-fixed-btn back-to-top"><i class="icon icon-arrow-up"></i></a>
        <!-- /Back To Top -->
    </div>
    <div id="wrapper">
        <!-- Page -->
        <div class="page-wrapper">
            <?php require '../inc/header.php'; ?>
            <!-- Sidebar -->
            <div class="sidebar-wrapper">
                <div class="sidebar-top"><a href="#" class="slidepanel-toggle"><i class="icon icon-left-arrow-circular"></i></a></div>
                <div class="sidebar-bot">
                    <div class="share-button toTop">
                        <span class="toggle"></span>
                        <ul class="social-list">
                            <li>
                                <a href="#" class="icon icon-google google"></a>
                            </li>
                            <li>
                                <a href="#" class="icon icon-fancy fancy"></a>
                            </li>
                            <li>
                                <a href="#" class="icon icon-pinterest pinterest"></a>
                            </li>
                            <li>
                                <a href="#" class="icon icon-twitter-logo twitter"></a>
                            </li>
                            <li>
                                <a href="#" class="icon icon-facebook-logo facebook"></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Sidebar -->
            <!-- Page Content -->
            <main class="page-main">
                <div class="block">
                    <div class="container">
                        <div class="row row-eq-height">
                            <div class="col-sm-8 col-sm-offset-2">
                                <div class="form-card">
                                    <h4><span class="lnr lnr-chevron-right"></span> Registra tu cuenta</h4>
                                    <p>Por favor registra tus datos para ingresar a la plataforma.</p>
                                    <div class="alerta"></div>
                                    <form class="account-registro" method="POST">
                                        <label>Nombre<span class="required">*</span></label>
                                        <input name="pago" type="hidden" value="0">
                                        <input name="nombre" type="text" class="form-control input-lg" required="required">
                                        <label>Correo Electrónico<span class="required">*</span></label>
                                        <input name="email" type="email" class="form-control input-lg" required="required">
                                        <label>Teléfono Celular<span class="required">*</span></label>
                                        <input name="telefono" type="number" class="form-control input-lg" required="required">
                                        <label>Empresa<span class="required">*</span></label>
                                        <input name="empresa" type="text" class="form-control input-lg" required="required">
                                        <label>Ubicación<span class="required">*</span></label>
                                        <select name="ubicacion" class="form-control" required="required" style="height: 50px;">
                                            <option value="Aguascalientes">Aguascalientes</option>
                                            <option value="Baja California">Baja California</option>
                                            <option value="Baja California Sur">Baja California Sur</option>
                                            <option value="Campeche">Campeche</option>
                                            <option value="Chiapas">Chiapas</option>
                                            <option value="Chihuahua">Chihuahua</option>
                                            <option value="Ciudad de México">Ciudad de México</option>
                                            <option value="Coahuila">Coahuila</option>
                                            <option value="Colima">Colima</option>
                                            <option value="Durango">Durango</option>
                                            <option value="Guanajuato">Guanajuato</option>
                                            <option value="Guerrero">Guerrero</option>
                                            <option value="Hidalgo">Hidalgo</option>
                                            <option value="Jalisco">Jalisco</option>
                                            <option value="Estado de México">Estado de México</option>
                                            <option value="Michoacán">Michoacán</option>
                                            <option value="Morelos">Morelos</option>
                                            <option value="Nayarit">Nayarit</option>
                                            <option value="Nuevo León">Nuevo León</option>
                                            <option value="Oaxaca">Oaxaca</option>
                                            <option value="Puebla">Puebla</option>
                                            <option value="Querétaro">Querétaro</option>
                                            <option value="Quintana Roo">Quintana Roo</option>
                                            <option value="San Luis Potosí">San Luis Potosí</option>
                                            <option value="Sinaloa">Sinaloa</option>
                                            <option value="Sonora">Sonora</option>
                                            <option value="Tabasco">Tabasco</option>
                                            <option value="Tamaulipas">Tamaulipas</option>
                                            <option value="Tlaxcala">Tlaxcala</option>
                                            <option value="Veracruz">Veracruz</option>
                                            <option value="Yucatán">Yucatán</option>
                                            <option value="Zacatecas">Zacatecas</option>
                                        </select>
                                        <label>Tipo de usuario<span class="required">*</span></label>
                                        <select name="tipo" class="form-control" required="required" style="height: 50px;">
                                            <option value="Colaborador">Colaborador de GCC</option>
                                            <option value="Becario">Becario de GCC</option>
                                            <option value="Externo">Externo</option>
                                        </select>
                                        <label>Contraseña<span class="required">*</span></label>
                                        <input name="password" type="password" class="form-control input-lg" required="required">
                                        <div>
                                            <button type="submit" class="btn btn-lg login float-right"><span class="lnr lnr-arrow-right"></span> CONTINUAR </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <!-- /Page Content -->
            <?php require '../inc/footer.php'; ?>
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
    <script src="../js/app.js"></script>


</body>

</html>