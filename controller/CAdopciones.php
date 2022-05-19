<?php
session_start();
require_once '../model/Adopciones.php';

if(isset($_GET['operation'])){
    
    $adopcion = new Adopciones();
    
    if($_GET['operation']=="getListAdoptions"){ // por terminar 
        $data = $adopcion->getListAdoptions();
        if($data){
            foreach($data as $undata){
                echo "
                    <tr>
                        <td>{$undata['idadopcion']}</td>
                        <td>{$undata['especie']}</td>
                        <td>{$undata['nombre']}</td>
                        <td>{$undata['Dueño']}</td>
                        <td><a href='#' class='btn btn-sm btn-primary get'>Detalles</a><a href='#' class='btn btn-sm btn-danger modificar'>Modficar</a></td>
                    </tr>
                ";
            }
        }else{
            echo "No hay datos";
        }
    }

    if($_GET['operation']=="registerAdoption"){
        $resultado = $adopcion->registerAdoption([
            "idmascota" => $_GET['idmascota'],
            "idpersona" => $_GET['idpersona'],
            "idusuario" => $_SESSION['idusuario'] //Lo obtenemos cuando el usuario inicia sesion, el id lo guardaremos en una variable de sesion
        ]);


        if($resultado){
            echo "1";
        }else{
            echo "0";
        }
    }

    
}

?>