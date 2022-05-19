<?php
    require_once '../model/Voluntarios.php';
    if(isset($_GET['operation'])){
        $voluntario = new Voluntarios();

        if($_GET['operation']=="getListRol"){
            $data = $voluntario->getListRol();
            if($data){

            }else{

            }
        }
    }

?>