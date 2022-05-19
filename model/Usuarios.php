<?php

require_once '../core/model.master.php';


class Usuario extends ModelMaster{

    public function UserValidation(array $data){ //Falta probar
        try{
            return parent::execProcedure($data,"spu_getNameuser_usuarios",true);

        }
        catch(Exception $error){
            die($error->getMessage());
        }
    }

}
?>