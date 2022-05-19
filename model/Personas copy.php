<?php

require_once '../core/model.master.php';

class Personas extends ModelMaster {

    public function getListPeople(){ //Probado

            try{
                return parent::getRows("spu_personas_listar");

            }
            catch(Exception $error){
                die($error->getMessage());
            }
    }

    public function registerPerson(array $data){ // probado
        try{
            parent::execProcedure($data,"spu_personas_registrar",false);
            return true;
        }
        catch(Exception $error){
            die($error->getMessage());
            return false;
        }
    }

    public function updatePerson(array $data ){ //probado
        try{
            parent::execProcedure($data,"spu_personas_actualizar",false);
            return true;
        }
        catch(Exception $error){
            die($error->getMessage());
            return false;
        }
    }

    public function getPersonbyID(array $data){ //Probado
        try{
            return parent::execProcedure($data,"spu_personas_getbyID",true);
        }
        catch(Exception $error){
            die($error->getMessage());
        }
    }

    // CARGANDO DATOS DE LOS DEPARTAMENTOS

    public function loadDepartamentos(){
        try{
            return parent::getRows("spu_cargar_departamentos");

        }
        catch(Exception $error){
            die($error->getMessage());
        }
    }

    // CARGANDO DATOS DE LAS PROVINCIAS
    public function loadProvincias(array $data){
        try{
            return parent::execProcedure($data,"spu_carga_provincias",true);

        }
        catch(Exception $error){
            die($error->getMessage());
        }
    }


    // CARGANDO DATOS DE LOS DISTRITOS
    public function loadDistritos(array $data){
        try{
            return parent::execProcedure($data,"spu_cargar_distritos",true);

        }
        catch(Exception $error){
            die($error->getMessage());
        }
    }




}



?>