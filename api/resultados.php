<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: https://gcc.webinarsenconcreto.com/");
    exit; // antes seguía ejecutando sin sesión
}
require('db.php');
echo "<h1 style='margin: 0; padding: 0;'><span class='lnr lnr-arrow-right'></span> resultados</h1><hr>";

$value = (json_decode($_POST['resultados'], true));
//print_r($value);

$clima = $value[0]['value'];
$tipoevaluacion = $value[1]['value'];
$modulo = $value[2]['value'];
$categoria = $value[3]['value'];

/*$email = $_POST['email'];*/
$email = $_SESSION['email'];

$laPregunta = array();
$suma = array();
$indice = 1;

foreach ($value as $item) {
    $eltipete;
    if ($item['name'] === "eltipox") {
        $eltipete = "preguntas" . $item['value'];
    }

    $eltipetex = $eltipete;
    $delimiterTipetex = "-";
    $replacementTipetex = "";

    $resultTipetexx = str_replace($delimiterTipetex, $replacementTipetex, ucwords($eltipetex));
    $lowercaseStipetex = strtolower($resultTipetexx);

    if (strpos($item['name'], 'optradio') !== false) {
        $res = substr($item['name'], 9, 11);
        // Solo tablas de preguntas que existen e id numérico (antes ambos venían del navegador: inyección SQL).
        $tablasValidas = $tablasValidas ?? array_column($conn->query('SHOW TABLES')->fetch_all(), 0);
        $res = (int) $res;
        if (!is_string($lowercaseStipetex) || strpos($lowercaseStipetex, 'preguntas') === false || !in_array($lowercaseStipetex, $tablasValidas, true))
            continue;
        $sqle = "SELECT * FROM `" . $lowercaseStipetex . "` WHERE id=$res";
        $result = $conn->query($sqle);
        if ($result->num_rows > 0) {
            echo '<div class="container">';
            while ($row = $result->fetch_array()) {
                ?>
                <div class="row">
                    <div class="col-md-9">
                        <h4><?php echo $indice; ?> - <?php echo $row["pregunta"]; ?></h4>
                    </div>
                    <div class="col-md-3">
                        <h4 style="text-align: center;">
                            <?php
                            if ($item['value'] == 1) {
                                echo '<span class="lnr lnr-checkmark-circle" style="font-size:2rem;color:blue;"></span>';
                            } else {
                                echo '<span class="lnr lnr-cross-circle" style="font-size:2rem;color:red;"></span>';
                            }
                            ?>
                        </h4>
                    </div>
                </div>
                <?php
                $indice++;
            }
            echo '</div>';
        }

        if (strpos($item['name'], 'optradio') !== false) {
            array_push($suma, $item['value']);
        }
    }
}

foreach ($laPregunta as $pregunta) {
    echo $pregunta[1];
}

$total = array_sum($suma);
$totalPorcentual = (($total * 100) / 50);

//echo '<h2> TOTAL PORCENTUAL: '. $totalPorcentual .'%</h2>';

if ($totalPorcentual < 80) {
    ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h1 style="text-align:center;color: red;">Es necesario un porcentaje del <b>80%</b> para aprobar</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                    <?php
                    echo '<h2 style="margin-bottom: 0;">Respuestas correctas: <b>' . $total . '</b></h2>';
                    echo '<h1>El porcentaje de respuestas correctas es: <b>' . $totalPorcentual . '</b> %</h1>';
                    ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div id="chartdiv_"></div>
            </div>
        </div>
        <div class="demoexamenpaso">
            <div class="alerta"></div>
            <form action="/diploma/indexConstancia.php" method="post" enctype="multipart/form-data">
                <!--<form method="post" class="diplomaencriptado" enctype="multipart/form-data">-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <?php
                            $idcertificado = rand();
                            $elcursox;
                            $empresa;
                            ?>
                            <hr>
                            <label for="exampleInputEmail1">Ingrese su nombre completo para generar su certificado (incluya
                                su Título):</label>
                            <input type="hidden" name="email" value="<?php echo $email; ?>">
                            <input type="hidden" name="empresa" value="<?php echo $empresa; ?>">
                            <input type="hidden" name="elcursox" value="<?php echo $categoria; ?>">
                            <input type="hidden" name="idcertificado" value="<?php echo $idcertificado; ?>">
                            <input type="hidden" name="resultado" value="<?php echo $totalPorcentual; ?>">
                            <input type="hidden" name="tiempoTranscurrido" id="tiempoTranscurrido" value=""></span>

                            <input type="text" class="form-control" name="nombre"
                                placeholder="Ej. Ing. Fernanda Vera Monroy" required="required">
                            <label for="exampleInputEmail1">Ingrese su CURP:</label>
                            <input type="text" class="form-control" name="curp" required="required">
                            <label for="exampleInputEmail1">Seleccione su fotografía (tipo pasaporte):</label>
                            <input type="file" name="image" required="required" />
                        </div>
                    </div>
                    <div class="col-md-12">
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
                            <img src="images/qr.svg" alt="" title="">
                        </a>
                    </div>
                    <h3>2) Con el siguiente código:</h3>
                    <h1 class="font-bold text-center">
                        <?php
                        echo $idcertificado;
                        ?>
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <?php
} else {
    //echo '<h1 style="text-align:center;color: blue;">Felicidades!!!<br>Usted ha obtenido un procentaje</h1>';
    ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h1 style="text-align:center;color: blue;">Felicidades!!!<br>Su porcentaje ha superado el <b>80%</b> de
                    preguntas </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                            <?php
                            if ($eltipox === "SILLETAS - MÓDULO 1") {
                                echo '<h2 style="margin-bottom: 0;">Respuestas correctas: <b>' . $total . '</b> (17 posibles)</h2>';
                            } else {
                                echo '<h2 style="margin-bottom: 0;">Respuestas correctas: <b>' . $total . '</b> (25 posibles)</h2>';
                            }

                            echo '<h1>El porcentaje de respuestas correctas es: <b>' . $totalPorcentual . '</b> %</h1>';
                            ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div id="chartdiv_"></div>
            </div>
        </div>
        <div class="demoexamenpaso">
            <div class="alerta"></div>
            <form action="/diploma/indexConstancia.php" method="post" enctype="multipart/form-data">
                <!--<form method="post" class="diplomaencriptado" enctype="multipart/form-data">-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <?php
                            $idcertificado = rand();
                            $elcursox;
                            $empresa;
                            ?>
                            <hr>
                            <label for="exampleInputEmail1">Ingrese su nombre completo para generar su certificado (incluya
                                su Título):</label>
                            <input type="hidden" name="email" value="<?php echo $email; ?>">
                            <input type="hidden" name="empresa" value="<?php echo $empresa; ?>">
                            <input type="hidden" name="elcursox" value="<?php echo $elcursox; ?>">
                            <input type="hidden" name="idcertificado" value="<?php echo $idcertificado; ?>">
                            <input type="hidden" name="resultado" value="<?php echo $totalPorcentual; ?>">
                            <input type="hidden" name="tiempoTranscurrido" id="tiempoTranscurrido" value=""></span>

                            <input type="text" class="form-control" name="nombre"
                                placeholder="Ej. Ing. Fernanda Vera Monroy" required="required">
                            <label for="exampleInputEmail1">Ingrese su CURP:</label>
                            <input type="text" class="form-control" name="curp" required="required">
                            <label for="exampleInputEmail1">Seleccione su fotografía (tipo pasaporte):</label>
                            <input type="file" name="image" required="required" />
                        </div>
                    </div>
                    <div class="col-md-12">
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
                            <img src="images/qr.svg" alt="" title="">
                        </a>
                    </div>
                    <h3>2) Con el siguiente código:</h3>
                    <h1 class="font-bold text-center">
                        <?php
                        echo $idcertificado;
                        ?>
                    </h1>
                </div>
            </div>
        </div>
    </div>


    <?php
}
?>