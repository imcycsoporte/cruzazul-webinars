<?php
$servername = "localhost";
$username = "webinars";
$password = "hOIzF1Q1IvYCGzvV044jGEa1";
$dbname = "webinars";

// Create connection
$connb = new mysqli($servername, $username, $password, $dbname);
$connb->query("SET SESSION sql_mode = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION'");
// Check connection
if ($connb->connect_error) {
  die("Connection failed: " . $connb->connect_error);
}
?>