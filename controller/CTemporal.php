<?php
session_start();
require_once '../model/Temporal.php';
$temporal = new Temporal();

//GET
if(isset($_GET['operation'])){

    //Listar tabla Temporal
    if($_GET['operation'] == 'ListTmpDetalle'){
        $data = $temporal->ListTmpDetalle();
        if($data){
            foreach($data as $undata){
                echo "
                  <tr>  
                    <td>{$undata['descripcion']}</td>
                    <td>{$undata['cantidad']}</td>
                    <td><a href='#' data-idtemporal='{$undata['idtemporal']}' class='deletetmpDetalle btn btn-sm btn-outline-danger'><i class='fas fa-backspace' title='Borrar' ></i></a></td>
                  </tr> 
                ";
            }
        }else{
            echo ''; 
        }
    }

    //Registrar en tabla Temporal
    if($_GET['operation']=="registertmpDetalle"){ 

        $resultado =$temporal->registertmpDetalle([
                    "cantidad"            => $_GET['cantidad'],
                    "descripcion"         => $_GET['descripcion']
                ]);

        if($resultado){
            echo '1';
        }else{
            echo '-1';
        }        
    }


    //Eliminar en la tabla temporal
    if ($_GET['operation'] == 'deleteTmpDetalle'){
        $temporal->deleteTmpDetalle(["idtemporal" => $_GET['idtemporal']]);

    }


}
?>