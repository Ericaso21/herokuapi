<?php

    class RolesUsuariosModel extends Mysql
    {
        public $strRol;
        public $strDescripcion;
        public $intStatus;
        
        public function __construct()
        {
            parent::__construct();
        }

        public function selectRoles()
        {
            //extrae todos los roles
            $sql = "SELECT * FROM parkingsoft.rol WHERE id_rol != 0";
            $request = $this->select_all($sql);
            return $request;
        }

        public function insertRol(string $rol, string $descripcion, int $status){
            $return = "";
            $this->strRol = $rol;
            $this->strDescripcion = $descripcion;
            $this->intStatus = $status;

            $sql = "SELECT * FROM parkingsoft.rol WHERE nombre_rol = '{$this->strRol}'";
            $request = $this->select_all($sql);

            if(empty($request))
            {
                $query_insert = "INSERT INTO parkingsoft.rol(nombre_rol, descripcion, status) VALUES(?,?,?)";
                $arrData = array($this->strRol, $this->strDescripcion, $this->intStatus);
                $request_insert = $this->insert($query_insert,$arrData);
                $return = $request_insert;
            }else{
                $return = "exist";
            }
            return $return;

        }

    }

    

?>