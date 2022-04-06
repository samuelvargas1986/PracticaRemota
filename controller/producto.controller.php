<?php

require_once '../model/Producto.php';
$producto = new Producto();

//GET
if(isset($_GET['op'])){

    if ($_GET['op']== 'getProducts'){
        $data = $producto->getProducts();
        echo json_encode($data);
    }
}

//post
    if (isset($_POST['op'])){
        if ($_POST['op'] == 'registerProduct'){
            $producto->registerProduct([
                "idtipoproducto"    => $_POST["idtipoproducto"],
                "idmarca"           => $_POST["idmarca"],
                "descripcion"       => $_POST["desripcion"],
                "precio"            => $_POST["precio"],
            ]);
        }
    }





?>