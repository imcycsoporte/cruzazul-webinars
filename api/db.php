<?php
$servername = "localhost";
$username = "cruzazul";
$password = "dd78PHJVRq6taLB1MEL6xqkj";
$dbname = "cruzazul";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$conn->query("SET SESSION sql_mode = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION'");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>