<?php

require_once '../model/Mascota.php';
$mascota = new Mascota();

//GET
if(isset($_GET['operation'])){

    //Listar Mascotas
    if($_GET['operation'] == 'getListPets'){
        $data = $mascota->getListPets();
        if($data){
            foreach($data as $undata){
                echo "
                  <tr>  
                    <td>{$undata['nombre']}</td>
                    <td>{$undata['especie']}</td>
                    <td>{$undata['raza']}</td>
                    <td>{$undata['fecharescate']}</td>
                    <td>{$undata['sexo']}</td>
                    <td>{$undata['disponibilidad']}</td>
                    <td><a href='#' data-idmascota='{$undata['idmascota']}' class='getMascotas btn btn-sm btn-danger'><i class='fas fa-eye' title='Información' ></i></a> <a href='#' data-idmascota='{$undata['idmascota']}' class='modificarMascota btn btn-sm btn-primary'><i class='fas fa-edit' title='Modificar' ></i></a></td>
                  
                    </tr> 
                ";
            }
        }else{
            echo '-1'; 
        }
    }
 //Listar Mascotas index
 if($_GET['operation'] == 'getListPetsIndex'){
    $data = $mascota->getListPets();
    if($data){
        foreach($data as $undata){
            echo "
              <tr>  
                <td>{$undata['nombre']}</td>
                <td>{$undata['especie']}</td>
                <td>{$undata['raza']}</td>
                <td>{$undata['sexo']}</td>
                <td>{$undata['disponibilidad']}</td>
              
                </tr> 
            ";
        }
    }else{
        echo '-1'; 
    }
}
    //Registrar Mascotas
    if($_GET['operation']=="registerPets"){ 

        $resultado =$mascota->registerPets([
                    "nombre"            => $_GET['nombre'],
                    "idraza"            => $_GET['idraza'],
                    "sexo"              => $_GET['sexo'],
                    "fecharescate"      => $_GET['fecharescate'],
                    "disponibilidad"    => $_GET['disponibilidad']
                ]);

        if($resultado){
            echo '1';
        }else{
            echo '-1';
        }        
    }
   
    //Obtener Mascota por ID
    if($_GET['operation'] == 'getPetsId'){ 
        $data = $mascota->getPetsId(["idmascota" => $_GET['idmascota']]);

        if($data){
            echo json_encode($data[0]);
        }else{
            echo '-1';
        } 
    }

    //Modificar Mascota
    if($_GET['operation']=='updateMascota'){ 

        $resultado = $mascota->updateMascota([
            "nombre"            => $_GET['nombre'],
            "idraza"            => $_GET['idraza'],
            "sexo"              => $_GET['sexo'],
            "fecharescate"      => $_GET['fecharescate'],
            "disponibilidad"    => $_GET['disponibilidad'],
            "idmascota"         => $_GET['idmascota']
        ]);
        if($resultado){
            echo '1';
        }else{
            echo '-1';
        }
    }

      // Obtener Especies
      if($_GET['operation']=="loadEspecie"){
        $especies = $mascota->loadEspecie();
        /* error */
        if(count($especies) == 0){
            echo "<option>No encontamos datos</option>";
        }else{
            echo "<option>Seleccione</option>";
            //Le paso el nombre de tabla y recupero cada fila
            foreach($especies as $unaespecie){
                echo "<option value='{$unaespecie['idespecie']}'>{$unaespecie['especie']}</option>";
            }
        }
    }

    // Optener razas
    if($_GET['operation']=="loadRaza"){
        $razas = $mascota->loadRaza(["idespecie"=>$_GET['idespecie']]);
        if($razas){

            foreach($razas as $unaraza){
                echo "<option value='{$unaraza['idraza']}'>{$unaraza['raza']}</option>";
            }
        }
    }



    if($_GET['operation']=="loadCharts"){
        if(!empty($_GET['startDate']) and !empty($_GET['endDate'])){
            $startDate = $_GET['startDate'];
            $endDate = $_GET['endDate'];
            $mascota->getResquedPets($startDate, $endDate);
        }else{
            $mascota->getResquedPets();
        }
    }

}
?>