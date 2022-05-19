<?php

require_once '../core/model.master.php';

class Temporal extends ModelMaster {

    //Listar tmpDetalle
    public function ListTmpDetalle(){ 

            try{
                return parent::getRows("spu_tmpdetalle_listar");

            }
            catch(Exception $error){
                die($error->getMessage());
            }
    }

    //Registrar tmpDetalle
    public function registertmpDetalle(array $data){ 
        try{
            parent::execProcedure($data,"spu_tmpdetalle_registrar",false);
            return true;
        }
        catch(Exception $error){
            die($error->getMessage());
            return false;
        }
    }

    public function deleteTmpDetalle(array $data){
        try{
            parent::deleteRegister($data, "spu_tmpdetalle_eliminar");
        }
        catch(Exception $error){
            die($error->getMessage());
        }
    }
}
?>