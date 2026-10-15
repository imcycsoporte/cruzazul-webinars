<?php
require('html2pdf.php');
require $_SERVER['DOCUMENT_ROOT'].'/api/db.php';

$currentDir = getcwd();
$uploadDirectory = "apiuploads/";
$errors = array();
$file_name = $_FILES['image']['name'];
$file_size = $_FILES['image']['size'];
$file_tmp = $_FILES['image']['tmp_name'];
$file_type = $_FILES['image']['type'];
$file_ext = strtolower(end(explode('.', $_FILES['image']['name'])));
$lafoto = "/diploma/apiuploads/" . $file_name;

if ($file_size > 2097152) {
    $errors[] = 'File size must be excately 2 MB';
}
if (empty($errors) == true) {
    move_uploaded_file($file_tmp, "apiuploads/" . $file_name);
} else {
    print_r($errors);
}

$nombre = $_POST['nombre'];
$empresa = $_POST['empresa'];
$email = $_POST['email'];
$curp = $_POST['curp'];
$elcursox = $_POST['elcursox'];
$id = $_POST['id'];
$resultado = $_POST['resultado'];
$fecha = date("d/m/Y");


$stringTitulo = $elcursox;
$delimiterTitulo = "-";
$replacementTitulo = " ";

$resultTitulo = str_replace($delimiterTitulo, $replacementTitulo, ucwords($stringTitulo));

$sql = "INSERT INTO certificados (usuario, curso, email, resultado, foto, idcertificado, token, curp, fecha) VALUES ('" . addslashes((string) $nombre) . "', '" . addslashes((string) $elcursox) . "', '" . addslashes((string) $email) . "', '" . addslashes((string) $resultado) . "', '" . addslashes((string) $file_name) . "', '" . addslashes((string) $idcertificado) . "', '" . addslashes((string) $idcertificado) . "', '" . addslashes((string) $curp) . "', '" . addslashes((string) $fecha) . "')";

mysqli_query($conn, $sql);

$pdf = new PDF_HTML('P', 'mm', array(216, 279));

class TextNormalizerFPDF extends FPDF {

    function __construct() {
        parent::__construct();
    }

    function MultiCell($w, $h, $txt, $border = 0, $align = 'J', $fill = false) {
        parent::MultiCell($w, $h, $this->normalize($txt), $border, $align, $fill);
    }

    function Cell($w, $h = 0, $txt = '', $border = 0, $ln = 0, $align = '', $fill = false, $link = '') {
        parent::Cell($w, $h, $this->normalize($txt), $border, $ln, $align, $fill, $link);
    }

    function Write($h, $txt, $link = '') {
        parent::Write($h, $this->normalize($txt), $link);
    }

    function Text($x, $y, $txt) {
        parent::Text($x, $y, $this->normalize($txt));
    }

    protected function normalize($word) {
        // Thanks to: http://stackoverflow.com/questions/3514076/special-characters-in-fpdf-with-php
        $word = str_replace("@", "%40", $word);
        $word = str_replace("`", "%60", $word);
        $word = str_replace("¢", "%A2", $word);
        $word = str_replace("£", "%A3", $word);
        $word = str_replace("¥", "%A5", $word);
        $word = str_replace("|", "%A6", $word);
        $word = str_replace("«", "%AB", $word);
        $word = str_replace("¬", "%AC", $word);
        $word = str_replace("¯", "%AD", $word);
        $word = str_replace("º", "%B0", $word);
        $word = str_replace("±", "%B1", $word);
        $word = str_replace("ª", "%B2", $word);
        $word = str_replace("µ", "%B5", $word);
        $word = str_replace("»", "%BB", $word);
        $word = str_replace("¼", "%BC", $word);
        $word = str_replace("½", "%BD", $word);
        $word = str_replace("¿", "%BF", $word);
        $word = str_replace("À", "%C0", $word);
        $word = str_replace("Á", "%C1", $word);
        $word = str_replace("Â", "%C2", $word);
        $word = str_replace("Ã", "%C3", $word);
        $word = str_replace("Ä", "%C4", $word);
        $word = str_replace("Å", "%C5", $word);
        $word = str_replace("Æ", "%C6", $word);
        $word = str_replace("Ç", "%C7", $word);
        $word = str_replace("È", "%C8", $word);
        $word = str_replace("É", "%C9", $word);
        $word = str_replace("Ê", "%CA", $word);
        $word = str_replace("Ë", "%CB", $word);
        $word = str_replace("Ì", "%CC", $word);
        $word = str_replace("Í", "%CD", $word);
        $word = str_replace("Î", "%CE", $word);
        $word = str_replace("Ï", "%CF", $word);
        $word = str_replace("Ð", "%D0", $word);
        $word = str_replace("Ñ", "%D1", $word);
        $word = str_replace("Ò", "%D2", $word);
        $word = str_replace("Ó", "%D3", $word);
        $word = str_replace("Ô", "%D4", $word);
        $word = str_replace("Õ", "%D5", $word);
        $word = str_replace("Ö", "%D6", $word);
        $word = str_replace("Ø", "%D8", $word);
        $word = str_replace("Ù", "%D9", $word);
        $word = str_replace("Ú", "%DA", $word);
        $word = str_replace("Û", "%DB", $word);
        $word = str_replace("Ü", "%DC", $word);
        $word = str_replace("Ý", "%DD", $word);
        $word = str_replace("Þ", "%DE", $word);
        $word = str_replace("ß", "%DF", $word);
        $word = str_replace("à", "%E0", $word);
        $word = str_replace("á", "%E1", $word);
        $word = str_replace("â", "%E2", $word);
        $word = str_replace("ã", "%E3", $word);
        $word = str_replace("ä", "%E4", $word);
        $word = str_replace("å", "%E5", $word);
        $word = str_replace("æ", "%E6", $word);
        $word = str_replace("ç", "%E7", $word);
        $word = str_replace("è", "%E8", $word);
        $word = str_replace("é", "%E9", $word);
        $word = str_replace("ê", "%EA", $word);
        $word = str_replace("ë", "%EB", $word);
        $word = str_replace("ì", "%EC", $word);
        $word = str_replace("í", "%ED", $word);
        $word = str_replace("î", "%EE", $word);
        $word = str_replace("ï", "%EF", $word);
        $word = str_replace("ð", "%F0", $word);
        $word = str_replace("ñ", "%F1", $word);
        $word = str_replace("ò", "%F2", $word);
        $word = str_replace("ó", "%F3", $word);
        $word = str_replace("ô", "%F4", $word);
        $word = str_replace("õ", "%F5", $word);
        $word = str_replace("ö", "%F6", $word);
        $word = str_replace("÷", "%F7", $word);
        $word = str_replace("ø", "%F8", $word);
        $word = str_replace("ù", "%F9", $word);
        $word = str_replace("ú", "%FA", $word);
        $word = str_replace("û", "%FB", $word);
        $word = str_replace("ü", "%FC", $word);
        $word = str_replace("ý", "%FD", $word);
        $word = str_replace("þ", "%FE", $word);
        $word = str_replace("ÿ", "%FF", $word);

        return urldecode($word);
    }

    function WordWrap(&$text, $maxwidth) {
        $text = trim($text);
        if ($text === '')
            return 0;
        $space = $this->GetStringWidth(' ');
        $lines = explode("\n", $text);
        $text = '';
        $count = 0;

        foreach ($lines as $line) {
            $words = preg_split('/ +/', $line);
            $width = 0;

            foreach ($words as $word) {
                $wordwidth = $this->GetStringWidth($word);
                if ($wordwidth > $maxwidth) {
                    // Word is too long, we cut it
                    for ($i = 0; $i < strlen($word); $i++) {
                        $wordwidth = $this->GetStringWidth(substr($word, $i, 1));
                        if ($width + $wordwidth <= $maxwidth) {
                            $width += $wordwidth;
                            $text .= substr($word, $i, 1);
                        } else {
                            $width = $wordwidth;
                            $text = rtrim($text) . "\n" . substr($word, $i, 1);
                            $count++;
                        }
                    }
                } elseif ($width + $wordwidth <= $maxwidth) {
                    $width += $wordwidth + $space;
                    $text .= $word . ' ';
                } else {
                    $width = $wordwidth + $space;
                    $text = rtrim($text) . "\n" . $word . ' ';
                    $count++;
                }
            }
            $text = rtrim($text) . "\n";
            $count++;
        }
        $text = rtrim($text);
        return $count;
    }

}

$pdf = new TextNormalizerFPDF();
$pdf->AddPage();
$pdf->SetDisplayMode('fullpage');

$pdf->Image('diploma23_test.jpg', 0, 0, 216, 297);

$pdf->SetTextColor(129,129,129);
$pdf->SetFont('Arial', '', 20);
$pdf->Ln(35);
$pdf->SetX(62); 
$pdf->MultiCell(130, 10, 'EL INSTITUTO MEXICANO DEL CEMENTO Y DEL CONCRETO A.C.', 0, L, false);

$pdf->SetFont('Arial', '', 12);
$pdf->Ln(15);
$pdf->SetX(62); 
$pdf->Cell(120, -15, 'Otorgan a:', 0, L, false);

$pdf->SetTextColor(30,30,30);
$pdf->SetFont('Arial', '', 20);
$pdf->Ln(10);
$pdf->SetX(62); 
$pdf->MultiCell(180, -15, $nombre, 0, L, false);

$pdf->SetTextColor(129,129,129);
$pdf->SetFont('Arial', '', 12);
$pdf->Ln(27);
$pdf->SetX(62); 
$pdf->Cell(120, -15, 'Con clave única de Registro de Población:', 0, L, false);

$pdf->MultiCell(0, 0, $pdf->Image('../' . $lafoto, 10, 45, 40, 0, "", "home.php"), 0, 'L');

$pdf->SetFont('Arial', '', 20);
$pdf->Ln(15);
$pdf->SetX(62);
$pdf->MultiCell(161, -22, $curp, 0, L, false);

$pdf->SetTextColor(129,129,129);
$pdf->SetFont('Arial', '', 12);
$pdf->Ln(30);
$pdf->SetX(62); 
$pdf->Cell(120, -15, 'Constancia de asistencia por haber tomado el webinar en:', 0, L, false);

$pdf->SetTextColor(30,30,30);
$pdf->SetFont('Arial', '', 20);
$pdf->Ln(5);
$pdf->SetX(62); 
$pdf->MultiCell(120, 10, $resultTitulo, 0, L, false);

$pdf->SetTextColor(129,129,129);
$pdf->SetFont('Arial', '', 12);
$pdf->Ln(20);
$pdf->SetX(62); 
$pdf->Cell(120, -15, 'Desarrollado por el Comité de Enseñanza.', 0, L, false);

$pdf->SetTextColor(129,129,129);
$pdf->SetFont('Arial', '', 20);
$pdf->Ln(5);
$pdf->SetX(62); 
$pdf->MultiCell(150, 10, 'Registro STPS: IMC59092323CZ4-0013', 0, L, false);

$pdf->SetFont('Arial', '', 12);
$pdf->Ln(20);
$pdf->SetX(62); 
$pdf->Cell(120, -15, 'El presente se expide en la Ciudad de México a:', 0, L, false);

$pdf->SetFont('Arial', '', 12);
$pdf->Ln(5);
$pdf->SetX(62); 
$pdf->Cell(120, -15, date('d/m/Y'), 0, L, false);

$pdf->SetFont('Arial','',12);
$fechavigenciaend = "Vigencia hasta el ".date('d/m/Y', strtotime('+3 years'));
$pdf->Ln(7);
$pdf->SetX(65); 
$pdf->MultiCell(125, 5, 'NOTA IMPORTANTE: ESTA ES UNA CONSTANCIA DE ASISTENCIA Y NO CERTFICA NI VALIDA QUE SE HAYA COMPLETADO LA EVALUACIÓN NECESARIA PARA LA ACREDITACIÓN.', 0, C, false);

//echo $elcursox;

//echo dirname(__FILE__);

// MANDA A LOCAL
$pdf->Output();
// MANDA A LOCAL

// MANDA A SERVIDOR
/*
$filename= "/home/u497905407/domains/webinarsenconcreto.com/public_html/diplomas/diploma.pdf";

$pdf->Output($filename,'F');

echo "<h1 style='text-align:center;padding:20px;'>Gracias!<br>Su Diploma le será enviado a su correo electrónico.</h1>";

require_once '/var/lib/imcyc/qr-client.php';
$url = 'https://qr.imcyc.com/qr/diplomag.php';
 
$uploadFieldName = 'archivo';
 
$filePath = '/home/u497905407/domains/webinarsenconcreto.com/public_html/diplomas/diploma.pdf';

$ch = curl_init();
curl_setopt($ch, CURLOPT_HTTPHEADER, imcyc_qr_headers('cruzazul'));
 
curl_setopt($ch, CURLOPT_URL, $url);
 
curl_setopt($ch, CURLOPT_POST, true);
 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 
if(function_exists('curl_file_create')){
    $filePath = curl_file_create($filePath);
} else{
    $filePath = '@' . realpath($filePath);
    curl_setopt($ch, CURLOPT_SAFE_UPLOAD, false);
}
 
$postFields = array(
    $uploadFieldName => $filePath,
    //'mail' => 'fmedina@imcyc.com'
    'mail' => $email
    //'mail' => 'axosar@gmail.com'
);
 
curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
 
$result = curl_exec($ch);
 
if(curl_errno($ch)){
    throw new Exception(curl_error($ch));
}

$tester = explode(" ",$result);
$tester2 = explode(" ",$tester[4]);
$link = "https://qr.imcyc.com/?id=".substr($tester2[0], 0, -5);
 
echo '<div align="center"><a href="'.$link.'" style="text-decoration:none;background:#ff0000;color:#fff;padding:10px;">Descargue su diploma dando CLICK AQUÍ</a></div><br>';
echo '<h2 style="text-align:center;color:#333;">ID DE DIPLOMA: '.$tester[4].'</h2>';

exit;
*/
// MANDA A SERVIDOR

?>