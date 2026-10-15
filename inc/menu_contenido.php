<?php
require $_SERVER['DOCUMENT_ROOT'].'/api/db.php';
$stringTitulo = $categoria;
$delimiterTitulo = "-";
$replacementTitulo = " ";

$resultTitulo = str_replace($delimiterTitulo, $replacementTitulo, ucwords($stringTitulo));

$string = $tipo;
$delimiter = "-";
$replacement = " ";

$result = str_replace($delimiter, $replacement, ucwords($string));

$existeEvaluacionDiagnostico = 0;
$existePresentacionEjecutiva = 0;
$existePresentacionEnLinea = 0;
$existePresentacionGrabada = 0;
$existeDatoEnConcreto = 0;
$existeInfografias = 0;
$existeVideo = 0;
$existeEvaluacionFinal = 0;
$existeContenidoAdicional = 0;

$sqlMenuContenidoEspecial = "SELECT * FROM contenido WHERE url='" . addslashes((string) $categoria) . "'";
$menuContenidoEspecial = $conn->query($sqlMenuContenidoEspecial);
if ($menuContenidoEspecial->num_rows > 0) {
    while ($rowContenidoEspecial = $menuContenidoEspecial->fetch_array()) {
        $existeEvaluacionDiagnostico = $rowContenidoEspecial['evaluaciondiagnostico'];
        $existePresentacionEjecutiva = $rowContenidoEspecial['presentacion-ejecutiva'];
        $existePresentacionEnLinea = $rowContenidoEspecial['presentacion-en-linea'];
        $existePresentacionGrabada = $rowContenidoEspecial['presentacion-grabada'];
        $existeDatoEnConcreto = $rowContenidoEspecial['dato-en-concreto'];
        $existeInfografias = $rowContenidoEspecial['infografias'];
        $existeVideo = $rowContenidoEspecial['video'];
        $existeEvaluacionFinal = $rowContenidoEspecial['evaluacion-final'];
        $existeContenidoAdicional = $rowContenidoEspecial['contenidoadiconal'];
    }    
}

$clase_EvaluacionDiagnostico = $existeEvaluacionDiagnostico == 1 ? "exist" : "";
$clase_PresentacionEjecutiva = $existePresentacionEjecutiva == 1 ? "exist" : "";
$clase_PresentacionEnLinea = $existePresentacionEnLinea == 1 ? "exist" : "";
$clase_PresentacionGrabada = $existePresentacionGrabada == 1 ? "exist" : "";
$clase_DatoEnConcreto = $existeDatoEnConcreto == 1 ? "exist" : "";
$clase_Infografias = $existeInfografias == 1 ? "exist" : "";
$clase_Video = $existeVideo == 1 ? "exist" : "";
$clase_EvaluacionFinal = $existeEvaluacionFinal == 1 ? "exist" : "";
$clase_ContenidoAdicional = $existeContenidoAdicional == 1 ? "exist" : "";

$cert = $_GET["cert"];
$cat = $_GET["cat"];

?>
<div class="tit_webinar">
    <a href="javascript:history.go(-1)" class="regresar">
        <span class="material-symbols-outlined regresar">chevron_left</span>
    </a>
    <h2>
        <?php echo $resultTitulo; ?><br>
        <?php if($webinar){ ?>
            <span><b>WEBINAR <?php echo $webinar; ?></b></span>
        <?php } ?>
    </h2>
</div>
<div class="menu_webinars">
    <ul>
        <?php
        $sqlMenu = "SELECT * FROM menu_webinar ORDER BY orden";
        $menuWebinars = $conn->query($sqlMenu);
        if ($menuWebinars->num_rows > 0) {
            while ($row = $menuWebinars->fetch_array()) {
                $clase_activa = $result == $row["nombre"] ? "active" : "";
                ?>
                    <?php
                        
                        if($row["nombre"] == 'Evaluación diagnóstico'){
                            echo '<li>';
                            if($webinar){
                                echo '<a href="/evaluacion.php?categoria='. $categoria .'&id='. $id .'&webinar='. $webinar .'&tipo='. $row["url"] .'" class="'. $clase_activa .' '. $clase_EvaluacionDiagnostico .'">';
                            } else {
                                echo '<a href="/evaluacion.php?categoria='. $categoria .'&id='. $id .'&tipo='. $row["url"] .'" class="'. $clase_activa .' '. $clase_EvaluacionDiagnostico .'">';
                            }
                            echo '<span class="material-symbols-outlined">'.$row["orden"].'</span>'.$row["nombre"].'';
                            echo '</a>';
                            echo '</li>';
                        } else if($row["nombre"] == 'Presentación ejecutiva'){
                            echo '<li>';
                            if($webinar){
                                echo '<a href="/webinar.php?categoria='. $categoria .'&id='. $id .'&webinar='. $webinar .'&tipo='. $row["url"] .'" class="'. $clase_activa .' '. $clase_PresentacionEjecutiva .'">';
                            } else {
                                echo '<a href="/webinar.php?categoria='. $categoria .'&id='. $id .'&tipo='. $row["url"] .'" class="'. $clase_activa .' '. $clase_PresentacionEjecutiva .'">';
                            }
                            echo '<span class="material-symbols-outlined">'.$row["orden"].'</span>'.$row["nombre"].'';
                            echo '</a>';
                            echo '</li>';
                        } else if($row["nombre"] == 'Presentación en línea'){
                            echo '<li>';
                                if($webinar){
                                    echo '<a href="/presentacion-en-linea.php?categoria='. $categoria .'&id='. $id .'&webinar='. $webinar .'&tipo='. $row["url"] .'" class="'. $clase_activa .' '. $clase_PresentacionEnLinea .'">';
                                } else {
                                    echo '<a href="/presentacion-en-linea.php?categoria='. $categoria .'&id='. $id .'&tipo='. $row["url"] .'" class="'. $clase_activa .' '. $clase_PresentacionEnLinea .'">';
                                }
                            echo '<span class="material-symbols-outlined">'.$row["orden"].'</span>'.$row["nombre"].'';
                            echo '</a>';
                            echo '</li>';
                        } else if($row["nombre"] == 'Dato en concreto'){
                            echo '<li>';
                            if($webinar){
                                echo '<a href="/webinar.php?categoria='. $categoria .'&id='. $id .'&webinar='. $webinar .'&tipo='. $row["url"] .'" class="'. $clase_activa .' '. $clase_DatoEnConcreto .'">';
                            } else {
                                echo '<a href="/webinar.php?categoria='. $categoria .'&id='. $id .'&tipo='. $row["url"] .'" class="'. $clase_activa .' '. $clase_DatoEnConcreto .'">';
                            }
                            echo '<span class="material-symbols-outlined">'.$row["orden"].'</span>'.$row["nombre"].'';
                            echo '</a>';
                            echo '</li>';
                        } else if($row["nombre"] == 'Infografías'){
                            echo '<li>';
                            if($webinar){
                                echo '<a href="/webinar.php?categoria='. $categoria .'&id='. $id .'&webinar='. $webinar .'&tipo='. $row["url"] .'" class="'. $clase_activa .' '. $clase_Infografias .'">';
                            } else {
                                echo '<a href="/webinar.php?categoria='. $categoria .'&id='. $id .'&tipo='. $row["url"] .'" class="'. $clase_activa .' '. $clase_Infografias .'">';
                            }
                            echo '<span class="material-symbols-outlined">'.$row["orden"].'</span>'.$row["nombre"].'';
                            echo '</a>';
                            echo '</li>';
                        } else if($row["nombre"] == 'Video'){
                            echo '<li>';
                            if($webinar){
                                echo '<a href="/video.php?categoria='. $categoria .'&id='. $id .'&webinar='. $webinar .'&tipo='. $row["url"] .'" class="'. $clase_activa .' '. $clase_Video .'">';
                            } else {
                                echo '<a href="/video.php?categoria='. $categoria .'&id='. $id .'&tipo='. $row["url"] .'" class="'. $clase_activa .' '. $clase_Video .'">';
                            }
                            echo '<span class="material-symbols-outlined">'.$row["orden"].'</span>'.$row["nombre"].'';
                            echo '</a>';
                            echo '</li>';
                        } else if($row["nombre"] == 'Contenido adicional'){
                            echo '<li>';
                            
                            if($webinar){
                                echo '<a href="/contenido-adicional.php?categoria='. $categoria .'&id='. $id .'&webinar='. $webinar .'&tipo='. $row["url"] .'" class="'. $clase_activa .' '. $clase_ContenidoAdicional .'">';
                            } else {
                                echo '<a href="/contenido-adicional.php?categoria='. $categoria .'&id='. $id .'&tipo='. $row["url"] .'" class="'. $clase_activa .' '. $clase_ContenidoAdicional .'">';
                            }
                            echo '<span class="material-symbols-outlined">'.$row["orden"].'</span>'.$row["nombre"].'';
                            echo '</a>';
                            echo '</li>';
                        } else if($row["nombre"] == 'Constancia de asistencia'){
                            echo '<li>';
                            if($webinar){
                                echo '<a href="/constancia-asistencia.php?categoria='. $categoria .'&id='. $id .'&webinar='. $webinar .'&tipo='. $row["url"] .'" class="'. $clase_activa .' exist">';
                            } else {
                                echo '<a href="/constancia-asistencia.php?categoria='. $categoria .'&id='. $id .'&tipo='. $row["url"] .'" class="'. $clase_activa .' exist">';
                            }
                            echo '<span class="material-symbols-outlined">'.$row["orden"].'</span>'.$row["nombre"].'';
                            echo '</a>';
                            echo '</li>';
                        } else if($row["nombre"] == 'Evaluación final'){
                            echo '<li>';
                            echo '<a data-toggle="modal" data-target="#pagoDigitalExamenFinalModal" class="'. $clase_activa .' '. $clase_EvaluacionFinal .'">';
                            echo '<span class="material-symbols-outlined">'.$row["orden"].'</span>'.$row["nombre"].'';
                            echo '</a>';
                            echo '</li>';
                        }
                    ?>
                <?php
            }
        }
        ?>
    </ul>
</div>

<div class="modal fade" id="pagoDigitalExamenFinalModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="width: 90%;">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Realice su pago</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="resultado_transaccion"></div>
                <div class="row">
                    <div class="col-md-2">
                        <img src="/images/dilpoma_mini.jpg" style="width:100%;" alt="webinars sobre concreto y cemento" title="webinars sobre concreto y cemento">
                    </div>
                    
                    <div class="col-md-5">
                        <div class="col-md-12">
                            <form method="post" id="payment-form">
                                <div class="form-row">
                                    <p>PRODUCTO:</p>
                                    <input type="text" name="productoIdExamenFinal" id="productoId" value="CONSTANCIA DE APTITUD IMCYC" disabled/>
                                    <p>PRECIO <b>$1,000.00 + IVA</b>:</p>
                                    <input type="text" name="precioIdExamenFinal" id="precioId" value="1000" disabled/>
                                    <input type="hidden" name="usuarioIdExamenFinal" id="usuarioId" value="" disabled/>
                                    <label for="card-element">Aceptamos cualquier tarjeta de crédito o débito:</label>
                                    <div id="card-element">
                                        <!-- a Stripe Element will be inserted here. -->
                                    </div>
                                    <!-- Used to display form errors -->
                                    <div id="card-errors"></div>
                                </div>
                                <a href="https://pay.conekta.com/link/ce6948059cfb45b196a257c69236732d" class="btn btn-secondary" target="_blank">PAGAR</a>
                            </form>
                        </div>
                    </div>
                    <?php if($cert == "certificacion-aci" || $cert == "aci" || $cat == "aci"){ ?>
                    <div class="col-md-5">
                        <div class="col-md-12">
                            <form method="post" id="payment-form">
                                <div class="form-row">
                                    <p>PRODUCTO:</p>
                                    <input type="text" name="productoIdExamenFinal" id="productoId" value="CERTIFICACIÓN ACI" disabled/>
                                    <p>PRECIO <b>$4,500.00 + IVA</b>:</p>
                                    <input type="text" name="precioIdExamenFinal" id="precioId" value="4500" disabled/>
                                    <input type="hidden" name="usuarioIdExamenFinal" id="usuarioId" value="" disabled/>
                                    <label for="card-element">Examen Presencial en el IMCYC favor de verificar disponibilidad. <a href="mail_to:cursos@imcyc.com">cursos@imcyc.com</a> 5553225740 ext 210<br><br>Aceptamos cualquier tarjeta de crédito o débito:</label>
                                    <div id="card-element">
                                        <!-- a Stripe Element will be inserted here. -->
                                    </div>
                                    <!-- Used to display form errors -->
                                    <div id="card-errors"></div>
                                </div>
                                <a href="https://pay.conekta.com/link/ce6948059cfb45b196a257c69236732d" class="btn btn-secondary" target="_blank">PAGAR</a>
                            </form>
                        </div>
                    </div>
                    <?php } ?><br>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
            </div>
        </div>
    </div>
</div>