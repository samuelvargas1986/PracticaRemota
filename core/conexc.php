<?php
require_once '../config/database.php';


   $host = HOST;
   $port = PORT;
   $database = DATABASE;
   $charset = CHARSET;
   $user = USER;
   $pass = PASS;

$conection = @mysqli_connect($host,$user,$pass,$database);

if(!$conection){
    echo "error";
}else{
    
}

?>