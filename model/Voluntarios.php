<?php

require_once '../core/model.master.php';

class Voluntarios extends ModelMaster {

    public function getListRol(){
        try{
            return parent::getRows("spu_roles_listar");
        }
        catch(Exception $error){
            die($error->getMessage());
        }
    }
}



?>