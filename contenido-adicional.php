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
$tipo = $_GET['tipo'];
$webinar = $_GET['webinar'];
$urlDocs = "";
if($webinar){
    $urlDocs = "https://www.webinarsenconcreto.com/imcyc/libros/grado.pdf";
} else {
    $urlDocs = "https://www.webinarsenconcreto.com/imcyc/libros/grado.pdf";
}
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
                            $sqluno = "SELECT * FROM contenido_adicional WHERE id_contenido=" . (int) $id;
                            $resultuno = $conn->query($sqluno);
                            if ($resultuno->num_rows > 0) {
                                while ($rowuno = $resultuno->fetch_array()) {
                                    $test = $rowuno['id_libro'];
                                    $sqldos = "SELECT * FROM libros WHERE id=" . (int) $test;
                                    $resultdos = $conn->query($sqldos);
                                    if ($resultdos->num_rows > 0) {
                                        while ($rowdos = $resultdos->fetch_array()) {
                                    ?>
                                        <div class="col-md-3" style="padding: 10px">
                                            <a href="https://pay.conekta.com/link/ff13e9632d0d455bb49ee706e4110f58" target="_blank">
                                                <img src="<?php echo $rowdos['imagen']; ?>" alt="<?php echo $rowdos['archivo']; ?>" title="<?php echo $rowdos['archivo']; ?>" style="width:100%;" />
                                                <h3 style="background: #e93d42;padding: 10px;color: #fff;font-family: 'Oswald';">PRECIO: $<?php echo $rowdos['precio']; ?>.00</h3>
                                            </a>
                                        </div>
                                    <?php
                                        }
                                    }
                                }
                            }
                            ?>
                            
                            
                            
                            
                            
                            
                            <!--
                            <?php 
                            if($categoria == "módulo-durabilidad-de-las-estructuras-de-concreto" && $webinar != "tres" && $webinar != "cuatro" && $webinar != "cinco"){
                            ?>
                            <div class="col-md-3" style="padding: 10px">
                                <a href="https://pay.conekta.com/link/ff13e9632d0d455bb49ee706e4110f58" target="_blank">
                                    <img src="https://www.webinarsenconcreto.com/imcyc/libros/ACCION_DE_LOS_AGENTES_QUIMICOS_Y_FISICOS_SOBRE_EL_CONCRETO_CONSULTA.jpg" alt="" title="" style="width:100%;" />
                                    <h3 style="background: #e93d42;padding: 10px;color: #fff;font-family: 'Oswald';">PRECIO: $225.00</h3>
                                </a>
                            </div>
                            <div class="col-md-3" style="padding: 10px">
                                <img src="https://www.webinarsenconcreto.com/imcyc/libros/CORROSION_EN_ESTRUCTURAS_DE_CONCRETO_ARMADO_CONSULTA.jpg" alt="" title="" style="width:100%;" />
                                <h3 style="background: #e93d42;padding: 10px;color: #fff;font-family: 'Oswald';">PRECIO: $300.00</h3>
                            </div>
                            <div class="col-md-3" style="padding: 10px">
                                <img src="https://www.webinarsenconcreto.com/imcyc/libros/EVALUACION_DE_ESTRUCTURAS_DE_CONCRETO_CONSULTA.jpg" alt="" title="" style="width:100%;" />
                                <h3 style="background: #e93d42;padding: 10px;color: #fff;font-family: 'Oswald';">PRECIO: $200.00</h3>
                            </div>
                            <div class="col-md-3" style="padding: 10px">
                                <img src="https://www.webinarsenconcreto.com/imcyc/libros/INFRAESTRUCTURA_DE_CONCRETO_ARMADO_DETERIORO_Y_OPCIONES_DE_PRESERVACION_CONSULTA.jpg" alt="" title="" style="width:100%;" />
                                <h3 style="background: #e93d42;padding: 10px;color: #fff;font-family: 'Oswald';">PRECIO: $250.00</h3>
                            </div>
                            <div class="col-md-3" style="padding: 10px">
                                <img src="https://webinarsenconcreto.com/images/caratulas/durabilidad.jpg" alt="" title="" style="width:100%;" />
                                <h3 style="background: #e93d42;padding: 10px;color: #fff;font-family: 'Oswald';">PRECIO: $300.00</h3>
                            </div>
                            <div class="col-md-3" style="padding: 10px">
                                <img src="https://webinarsenconcreto.com/images/caratulas/forense.jpg" alt="" title="" style="width:100%;" />
                                <h3 style="background: #e93d42;padding: 10px;color: #fff;font-family: 'Oswald';">PRECIO: $300.00</h3>
                            </div>
                            <?php 
                            }
                            ?>
                            <?php 
                            if($categoria == "técnico-en-pruebas-al-concreto-en-estado-fresco"){
                            ?>
                            <div class="col-md-3" style="padding: 10px">
                                <a href="https://pay.conekta.com/link/c413af20bb654441a9b82d9702a880fa" target="_blank">
                                    <img src="https://webinarsenconcreto.com/images/caratulas/grado.JPG" alt="" title="" style="width:100%;" />
                                    <h3 style="background: #e93d42;padding: 10px;color: #fff;font-family: 'Oswald';">PRECIO: $300.00</h3>
                                </a>
                            </div>
                            <?php 
                            }
                            ?>
                            <?php 
                            if($categoria == "evaluacion-forense-de-estructuras-de-concreto"){
                            ?>
                            <div class="col-md-3" style="padding: 10px">
                                <img src="https://webinarsenconcreto.com/images/caratulas/forense.jpg" alt="" title="" style="width:100%;" />
                                <h3 style="background: #e93d42;padding: 10px;color: #fff;font-family: 'Oswald';">PRECIO: $300.00</h3>
                            </div>
                            <?php 
                            }
                            ?>
                            <?php 
                            if($categoria == "tecnico-en-pruebas-de-resistencia"){
                            ?>
                            <div class="col-md-3" style="padding: 10px">
                                <img src="https://webinarsenconcreto.com/images/caratulas/grado.JPG" alt="" title="" style="width:100%;" />
                                <h3 style="background: #e93d42;padding: 10px;color: #fff;font-family: 'Oswald';">PRECIO: $300.00</h3>
                            </div>
                            <?php 
                            }
                            ?>
                            
                            <div class="col-md-3">
                                <img src="https://www.webinarsenconcreto.com/imcyc/libros/ACCION_DE_LOS_AGENTES_QUIMICOS_Y_FISICOS_SOBRE_EL_CONCRETO_CONSULTA.jpg" alt="" title="" style="width:100%;" />
                                <h3 style="background: #e93d42;padding: 10px;color: #fff;font-family: 'Oswald';">PRECIO: $225.00</h3>
                            </div>
                            <div class="col-md-3">
                                <img src="https://www.webinarsenconcreto.com/imcyc/libros/CORROSION_EN_ESTRUCTURAS_DE_CONCRETO_ARMADO_CONSULTA.jpg" alt="" title="" style="width:100%;" />
                                <h3 style="background: #e93d42;padding: 10px;color: #fff;font-family: 'Oswald';">PRECIO: $300.00</h3>
                            </div>
                            <div class="col-md-3">
                                <img src="https://www.webinarsenconcreto.com/imcyc/libros/EVALUACION_DE_ESTRUCTURAS_DE_CONCRETO_CONSULTA.jpg" alt="" title="" style="width:100%;" />
                                <h3 style="background: #e93d42;padding: 10px;color: #fff;font-family: 'Oswald';">PRECIO: $200.00</h3>
                            </div>
                            <div class="col-md-3">
                                <img src="https://www.webinarsenconcreto.com/imcyc/libros/INFRAESTRUCTURA_DE_CONCRETO_ARMADO_DETERIORO_Y_OPCIONES_DE_PRESERVACION_CONSULTA.jpg" alt="" title="" style="width:100%;" />
                                <h3 style="background: #e93d42;padding: 10px;color: #fff;font-family: 'Oswald';">PRECIO: $250.00</h3>
                            </div>
                            -->
                            <!--<div id="container"></div>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require 'inc/footer.php'; ?>
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
    <script src="https://pay.conekta.com/v1.0/js/components.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.js"></script>
    <script src="https://gcc.webinarsenconcreto.com/js/flipbook.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#container").flipBook({
                pdfUrl:"<?php echo $urlDocs; ?>",
                backgroundColor: 'transparent',
                viewMode: '3d',
                singlePageMode: true,
                pages:[
                    {title:"Cover"},
                    {title:""},
                    {title:"Page 3"},
                    {title:""},
                    {title:""},
                    {title:""},
                    {title:""},
                    {title:"End"},
                ],
                btnToc: {enabled:false},
                btnSelect: {enabled:false},
                btnDownloadPages : {enabled:false},
                btnDownloadPdf : {enabled:false},
                btnPrint : {enabled:false},
                btnShare : {enabled:false},
                btnZoomIn: { vAlign: 'top', hAlign: 'right', background: '#ed1d25' },
                btnZoomOut: { vAlign: 'top', hAlign: 'right', background: '#ed1d25' },
                btnSound: { vAlign: 'top', hAlign: 'right', background: '#ed1d25' },
                btnThumbs: { vAlign: 'top', hAlign: 'right', background: '#ed1d25' },
                btnBookmark: {enabled:false},
                btnExpand: { vAlign: 'top', hAlign: 'right', background: '#ed1d25' },
                btnAutoplay: { vAlign: 'top', hAlign: 'right', background: '#ed1d25' },
                currentPage: { hAlign: 'center' },
                btnBackground: 'rgb(16 74 159);'
            });

        })
    </script>
</body>