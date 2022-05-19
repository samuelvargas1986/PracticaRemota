<?php

include '../core/conexc.php';
session_start();

if(!empty($_POST)){

    //Agregar compra temporal
    if($_POST['action'] == 'addProductoDetalle'){
       // print_r($_POST);exit;
        if(empty($_POST['nombreproducto']) || empty($_POST['cantidad']) || empty($_POST['preciounidad']))
        {
            echo 'error';
        }else{
            $nombreproducto = $_POST['nombreproducto'];
            $cantidad = $_POST['cantidad'];
            $preciounidad   = $_POST['preciounidad'];
            $token = md5($_SESSION['idusuario']);

            $result_iva =  0; 

            $query_detalle_temp = mysqli_query($conection, "CALL add_detalle_temp('$nombreproducto',$cantidad,$preciounidad,'$token')");
            $result = mysqli_num_rows($query_detalle_temp);

            $detalleTabla = '';
            $sub_total = 0;
            $iva=0;
            $total = 0;
            $arrayData = array();

            if($result > 0){

                if($result_iva>0){
                    $iva = 1;
                }
            

                while ($data = mysqli_fetch_assoc($query_detalle_temp)){
                    $precioTotal = round($data['cantidad'] * $data['preciounidad'],2);
                    $sub_total = round($sub_total + $precioTotal, 2);
                    $total = round($total + $precioTotal, 2);

                    $detalleTabla .= '<tr>
                                        <td>'.$data['nombreproducto'].'</td>
                                        <td>'.$data['cantidad'].'</td>
                                        <td>'.$data['preciounidad'].'</td>
                                        <td>'.$precioTotal.'</td>
                                        <td><a class="link_delete" href="#" onclick="event.preventDefault(); 
                                                del_product_detalle('.$data['iddetallecompra'].');"><i class="far fa-trash-alt"></i></a></td>

                                    </tr>';
                    }
                    $impuesto = round($sub_total * ($iva / 100), 2);
                    $tl_sniva = round($sub_total - $impuesto, 2);
                    $total = round($tl_sniva + $impuesto, 2);

                    $detalleTotales = '<tr>
                                        <td colspan="3">TOTAL COMPRA</td>
                                        <td>'.$total.'</td>
                                       </tr>';


                    $arrayData['detalle'] = $detalleTabla;
                    $arrayData['totales'] = $detalleTotales;

                    echo json_encode($arrayData,JSON_UNESCAPED_UNICODE);
                
                }else{
                    echo 'error';
                }
                mysqli_close($conection);
            }
            exit;
        }

        //extrae datos del detalle temp
        if($_POST['action'] == 'serchForDetalle'){
            // print_r($_POST);exit;
             if(empty($_POST['user']))
             {
                 echo 'error';
             }else{
                 
                 $token = md5($_SESSION['idusuario']);

                 $query = mysqli_query($conection,"SELECT tmp.iddetallecompra, tmp.nombreproducto, tmp.cantidad, tmp.preciounidad from detalle_temp tmp WHERE tmp.token_user = '$token'");
                 $result = mysqli_num_rows($query);

                 $result_iva =  0; 
            
                 $detalleTabla = '';
                 $sub_total = 0;
                 $iva=0;
                 $total = 0;
                 $arrayData = array();
     
                 if($result > 0){
     
                     if($result_iva>0){
                         $iva = 1;
                     }
                 
     
                     while ($data = mysqli_fetch_assoc($query)){
                         $precioTotal = round($data['cantidad'] * $data['preciounidad'],2);
                         $sub_total = round($sub_total + $precioTotal, 2);
                         $total = round($total + $precioTotal, 2);
     
                         $detalleTabla .= '<tr>
                                             <td>'.$data['nombreproducto'].'</td>
                                             <td>'.$data['cantidad'].'</td>
                                             <td>'.$data['preciounidad'].'</td>
                                             <td>'.$precioTotal.'</td>
                                             <td><a class="link_delete" href="#" onclick="event.preventDefault(); 
                                                     del_product_detalle('.$data['iddetallecompra'].');"><i class="far fa-trash-alt"></i></a></td>
     
                                         </tr>';
                         }
                         $impuesto = round($sub_total * ($iva / 100), 2);
                         $tl_sniva = round($sub_total - $impuesto, 2);
                         $total = round($tl_sniva + $impuesto, 2);
     
                         $detalleTotales = '<tr>
                                             <td colspan="3">TOTAL COMPRA</td>
                                             <td>'.$total.'</td>
                                            </tr>';
     
     
                         $arrayData['detalle'] = $detalleTabla;
                         $arrayData['totales'] = $detalleTotales;
     
                         echo json_encode($arrayData,JSON_UNESCAPED_UNICODE);
                     
                     }else{
                         echo 'error';
                     }
                     mysqli_close($conection);
                 }
                 exit;
             }

             if($_POST['action'] == 'delProductoDetalle'){
                // print_r($_POST);exit;

                if(empty($_POST['id_detalle']))
                {
                    echo 'error';
                }else{
                    
                    $id_detalle = $_POST['id_detalle'];
                    $token  = md5($_SESSION['idusuario']);
   
                    $query_detalle_temp = mysqli_query($conection, "CALL del_detalle_temp($id_detalle,'$token')");
                    $result = mysqli_num_rows($query_detalle_temp);
   
                    $result_iva =  0; 
               
                    $detalleTabla = '';
                    $sub_total = 0;
                    $iva=0;
                    $total = 0;
                    $arrayData = array();
        
                    if($result > 0){
        
                        if($result_iva>0){
                            $iva = 1;
                        }
                    
        
                        while ($data = mysqli_fetch_assoc($query_detalle_temp)){
                            $precioTotal = round($data['cantidad'] * $data['preciounidad'],2);
                            $sub_total = round($sub_total + $precioTotal, 2);
                            $total = round($total + $precioTotal, 2);
        
                            $detalleTabla .= '<tr>
                                                <td>'.$data['nombreproducto'].'</td>
                                                <td>'.$data['cantidad'].'</td>
                                                <td>'.$data['preciounidad'].'</td>
                                                <td>'.$precioTotal.'</td>
                                                <td><a class="link_delete" href="#" onclick="event.preventDefault(); 
                                                        del_product_detalle('.$data['iddetallecompra'].');"><i class="far fa-trash-alt"></i></a></td>
        
                                            </tr>';
                            }
                            $impuesto = round($sub_total * ($iva / 100), 2);
                            $tl_sniva = round($sub_total - $impuesto, 2);
                            $total = round($tl_sniva + $impuesto, 2);
        
                            $detalleTotales = '<tr>
                                                <td colspan="3">TOTAL COMPRA</td>
                                                <td>'.$total.'</td>
                                               </tr>';
        
        
                            $arrayData['detalle'] = $detalleTabla;
                            $arrayData['totales'] = $detalleTotales;
        
                            echo json_encode($arrayData,JSON_UNESCAPED_UNICODE);
                        
                        }else{
                            echo 'error';
                        }
                        mysqli_close($conection);
                    }
                    exit;

             }


             //anular compra
             if($_POST['action'] == 'anularCompra'){

                $token  = md5($_SESSION['idusuario']);
   
                $query_del = mysqli_query($conection, "DELETE FROM detalle_temp WHERE token_user = '$token' ");
                mysqli_close($conection);
                if($query_del){
                    echo 'ok';
                }else{
                    echo 'error';
                }
                exit;

             }

             //Procesar compra
             if($_POST['action'] == 'procesarCompra'){

                //print_r($_POST);exit;

              
                $nota = $_POST['nota'];

                $token  = md5($_SESSION['idusuario']);
                $usuario  = $_SESSION['idusuario'];

                $query = mysqli_query($conection,"SELECT * FROM detalle_temp WHERE token_user = '$token' ");
                $result = mysqli_num_rows($query);

                if($result > 0)
                {
                    $query_procesar = mysqli_query($conection, "CALL procesar_compra($usuario,'$nota','$token')");
                    $result_detalle = mysqli_num_rows($query_procesar);

                    if($result_detalle > 0){
                        $data = mysqli_fetch_assoc($query_procesar);
                        echo json_encode($data,JSON_UNESCAPED_UNICODE);
                    }else{
                        echo "error";
                    
                    }
                }else{
                    echo "error"; 
                }
                mysqli_close($conection);
                exit;

             }



    }



    










exit;



?>