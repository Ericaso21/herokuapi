<?php

    class LoginModel extends Mysql
    {
        private $intIdUsuario;
        private $strUsuario;
        private $strPassword;
        private $strToken;

        public function __construct()
        {
            parent::__construct();
        }

        public function loginUser(string $usuario, string $password)
        {
            $this->strUsuario = $usuario;
            $this->strPassword = $password;
            $sql = "SELECT num_documento,status FROM parkingsoft.usuario WHERE
                    correo_electronico = '$this->strUsuario' AND
                    contraseña = '$this->strPassword'";
            $request = $this->select($sql);
            return $request;
        }

    }

?>