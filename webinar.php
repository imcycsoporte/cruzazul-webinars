<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: https://cruazul.webinarsenconcreto.com/");
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
$cert = $_GET['cert'];
$cat = $_GET['cat'];
$urlDocs = "";
if ($webinar) {
    $urlDocs = "/webinars/$categoria/webinar/$webinar/$tipo.pdf";
} else {
    $urlDocs = "/webinars/$categoria/$tipo.pdf";
}

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
                    <?php if ($categoria === "pruebas-fisicas-de-cemento" && $tipo === "presentación-ejecutiva") { ?>
                        <div class="col-md-9 contenidos" style="background: rgba(13, 74, 144, 0.8);">
                            <?php
                            $sqleV = "SELECT * FROM normas WHERE id_categoria=" . (int) $id . " ORDER BY id";
                            $resultV = $conn->query($sqleV);
                            if ($resultV->num_rows > 0) {
                                while ($rowV = $resultV->fetch_array()) {
                                    ?>
                                    <div class="col-md-6">
                                        <a href="normas.php?categoria=<?php echo $categoria; ?>&id=<?php echo $id; ?>&tipo=<?php echo $tipo; ?>&norma=<?php echo $rowV['nombre']; ?>"
                                            class="tarjeta_webinar">
                                            <span class="material-symbols-outlined">add_circle</span> <?php echo $rowV['nombre']; ?>
                                        </a>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                <?php } else if ($cert == "aci") { ?>
                    <?php if ($categoria === "tecnico-en-pruebas-de-agregados" || $categoria === "tecnico-y-acabador-de-superficies-planas-de-concreto") { ?>
                            <div class="col-md-9 contenidos" style="background: rgba(0,0,0,0.5);">
                                <div class="row" style="padding:20px;">
                                    <div id="container"></div>
                                </div>
                            </div>
                    <?php } else { ?>
                            <div class="col-md-9 contenidos" style="background: rgba(0,0,0,0.5);">
                                <div class="row" style="padding:20px;">
                                    <?php
                                    $sqleW = "SELECT * FROM webinars WHERE id_contenido=" . (int) $id . " ORDER BY id";
                                    $resultW = $conn->query($sqleW);
                                    if ($resultW->num_rows > 0) {
                                        while ($rowW = $resultW->fetch_array()) {
                                            ?>
                                            <div class="col-md-6">
                                                <a href="/webinar.php?categoria=<?php echo $categoria; ?>&id=<?php echo $id; ?>&webinar=<?php echo $rowW['webinar']; ?>&cat=aci&tipo=presentaci%C3%B3n-ejecutiva"
                                                    class="tarjeta_webinar">
                                                <?php echo $rowW['titulo']; ?>
                                                </a>
                                            </div>
                                        <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                    <?php } ?>
                <?php } else { ?>
                        <div class="col-md-9 contenidos" style="background: rgba(0,0,0,0.5);">
                            <div class="row" style="padding:20px;">
                                <div id="container"></div>
                            </div>
                        </div>
                <?php } ?>
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
    <script src="https://webinarsenconcreto.com/js/flipbook.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#container").flipBook({
                pdfUrl: "<?php echo $urlDocs; ?>",
                backgroundColor: 'transparent',
                viewMode: '3d',
                singlePageMode: true,
                pages: [
                    { title: "Cover" },
                    { title: "" },
                    { title: "Page 3" },
                    { title: "" },
                    { title: "" },
                    { title: "" },
                    { title: "" },
                    { title: "End" },
                ],
                btnToc: { enabled: false },
                btnSelect: { enabled: false },
                btnDownloadPages: { enabled: false },
                btnDownloadPdf: { enabled: false },
                btnPrint: { enabled: false },
                btnShare: { enabled: false },
                btnZoomIn: { vAlign: 'top', hAlign: 'right', background: '#ed1d25' },
                btnZoomOut: { vAlign: 'top', hAlign: 'right', background: '#ed1d25' },
                btnSound: { vAlign: 'top', hAlign: 'right', background: '#ed1d25' },
                btnThumbs: { vAlign: 'top', hAlign: 'right', background: '#ed1d25' },
                btnBookmark: { enabled: false },
                btnExpand: { vAlign: 'top', hAlign: 'right', background: '#ed1d25' },
                btnAutoplay: { vAlign: 'top', hAlign: 'right', background: '#ed1d25' },
                currentPage: { hAlign: 'center' },
                btnBackground: 'rgb(16 74 159);'
            });

        })
    </script>
</body>