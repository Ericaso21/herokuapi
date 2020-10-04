<?php

    class RegistroVehiculosModel extends Mysql
    {
        public function __construct()
        {
            parent::__construct();
        }

            public function selectVehiculos()
        {
            //extrae todos los tipos de vehiculos
            $sql = "SELECT * FROM vehiculo WHERE placa != 'A';";
            $request = $this->select_all($sql);
            return $request;
        }

    }

?>