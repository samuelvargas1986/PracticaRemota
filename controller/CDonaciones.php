<?php
session_start();
require_once '../model/Donacion.php';
$donacion = new Donacion();
//GET
if(isset($_GET['operation'])){

    //Listar donacion
    if($_GET['operation'] == 'getListDonacion'){
        $data = $donacion->getListDonacion();
        if($data){
            foreach($data as $undata){
                echo "
                  <tr>
                    <td>{$undata['tipodonacion']}</td>
                    <td>{$undata['fechadonacion']}</td>
                    <td>{$undata['descripcion']}</td>
                    <td>{$undata['cantidad']}</td>
                  </tr> 
                ";
            }
        }else{
            echo '-1'; 
        }
    }

    //Registrar Donacion
    if($_GET['operation']=="registerDonacion"){ 

        $resultado =$donacion->registerDonacion([
                    "idpersona"            => $_GET['idpersona'],
                    "idusuario"            => $_SESSION['idusuario'],
                    "tipodonacion"         => $_GET['tipodonacion']
                ]);

        if($resultado){
            echo '1';
        }else{
            echo '-1';
        }        
    }


}
?>