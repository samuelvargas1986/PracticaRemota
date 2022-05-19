<?php

require_once '../core/model.master.php';


class MCompras extends ModelMaster {

    //Listar COMPRAR
    public function getListCompras(){ 

        try{
            return parent::getRows("spu_compras_listar");

        }
        catch(Exception $error){
            die($error->getMessage());
        }
}


public function getComprasbyID(array $data){ //Probado
    try{
        return parent::execProcedure($data,"spu_compras_listar_id",true);
    }
    catch(Exception $error){
        die($error->getMessage());
    }
}

public function getListComprasbyID(array $data){ //Probado
    try{
        return parent::execProcedure($data,"spu_compras_listartabla_id",true);
    }
    catch(Exception $error){
        die($error->getMessage());
    }
}

public function deleteComprasbyID(array $data){ //Probado
    try{
        return parent::execProcedure($data,"spu_compras_delete_id",true);
    }
    catch(Exception $error){
        die($error->getMessage());
    }
}





public function loadUsuarios(){
    try{
        return parent::getRows("spu_usuarios_cargar");

    }
    catch(Exception $error){
        die($error->getMessage());
    }
}

public function loadDetcompra(){
    try{
        return parent::getRows("spu_detcompra_listar");

    }
    catch(Exception $error){
        die($error->getMessage());
    }
}


}
?>