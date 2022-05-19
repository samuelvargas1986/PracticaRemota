<?php

require_once '../model/MCompras.php';
$compra = new MCompras();

if(isset($_GET['operation'])){

      //Listar Compras
      if($_GET['operation'] == 'getListCompras'){
        $data = $compra->getListCompras();
        if($data){
            foreach($data as $undata){
                echo "
                  <tr>  
                   
                    <td>{$undata['fechcompra']}</td>
                    <td style='text-align: center;'>{$undata['nombreusuario']}</td>
                    <td style='text-align: center;'>{$undata['nota']}</td>
                    <td style='text-align: right;'>{$undata['totalcompra']}</td>
                    <td style='text-align: center;'>
                        <a href='#' data-idcompra='{$undata['idcompra']}' class='get btn btn-sm btn-primary'><i class='fas fa-eye' title='Información' ></i></a> 
                        <a href='#' data-idcompra='{$undata['idcompra']}' class='del btn btn-sm btn-danger'><i class='fas fa-trash' title='Modificar' ></i></a>
                    </td>
                  </tr> 
                ";
            }
        }else{
            echo '-1'; 
        }
    }

    if($_GET['operation'] == 'getListComprasbyID'){
      $data = $compra->getListComprasbyID(["idcompra" => $_GET['idcompra']]);
      if($data){
          foreach($data as $undata){
              echo "
                <tr>  
                  
                  <td>{$undata['nombreproducto']}</td>
                  <td style='text-align: center;'>{$undata['cantidad']}</td>
                  <td style='text-align: center;'>{$undata['preciounidad']}</td>
              ";
          }
      }else{
          echo '-1'; 
      }
  }


    if($_GET['operation']=="getComprasbyID"){ //
      $data = $compra->getComprasbyID(["idcompra" => $_GET['idcompra']]);
      if($data){
          foreach($data as $undata ){
              echo json_encode($undata);   
          }
      }else{
          echo '-1';
      }
  }


  if($_GET['operation']=="deleteComprasbyID"){ //
    $data = $compra->deleteComprasbyID(["idcompra" => $_GET['idcompra']]);
    if($data){
        foreach($data as $undata ){
            echo json_encode($undata);   
        }
    }else{
        echo '-1';
    }
}



    if($_GET['operation']=="loadUsuarios"){
      $usuarios = $compra->loadUsuarios();
      if($usuarios){
          foreach($usuarios as $unusuario){
              echo "<option value='{$unusuario['idusuario']}'>{$unusuario['nombreusuario']}</option>";
          }
      }
  }

  if($_GET['operation'] == 'getListDetcompra'){
    $data = $compra->loadDetcompra();
    if($data){
        foreach($data as $undata){
            echo "
              <tr>  
                <td>{$undata['nombreproducto']}</td>
                <td>{$undata['cantidad']}</td>
                <td>{$undata['preciounidad']}</td>
                
                <td><a href='#' data-iddetallecompra='{$undata['iddetallecompra']}' class='getMascotas btn btn-sm btn-danger'><i class='fas fa-eye' title='Información' ></i></a> <a href='#' data-iddetallecompra='{$undata['iddetallecompra']}' class='modificarMascota btn btn-sm btn-primary'><i class='fas fa-edit' title='Modificar' ></i></a></td>
                  </tr> 
            ";
        }
    }else{
        echo '-1'; 
    }
}



}

if(isset($_POST['operation'])){

  if ($_POST['operation']=='RegistrarDetCompra'){
    
    $datos=[
      "idcompra"        =>2,
      "nombreproducto"  => $_POST["nombreproducto"],
      "cantidad"        => $_POST["cantidad"],
      "preciounidad"    => $_POST["preciounidad"],
    ];
    $compra->RegistrarDetCompra($datos);
    
  }
}


?>