<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "php_mysql_backend";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Greška u konekciji!");
}
?>
