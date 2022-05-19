<?php
session_start();
require_once '../model/Usuarios.php';

if(isset($_GET['operation'])){
    $usuario = new Usuario(); // Instanciamos la clase usuario

    if($_GET['operation']=="UserValidation"){
        $UserExiste = $usuario->UserValidation(["nombreusuario" => $_GET["nombreusuario"]]);

        if($UserExiste){//Si el usuario existe
             $contraseñaView = $_GET['contraseña']; //Tomanos la contraseña enviada desde el view
             $contraseñaDB = $UserExiste[0]["passworduser"]; //Tomamos las contraseña de la db
             $ValidacionContraseña = password_verify($contraseñaView,$contraseñaDB); //Validamos si las contraseñas son correctas
             if($ValidacionContraseña){ // Si la clave es correcta
                echo "1"; // si la validacion es eitosa
                $_SESSION['login'] = true;
                $_SESSION['idusuario'] = $UserExiste[0]['idusuario'];
             }else{
                 echo "-1";   // si la contraseña es incorrecta
             }
        }else{
            echo "0"; //Devuelde si el usuario no existe 
        }
    }   

    if($_GET['operation']=="logout"){
        $_SESSION['login']=false;
        header('location: ../index.php');
        session_destroy();
    }
}

?>