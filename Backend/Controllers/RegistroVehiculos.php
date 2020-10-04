<?php

    class RegistroVehiculos extends Controllers{
        public function __construct()
        {
            parent::__construct();
        }

        public function RegistroVehiculos()
        {
            $data['page_id'] = 9;
            $data['page_tag'] = "Registro-Vehiculo";
            $data['page_title'] = "Registro-Vehiculo";
            $data['page_name'] = "Registro_vehiculo";
            $this->api->getApi($this,"registroVehiculos",$data);
        }

        //Extraer todos los vehiculos
        public function getVehiculos()
        {
            $arrData = $this->model->selectVehiculos();
            for($i=0;$i< count($arrData);$i++){
            $arrData[$i]['options'] = '<div class="text-center">
            <button class="btn btn-primary btn-sm btnEditTpVehiculo"  rl="'.$arrData[$i]['placa'].'" title="Editar"><i class="fas fa-pencil-alt"></i></button>
            <button class="btn btn-danger btn-sm btnDelTpVehiculo" rl="'.$arrData[$i]['placa'].'" title="Eliminar"><i class="fas fa-trash-alt"></i></button>
            </div>';
            }
            echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
            die();
        }

    }

?>