<?php
session_start();

if(!isset($_SESSION['email'])){
    header("Location: https://cruzazul.webinarsenconcreto.com/");
    exit;
}

require $_SERVER['DOCUMENT_ROOT'].'/inc/head.php';
require $_SERVER['DOCUMENT_ROOT'].'/api/db.php';
$ide = $_SESSION['ide'];
$nombre = $_SESSION['nombre'];
$email = $_SESSION['email'];

$sql = "INSERT INTO actividad (usuario, url) VALUES ('$email','$_SERVER[REQUEST_URI]')";
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
    <!-- /Loader -->
    <div class="fixed-btns">
        <!-- Back To Top -->
        <a href="#" class="top-fixed-btn back-to-top"><span class="lnr lnr-chevron-up"></span></a>
        <!-- /Back To Top -->
    </div>
    <div id="wrapper">
        <!-- Page -->
        <div class="page-wrapper contenidos" style="margin: 0; padding: 0;width: 100%;">
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
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-9 contenidos">
                        <div class="menu-principal">
                            <div class="row">
                                <h3>Formación Técnica en Concreto:</h3>
                                <?php
                                $sqlCategoriasSuperiores = "SELECT * FROM categorias WHERE tipo='superior' ORDER BY id";
                                $categoriasSuperiores = $conn->query($sqlCategoriasSuperiores);
                                if ($categoriasSuperiores->num_rows > 0) {
                                    while ($row = $categoriasSuperiores->fetch_array()) {
                                        ?>
                                        <div class="col-md-2">
                                            <a href="/contenido.php?categoria=<?php echo $row["url"]; ?>&id=<?php echo $row["id"]; ?>" class="carta-manuales empresas-bloque grambelprods">
                                                <div class="capucha" style="background: url('images/<?php echo $row["imagen"]; ?>.png') center center;"></div>
                                                <div class="capucha-txt">
                                                    <h4 style="flex-direction: column;"><?php echo $row["nombre"]; ?></h4>
                                                </div>
                                            </a>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <div class="seccion-media">
                            
                        </div>
                        <div class="menu-bajo">
                            <div class="row">
                            <h3>Contenido Adicional:</h3>
                            
                            <?php
                            $sqlCategoriasInferiores = "SELECT * FROM categorias WHERE tipo='inferior' ORDER BY id";
                            $categoriasInferiores = $conn->query($sqlCategoriasInferiores);
                            if ($categoriasInferiores->num_rows > 0) {
                                while ($row = $categoriasInferiores->fetch_array()) {
                                    ?>
                                <div class="col-md-2">
                                        <a href="/<?php echo $row["url"]; ?>.php?id=<?php echo $row["id"]; ?>" class="carta-manuales empresas-bloque grambelprods">
                                            <div class="capucha" style="background: url('images/<?php echo $row["imagen"]; ?>.png') center center;"></div>
                                            <div class="capucha-txt">
                                                <h4 style="flex-direction: column;"><?php echo $row["nombre"]; ?></h4>
                                            </div>
                                        </a>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 barra">
                        <div style="text-align: center;">
                            <img src="images/logo-interior-cruz-azul.jpg" class="img-responsive" alt="Grupo Cementos de Chihuahua" title="Grupo Cementos de Chihuahua" style="width: 70%;margin: 0 auto;margin-top: 30px;background: #000;" >
                        </div>
                        <div style="text-align: center;">
                            <img src="images/badge_imcyc.png" class="img-responsive" alt="Grupo Cementos de Chihuahua" title="Grupo Cementos de Chihuahua" style="width: 30%;margin: 0 auto;" >
                        </div>
                    </div>
                </div>
            </div>
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            <main class="page-main recter" style="display:none;">
                <div class="container-fluid" style="padding-top: 0;">
                    <!-- /Two columns -->
                    <div class="row">
                        <div class="col-md-3 imcyc-bloque">
                            <a href="" class="carta imcyc-bloque">
                                <div class="capucha" style="background: url('/images/empresas-imcyc.jpg') center center;">
                                </div>
                                <div class="capuchatxt">
                                    <h4>CERTIFICACIONES<br>GCC</h4>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="" class="carta acis-bloque">
                                <div class="capucha" style="background: url('/images/bk11.jpeg') center center;">
                                </div>
                                <div class="capuchatxt">
                                    <h4>CERTIFICACIONES<br>ACI</h4>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="" class="carta asociaciones-bloque">
                                <div class="capucha" style="background: url('/images/bombeo.png') center center;">
                                </div>
                                <div class="capuchatxt">
                                    <h4>CERTIFICACIONES<br>ASOCIACIONES</h4>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="webinars.php?categoria=forense&modulo=1" class="carta-manuales empresas-bloque grambelprods">
                                <div class="capucha" style="background: url('/images/forense2021.jpg') center center;">
                                </div>
                                <div class="capuchatxt-grambell">
                                    <h4 style="flex-direction: column;">MANUALES</h4>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="revistacyt.php?categoria=revistacyt&estampa=pagado&codigo=<?php echo $codigo ?>" class="carta">
                                <div class="capucha" style="background: url('images/cytC.jpg') center center;"></div>
                                <div class="capuchatxt">
                                    <h4>CONSTRUCCIÓN Y TECNOLOGÍA EN CONCRETO</h4>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="" class="carta libreria-bloque">
                                <div class="capucha" style="background: url('images/libreriaC.jpg') center center;"></div>
                                <div class="capuchatxt">
                                    <h4>LIBRERÍA<br>DE LA CONSTRUCCIÓN</h4>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="concreton.php?categoria=concreton&codigo=<?php echo $codigo ?>" class="carta">
                                <div class="capucha" style="background: url('images/concretonC.jpg') center center;"></div>
                                <div class="capuchatxt">
                                    <h4>CONCRETÓN<br>PROBLEMAS CAUSAS Y SOLUCIONES</h4>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="lideres.php?categoria=lideres" class="carta">
                                <div class="capucha" style="background: url('images/lideresC.jpg') center center;"></div>
                                <div class="capuchatxt">
                                    <h4>LÍDERES<br>DE LA CONSTRUCCIÓN</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        
                        <div class="col-md-3">
                            <a href="congresos.php?categoria=congresos" class="carta">
                                <div class="capucha" style="background: url('images/encuentroC.jpg') center center;"></div>
                                <div class="capuchatxt">
                                    <h4>ENCUENTRO<br>IMCYC</h4>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="acervo.php" class="carta">
                                <div class="capucha" style="background: url('images/bkg_usuario_red.jpg') center center;"></div>
                                <div class="capuchatxt">
                                    <h4>ACERVO<br>IMCYC</h4>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="publicaciones_especiales.php" class="carta">
                                <div class="capucha" style="background: url('images/especialesC.jpg') center center;"></div>
                                <div class="capuchatxt">
                                    <h4>PUBLICACIONES ESPECIALES<br>IMCYC</h4>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="revistacyt.php?categoria=revistacyt&estampa=gratis" class="carta">
                                <div class="capucha" style="background: url('images/cytC.jpg') center center;"></div>
                                <div class="capuchatxt">
                                    <h4>CONSTRUCCIÓN Y TECNOLOGÍA EN CONCRETO</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </main>
            
            <main class="page-main">
                <div class="container categorias" style="padding-top: 0;">
                    <div class="row acis-bloque bloque-seleccion titulo" style="margin-bottom: 10px;">
                        <div class="col-md-12">
                            <div class="elregreso"></div>
                            <h2 class="text-center piprin"><span class="lnr lnr-arrow-right"></span> CERTIFICACIONES ACI</h2>
                        </div>
                    </div>
                    
                    <div class="row acis-bloque bloque-seleccion">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-xs-12 col-sm-3">
                                    <a class="category-block show-certificaciones-aci">
                                        <div class="category-image">
                                            <img src="/images/bk11.jpeg" alt="webinars en concreto instituto mexicano del cemento y del concreto" title="webinars en concreto instituto mexicano del cemento y del concreto">
                                        </div>
                                        <div class="category-title">
                                            CERTIFICACIONES
                                        </div>
                                    </a>
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                    <a class="category-block show-evaluaciones-aci">
                                        <div class="category-image">
                                            <img src="/images/bk11.jpeg" alt="webinars en concreto instituto mexicano del cemento y del concreto" title="webinars en concreto instituto mexicano del cemento y del concreto">
                                        </div>
                                        <div class="category-title">
                                            EVALUACIONES
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    </div>

                <div class="row manuales-bloque" style="margin: 10px;">
                    <!-- Center column -->
                    <div class="col-md-12">
                        <div class="elregreso"></div>
                        <h2 class="text-center piprin"><span class="lnr lnr-chevron-down"></span> Manuales</h2>
                    </div>
                    <div class="row" style="margin: 30px 10px;">

                        <?php
                        if(($tipo == 'admin')){
                        ?>
                        <div class="col-xs-12 col-sm-3 mt-2" style="margin-bottom:20px;">
                            <a href="webinars.php?categoria=forense&modulo=1" class="category-block">
                                <div class="category-image">
                                    <img src="images/forense2021.jpg" alt="webinars en concreto instituto mexicano del cemento y del concreto" title="webinars en concreto instituto mexicano del cemento y del concreto">
                                </div>
                                <div class="category-title" style="height: 150px;">
                                    MANUAL DE EVALUACIÓN FORENSE
                                </div>
                            </a>
                        </div>
                        <?php
                        } else {
                        ?>
                        <div class="col-xs-12 col-sm-3 mt-2" style="margin-bottom:20px;">
                            <a href="#" class="category-block">
                                <div class="category-image">
                                    <img src="images/forense2021.jpg" alt="webinars en concreto instituto mexicano del cemento y del concreto" title="webinars en concreto instituto mexicano del cemento y del concreto">
                                </div>
                                <div class="category-title" style="height: 150px;">
                                    MANUAL DE EVALUACIÓN FORENSE<br><span style="color:#ccc">SOLICITE SU INGRESO</span>
                                </div>
                            </a>
                        </div>
                        <?php
                        }
                        ?>

                        <?php
                        if(($tipo == 'admin')){
                        ?>
                        <div class="col-xs-12 col-sm-3 mt-2" style="margin-bottom:20px;">
                            <a href="webinars.php?categoria=pruebas-no-destructivas&modulo=1" class="category-block">
                                <div class="category-image">
                                    <img src="images/pruebas-nd-1.jpg" alt="webinars en concreto instituto mexicano del cemento y del concreto" title="webinars en concreto instituto mexicano del cemento y del concreto">
                                </div>
                                <div class="category-title" style="height: 150px;">
                                    PRUEBAS NO DESTRUCTIVAS<br>APLICADAS AL CONCRETO
                                </div>
                            </a>
                        </div>
                        <?php
                        } else {
                        ?>
                        <div class="col-xs-12 col-sm-3 mt-2" style="margin-bottom:20px;">
                            <a href="#" class="category-block">
                                <div class="category-image">
                                    <img src="images/pruebas-nd-1.jpg" alt="webinars en concreto instituto mexicano del cemento y del concreto" title="webinars en concreto instituto mexicano del cemento y del concreto">
                                </div>
                                <div class="category-title" style="height: 150px;">
                                    PRUEBAS NO DESTRUCTIVAS<br>APLICADAS AL CONCRETO<span style="color:#ccc">SOLICITE SU INGRESO</span>
                                </div>
                            </a>
                        </div>
                        <?php
                        }
                        ?>

                        <?php
                        if(($tipo == 'admin')){
                        ?>
                        <div class="col-xs-12 col-sm-3 mt-2" style="margin-bottom:20px;">
                            <a href="webinars.php?categoria=puentes-de-concreto&modulo=1" class="category-block">
                                <div class="category-image">
                                    <img src="images/puentes-de-concreto.jpg" alt="webinars en concreto instituto mexicano del cemento y del concreto" title="webinars en concreto instituto mexicano del cemento y del concreto">
                                </div>
                                <div class="category-title" style="height: 150px;">
                                    INSPECCIÓN Y MANTENIMIENTO<br>PUENTES DE CONCRETO
                                </div>
                            </a>
                        </div>
                        <?php
                        } else {
                        ?>
                        <div class="col-xs-12 col-sm-3 mt-2" style="margin-bottom:20px;">
                            <a href="#" class="category-block">
                                <div class="category-image">
                                    <img src="images/puentes-de-concreto.jpg" alt="webinars en concreto instituto mexicano del cemento y del concreto" title="webinars en concreto instituto mexicano del cemento y del concreto">
                                </div>
                                <div class="category-title" style="height: 150px;">
                                    INSPECCIÓN Y MANTENIMIENTO PUENTES DE CONCRETO<span style="color:#ccc">SOLICITE SU INGRESO</span>
                                </div>
                            </a>
                        </div>
                        <?php
                        }
                        ?>



                        <div class="col-xs-12 col-sm-3 mt-2" style="margin-bottom:20px;">
                            <a href="webinars.php?categoria=manual-de-construccion&modulo=1" class="category-block">
                                <div class="category-image">
                                    <img src="images/manual-de-construccion.jpg" alt="webinars en concreto instituto mexicano del cemento y del concreto" title="webinars en concreto instituto mexicano del cemento y del concreto">
                                </div>
                                <div class="category-title" style="height: 150px;">
                                    MANUAL DE CONSTRUCCIÓN<br>DE VIVIENDA
                                </div>
                            </a>
                        </div>

                        <?php
                        if(($tipo == 'admin')){
                        ?>
                        <div class="col-xs-12 col-sm-3 mt-2" style="margin-bottom:20px;">
                            <a href="webinars.php?categoria=geotecnia" class="category-block">
                                <div class="category-image">
                                    <img src="images/geotecnia.jpg" alt="webinars en concreto instituto mexicano del cemento y del concreto" title="webinars en concreto instituto mexicano del cemento y del concreto">
                                </div>
                                <div class="category-title" style="height: 150px;">
                                    EL CONCRETO EN LA GEOTÉCNIA
                                </div>
                            </a>
                        </div>
                        <?php
                        } else {
                        ?>
                        <div class="col-xs-12 col-sm-3 mt-2" style="margin-bottom:20px;">
                            <a href="#" class="category-block">
                                <div class="category-image">
                                    <img src="images/geotecnia.jpg" alt="webinars en concreto instituto mexicano del cemento y del concreto" title="webinars en concreto instituto mexicano del cemento y del concreto">
                                </div>
                                <div class="category-title" style="height: 150px;">
                                    EL CONCRETO EN LA GEOTÉCNIA<span style="color:#ccc">SOLICITE SU INGRESO</span>
                                </div>
                            </a>
                        </div>
                        <?php
                        }
                        ?>


                    </div>
                </div>


                <!-- Two columns -->
                <div class="row lideres-bloque">
                    <!-- Center column -->
                    <div class="col-md-12">
                        <div class="elregreso"></div>
                        <h2 class="text-center piprin"><span class="lnr lnr-chevron-down"></span> Líderes de la Construcción</h2>
                        <div class="row" style="margin-top: 20px; margin-bottom: 50px;">
                            <div class="col-xs-12 col-sm-3">
                                <a href="lideres.php?categoria=uribe" class="category-block">
                                    <div class="category-image" style="max-height:400px;overflow: hidden;">
                                        <img src="images/ruribe.jpg" alt="webinars en concreto instituto mexicano del cemento y del concreto" title="webinars en concreto instituto mexicano del cemento y del concreto" style="margin-top: -50px;">
                                    </div>
                                    <div class="category-title" style="background: #111111;color:#fff;line-height: 20px;min-height: 70px;flex-direction: column;">
                                        <h3 style="color:#ddd;">ING. ROBERTO URIBE AFIF</h3>
                                        <p style="font-size: 1.3rem;">Manual de identificación práctica de minerales y rocas para su uso como agregados para concreto</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Two columns -->
                <div class="row libreria-bloque">
                    <!-- Center column -->
                    <div class="col-md-12">
                        <div class="elregreso"></div>
                        <h2 class="text-center piprin"><span class="lnr lnr-chevron-down"></span> Librería de la construcción</h2>
                        <div class="container">
                        <div class="row" style="margin-top: 20px; margin-bottom: 5px;">

                            <?php
                            foreach ($unidadesArray as $value) {
                                if ($value['catego'] == "libreria IMCYC") {
                                    ?>
                                    <div class="col-xs-12 col-md-2 col-sm-3" style="margin-bottom: 15px">
                                        <a href="libreria.php?categoria=libreria&autor=<?php echo $value['id'] ?>" class="category-block">
                                            <div class="category-image">
                                                <img src="<?php echo $value['imagen'] ?>" alt="webinars en concreto instituto mexicano del cemento y del concreto" title="webinars en concreto instituto mexicano del cemento y del concreto">
                                            </div>
                                            <div class="category-title">
                                                <h3 style="color:#ddd;max-height:30px;font-size:1rem;overflow: auto;"><?php echo $value['titulo'] ?></h3>
                                            </div>
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
                
            </main>
            <!-- /Page Content -->
            <!-- Footer -->
            <?php /* require 'inc/footer.php'; */ ?>
            <!-- /Footer -->
        </div>
        <!-- Page Content -->
    </div>


    <!-- jQuery Scripts  -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.conekta.io/js/latest/conekta.js"></script>
    
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
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/plyr/3.6.2/plyr.min.js"></script>
    <!--
    <script src="//js.stripe.com/v3/"></script>
    <script src="https://www.webinarsenconcreto.com/js/charge.js"></script>
    -->
    <script src="https://www.webinarsenconcreto.com/js/chargeConekta.js"></script>
    <script src="js/app.js"></script>
    
    <script src="js/app.js"></script>
    <script>

        const playersalon1 = new Plyr('#playersalon1', {});
        window.player = playersalon1;
    </script>
</body>
</html>