<?php
require('db.php');
session_start();

if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    require_once __DIR__ . '/../../api/credenciales.php';
    $result = wec_credenciales_login($conn, $email, $password); // contraseñas cifradas
    if ($result->num_rows > 0) {
        session_regenerate_id(true);
        while ($row = $result->fetch_array()) {
            $_SESSION['ide'] = $row['id'];
            $_SESSION['tipo'] = $row['tipo'];
            $_SESSION['nombre'] = $row['nombre'];
            $_SESSION['email'] = $email;
        }
        echo 'usuario';
    } else {
        echo 'noUsuario';
    }
    $conn->close();
}

function EvaluacionWebinar($categoria, $webinar) {
    require('db.php');
    
    $stringTitulox = $categoria;
    $delimiterTitulox = "-";
    $replacementTitulox = "";

    $resultTitulox = str_replace($delimiterTitulox, $replacementTitulox, ucwords($stringTitulox));
    $lowercaseStrx = strtolower($resultTitulox);
    
    $reqstring = $lowercaseStrx.'webinar'.$webinar;
    
    $sqlex = "SELECT * FROM `preg" . preg_replace('/[^\p{L}\p{N}_]/u', '', (string) $reqstring) . "` ORDER BY rand() LIMIT 50";
    $resultExamen = $conn->query($sqlex);
    $i = 1;
    if ($resultExamen->num_rows > 0) {
        while ($row = $resultExamen->fetch_array()) {
            ?>
            <div class="panel <?php echo $row["id"]; ?>">
                <div class="panel-heading">
                    <a data-toggle="collapse" data-parent="#delivery" href="#delivery1" class="collapsed">
                        <span class="closed"><i>–</i></span>
                        <span class="opened"><i>+</i></span>
                        <div class="panel-title">
                            <p class="ptop"><small><?php echo $i; ?></small></p>
                            <?php echo $row["pregunta"]; ?>
                        </div>
                    </a>
                </div>
                <div id="delivery1" class="panel-collapse collapse-in">
                    <div class="panel-body">
                        <?php
                        $sqlp = "SELECT * FROM `resp" . preg_replace('/[^\p{L}\p{N}_]/u', '', (string) $reqstring) . "` WHERE id_pregunta=".$row['id']."";
                        $resultp = $conn->query($sqlp);
                        if ($resultp->num_rows > 0) {
                            while ($rowp = $resultp->fetch_array()) {
                                ?>
                                <div class="radio" style="line-height: 30px;">
                                    <label>
                                        <input type="radio" name="optradio <?php echo $rowp["id_pregunta"]; ?>" class="cuestio" value="<?php echo $rowp["correcta"]; ?>">
                                        <?php echo $rowp["respuesta"];  ?>
                                    </label>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
            <?php
            $i++;
        }
    } else {
        echo "NO HAY RESULTADOS";
    }
    mysqli_close($conn);
}

function Evaluacion($categoria) {
    require('db.php');
    
    $stringTitulox = $categoria;
    $delimiterTitulox = "-";
    $replacementTitulox = "";

    $resultTitulox = str_replace($delimiterTitulox, $replacementTitulox, ucwords($stringTitulox));
    $lowercaseStrx = strtolower($resultTitulox);
    
    $sqlex = "SELECT * FROM `preguntas" . preg_replace('/[^\p{L}\p{N}_]/u', '', (string) $lowercaseStrx) . "` ORDER BY rand() LIMIT 50";
    $resultExamen = $conn->query($sqlex);
    $i = 1;
    if ($resultExamen->num_rows > 0) {
        while ($row = $resultExamen->fetch_array()) {
            ?>
            <div class="panel <?php echo $row["id"]; ?>">
                <div class="panel-heading">
                    <a data-toggle="collapse" data-parent="#delivery" href="#delivery1" class="collapsed">
                        <span class="closed"><i>–</i></span>
                        <span class="opened"><i>+</i></span>
                        <div class="panel-title">
                            <p class="ptop"><small><?php echo $i; ?></small></p>
                            <?php echo $row["pregunta"]; ?>
                            <?php if ($row["norma"]) { ?>
                                <p class="normastyle"><small>Norma: <?php echo $row["norma"]; ?> | <?php echo $row["capitulo"]; ?></small></p>
                            <?php } ?>
                        </div>
                    </a>
                </div>
                <div id="delivery1" class="panel-collapse collapse-in">
                    <div class="panel-body">
                        <?php
                        $sqlp = "SELECT * FROM `respuestas" . preg_replace('/[^\p{L}\p{N}_]/u', '', (string) $lowercaseStrx) . "` WHERE id_pregunta=".$row['id']."";
                        $resultp = $conn->query($sqlp);
                        if ($resultp->num_rows > 0) {
                            while ($rowp = $resultp->fetch_array()) {
                                ?>
                                <div class="radio" style="line-height: 30px;">
                                    <label>
                                        <input type="radio" name="optradio <?php echo $rowp["id_pregunta"]; ?>" class="cuestio" value="<?php echo $rowp["correcta"]; ?>">
                                        <?php echo $rowp["respuesta"];  ?>
                                    </label>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
            <?php
            $i++;
        }
    } else {
        echo "NO HAY RESULTADOS";
    }
    mysqli_close($conn);
}

?>