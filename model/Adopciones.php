<?php

require_once '../core/model.master.php';

class Adopciones extends ModelMaster{

    public function getListAdoptions(){  // falta probar
        try{
            return parent::getRows("spu_adopciones_listar");

        }
        catch(Exception $error){
            die($error->getMessage());
        }
    }

    public function registerAdoption(Array $data){ // falta probar
        try{
            parent::execProcedure($data,"spu_adopciones_registrar",false);
            return true;
        }
        catch(Exception $error){
            die($error->getMessage());
            return false;
        }
    }
}

?>