<?php
$host = "localhost";
$user = "root";   // default user sa XAMPP
$pass = "";       // default password sa XAMPP (blank)
$db   = "php_dashboard";  // <-- sakto nga database name gikan sa imong .sql

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
