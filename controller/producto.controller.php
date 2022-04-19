<?php

require_once '../model/Producto.php';
$producto = new Producto();

//GET
if(isset($_GET['op'])){

    if ($_GET['op']== 'getProducts'){
        $data = $producto->getProducts();
        echo json_encode($data);
    }

    if($_GET['op']== 'reportTypeProducts'){
        $data = $producto->reportTypeProducts();

        if($data){
            echo json_encode($data);
        }
    }
    
    if ($_GET['op']='deleteRow'){
    
    }
}


//post
if ($_)


    if (isset($_POST['op'])){
        if ($_POST['op'] == 'registerProduct'){
            $producto->registerProduct([
                "idtipoproducto"    => $_POST["idtipoproducto"],
                "idmarca"           => $_POST["idmarca"],
                "descripcion"       => $_POST["desripcion"],
                "precio"            => $_POST["precio"]
            ]);
        }
    }

    if ($_POST['op']== 'updateRow'){
        $datosEnviar= [
            "idproducto"         => $_POST['idproducto'],
            "idtipoproducto"     => $_POST['idtipoproducto'],
            "idmarca"            => $_POST['idmarca'],
            "descripcion"        => $_POST['descripcion'],
            "precio"             => $_POST['precio']
        ];
        $producto->updateRow($datosEnviar);
        }
        




?>