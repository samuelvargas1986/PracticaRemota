<?php
require_once './config/database.php';
   $host = HOST;
   $port = PORT;
   $database = DATABASE;
   $charset = CHARSET;
   $user = USER;
   $pass = PASS;
$mysqli = new mysqli($host, $user, "", $database);
if (mysqli_connect_errno()){
    printf("fallo de la conexion", $mysqli->connect_error);
    exit();
}
?>