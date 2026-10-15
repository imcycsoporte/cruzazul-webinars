<?php
$servername = "sql571.main-hosting.eu";
$username = "u873755028_cec";
$password = "RygM2mR8SAsuimJ";
$dbname = "u873755028_cec";

// Create connection
try {
  $connc = @new mysqli($servername, $username, $password, $dbname);
  $errorc = $connc->connect_error;
} catch (mysqli_sql_exception $e) {
  $errorc = $e->getMessage();
}
// Check connection (the details go to the error log, not to the page)
if ($errorc) {
  error_log("dbc.php: " . $errorc);
  die("El acervo no está disponible por el momento.");
}
?>