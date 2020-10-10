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
            $sql = "SELECT u.num_documento, pr.estado FROM usuario u inner join persona_rol pr on pr.pk_fk_num_documento = u.num_documento  WHERE
                    correo_electronico = '$this->strUsuario' AND
                    contrasena = '$this->strPassword'";
            $request = $this->select($sql);
            return $request;
        }

    }

?>