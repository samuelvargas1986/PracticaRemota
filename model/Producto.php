<?php

require_once '../core/model.master.php';

class Producto extends ModelMaster{
    public function getProducts(){
        try{
            return parent::getRows("spu_productos_listar");
        }
        catch(Exception $error){
            die($error->getMessage());
        }
    }

    public function reportTypeProducts(){
        try{
            return parent::getRows("spu_resumen_tipoproductos");

        }
        catch(Exception $error){
            die($error->getMessage());
        }
    }

/**
 * registra un nuevo producto enviado en na array asociativa
 */
public function registerProduct(array $data){
    try{
        parent::execProcedure($data, "spu_productos_registrar",false);
        }
        catch(Exception $error){
        die($error->getMessage());
        }
    }

} 

?>