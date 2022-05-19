<?php

require_once '../core/model.master.php';

class Mascota extends ModelMaster {

    //Listar Mascota
    public function getListPets(){ 

            try{
                return parent::getRows("spu_mascotas_listar");

            }
            catch(Exception $error){
                die($error->getMessage());
            }
    }

    //Registrar Mascota
    public function registerPets(array $data){ 
        try{
            parent::execProcedure($data,"spu_mascotas_registrar",false);
            return true;
        }
        catch(Exception $error){
            die($error->getMessage());
            return false;
        }
    }

    //Modificar Mascota
    public function updateMascota(array $data ){ 
        try{
            parent::execProcedure($data,"spu_mascotas_actualizar",false);
            return true;
        }
        catch(Exception $error){
            die($error->getMessage());
        }
    }

    //Obtener Mascota por ID
    public function getPetsId(array $data){ 
        try{
            return parent::execProcedure($data,"spu_getMascotaId",true);
        }
        catch(Exception $error){
            die($error->getMessage());
        }
    }

     // Obtener Especies
     public function loadEspecie(){
        try{
            return parent::getRows("spu_cargar_especie");

        }
        catch(Exception $error){
            die($error->getMessage());
        }
    }

    // Obtener razas
    public function loadRaza(array $data){
        try{
            return parent::execProcedure($data,"spu_carga_raza",true);

        }
        catch(Exception $error){
            die($error->getMessage());
        }
    }

    public function getResquedPets($startDate = null, $endDate = null){
        try{
            if( (isset($startDate) and !empty($startDate)) and (isset($endDate) and !empty($endDate)) ){
                $stmt = $this->pdo->query("SELECT COUNT(*) as data, MONTH(fecharescate) as month FROM mascotas WHERE fecharescate BETWEEN '$startDate' AND '$endDate' GROUP BY month(fecharescate) ORDER BY month(fecharescate) ASC");

                $stmt2 = $this->pdo->query("SELECT COUNT(*) as data, month(fechaadopcion) as month FROM adopciones WHERE fechaadopcion BETWEEN '$startDate' AND '$endDate' GROUP BY month(fechaadopcion) ORDER BY month(fechaadopcion) ASC");
            }else{
                $stmt = $this->pdo->query("SELECT COUNT(*) as data, MONTH(fecharescate) as month FROM mascotas GROUP BY month(fecharescate) ORDER BY MONTH(fecharescate) ASC");

                $stmt2 = $this->pdo->query("SELECT COUNT(*) as data, month(fechaadopcion) as month FROM adopciones GROUP BY month(fechaadopcion) ORDER BY month(fechaadopcion) ASC");
            }
            
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $data2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);

            $cont = 0;
            $cont2 = 0;
            $result = [];
            $labels = [];
            $datas = [];

            $labels2 = [];
            $datas2 = [];

            foreach($data as $d){
                $labels[$cont] = $this->getMonthName($d['month']);
                $datas[$cont] = $d['data'];
                $cont++;
            }

            foreach($data2 as $d2){
                $labels2[$cont2] = $this->getMonthName($d2['month']);
                $datas2[$cont2] = $d2['data'];
                $cont2++;
            }

            $result['rescate']['labels'] = $labels;
            $result['rescate']['datas'] = $datas;

            $result['adopcion']['labels'] = $labels2;
            $result['adopcion']['datas'] = $datas2;

            print json_encode($result);

        }catch(Exception $error){
            die($error->getMessage());
        }
    }

    public function getMonthName($month){
        $name = "";
        switch ($month) {
            case 1:
                $name = "Enero";
            break;
            case 2:
                $name = "Febrero";
            break;
            case 3:
                $name = "Marzo";
            break;
            case 4:
                $name = "Abril";
            break;
            case 5:
                $name = "Mayo";
            break;
            case 6:
                $name = "Junio";
            break;
            case 7:
                $name = "Julio";
            break;
            case 8:
                $name = "Agosto";
            break;
            case 9:
                $name = "Septiembre";
            break;
            case 10:
                $name = "Obtubre";
            break;
            case 11:
                $name = "Noviembre";
            break;
            case 12:
                $name = "Diciembre";
            break;
        }

        return $name;
    }
}
?>