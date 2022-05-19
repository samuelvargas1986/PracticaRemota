<?php
session_start();
require_once '../model/Personas.php';

if(isset($_GET['operation'])){

    $persona = new Personas();

    if($_GET['operation']=="registerPerson"){ // PROBADO PRODIA MEJORARSE

        $resultado =$persona->registerPerson([
                    "nombres" => $_GET['nombres'],
                    "apellidos" => $_GET['apellidos'],
                    "fechanac" => $_GET['fechanac'],
                    "nrodoc" => $_GET['nrodoc'],
                    "tipodoc" => $_GET['tipodoc'],
                    "telefono" => $_GET['telefono'],
                    "correo" => $_GET['correo'],
                    "iddistrito" => $_GET['iddistrito']
                ]);

        if($resultado){
            echo '1';
        }else{
            echo '-1';
        }        
    }

    if($_GET['operation']=="getListPeople"){ // PROBADO -- PODRIA MEJORARSE

        $data = $persona->getListPeople();
        if($data){
            foreach($data as $undata){
                echo "
                  <tr>  
                    <td>{$undata['nrodoc']}</td>
                    <td>{$undata['apellidos']}</td>
                    <td>{$undata['nombres']}</td>
                    <td>{$undata['telefono']}</td>
                    <td>{$undata['fechanac']}</td>
                    <td><a href='#' data-idpersona='{$undata['idpersona']}' class='get btn btn-sm btn-danger'><i class='fas fa-eye'></i></a> <a href='#' data-idpersona='{$undata['idpersona']}' class='modificar btn btn-sm btn-primary'><i class='fas fa-user-edit'></i></a>  </td>
                  </tr> 
                ";
            }
        }else{
            echo '-1'; //Quiere decir que no hay datos
        }


    }

    if($_GET['operation']=="getPersonbyID"){ //

        $data = $persona->getPersonbyID(["idpersona" => $_GET['idpersona']]);

        if($data){
            foreach($data as $undata ){
                echo json_encode($undata);
            }
        }else{
            echo '-1';
        }
        
        
    }

    if($_GET['operation']=="updatePerson"){ // PROBADO PODRIA MEJORARSE

        $resultado = $persona->updatePerson([
            "nombres" => $_GET['nombres'],
            "apellidos" => $_GET['apellidos'],
            "fechanac" => $_GET['fechanac'],
            "nrodoc" => $_GET['nrodoc'],
            "tipodoc" => $_GET['tipodoc'],
            "telefono" => $_GET['telefono'],
            "correo" => $_GET['correo'],
            "iddistrito" => $_GET['iddistrito'],
            "idpersona" => $_GET['idpersona']
        ]);
        if($resultado){
            echo '1';
        }else{
            echo '-1';
        }
    }


    // CARGANDO DEPARTAMENTOS
    if($_GET['operation']=="loadDepartamentos"){
        $departamentos = $persona->loadDepartamentos();
        if($departamentos){
            foreach($departamentos as $undepartamento){
                echo "<option value='{$undepartamento['iddepartamento']}'>{$undepartamento['departamento']}</option>";
            }
        }
    }

    // CARGANDO PROVINCAS
    if($_GET['operation']=="loadProvincias"){
        $provincias = $persona->loadProvincias(["iddepartamento"=>$_GET['iddepartamento']]);
        if($provincias){

            foreach($provincias as $unaProvincia){
                echo "<option value='{$unaProvincia['idprovincia']}'>{$unaProvincia['provincia']}</option>";
            }
        }
    }

    //CARGANDO DISTRITOS
    if($_GET['operation']=="loadDistritos"){
        $distritos = $persona->loadDistritos(["idprovincia"=>$_GET['idprovincia']]);
        if($distritos){

            foreach($distritos as $undistrito){
                echo "<option value='{$undistrito['iddistrito']}'>{$undistrito['distrito']}</option>";
            }
        }
    }




}

?>