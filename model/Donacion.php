<?php

require_once '../core/model.master.php';

class Donacion extends ModelMaster {

    //Listar Donacion
    public function getListDonacion(){ 

            try{
                return parent::getRows("spu_donacion_listar");

            }
            catch(Exception $error){
                die($error->getMessage());
            }
    }

    //Registrar Donacion
    public function registerDonacion(array $data){ 
        try{
            parent::execProcedure($data,"spu_donacion_registrar",false);
            return true;
        }
        catch(Exception $error){
            die($error->getMessage());
            return false;
        }
    }

}
?>