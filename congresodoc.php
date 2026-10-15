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
$numero = $_GET['numero'];
$categoria = $_GET['categoria'];

require('api/db.php');
$sqle = "SELECT * FROM encuentro" . preg_replace('/[^a-z0-9_]/i', '', (string) $categoria) . " WHERE id=" . (int) $id;
$result = $connb->query($sqle);
$docu;
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $docu = $row['documento'];
    }
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
                    <div class="col-md-9 contenidos" style="background: rgba(0,0,0,0.8);">
                        <div class="row" style="padding:20px;">
                            <div id="container"></div>
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
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.js"></script>
    <script src="https://gcc.webinarsenconcreto.com/js/flipbook.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            let url;
            let anot = <?php echo $categoria; ?>;
            if (anot === 2017) {
                url = 'encuentro';
            } else if(anot === 2019){
                url = 'encuentrodos';
            } else {
                url = 'encuentrotres';
            };
            $("#container").flipBook({
                pdfUrl:`https://www.webinarsenconcreto.com/imcyc/eventos/${url}/<?php echo $docu; ?>`,
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
                btnZoomIn: { vAlign: 'top', hAlign: 'right' },
                btnZoomOut: { vAlign: 'top', hAlign: 'right' },
                btnSound: { vAlign: 'top', hAlign: 'right' },
                btnThumbs: { vAlign: 'top', hAlign: 'left' },
                btnBookmark: {enabled:false},
                btnExpand: { vAlign: 'top', hAlign: 'right' },
                btnAutoplay: { vAlign: 'top', hAlign: 'right' },
                currentPage: { hAlign: 'center' },
                btnBackground: 'rgb(16 74 159);'
            });

        })
    </script>
</body>