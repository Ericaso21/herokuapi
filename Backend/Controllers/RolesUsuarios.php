<?php

    class RolesUsuarios extends Controllers{
        public function __construct()
        {
            parent::__construct();
        }

        public function rolesUsuarios()
        {
            $data['page_id'] = 6;
            $data['page_tag'] = "Role";
            $data['page_title'] = "Roles-Usuarios";
            $data['page_name'] = "Parkingsoft";
            $data['page_functions_js'] = "functions_roles.js";
            $this->api->getApi($this,"rolesUsuarios",$data);
        }

        //Extraer todas las tarifas
        public function getRoles()
        {
            $arrData = $this->model->selectRoles();
        
            for($i=0;$i< count($arrData);$i++){
                
                if($arrData[$i]['status'] == 0){
                    $arrData[$i]['status'] = '<span class="badge badge-success">Activo</span>';
                }else{
                    $arrData[$i]['status'] = '<span class="badge badge-danger">Inactivo</span>';
                }
        
            $arrData[$i]['options'] = '<div class="text-center">
            <button class="btn btn-primary btn-sm btnEditUsuario"  rl="'.$arrData[$i]['id_rol'].'" title="Editar"><i class="fas fa-pencil-alt"></i></button>
            <button class="btn btn-danger btn-sm btnDelUsuario" rl="'.$arrData[$i]['id_rol'].'" title="Eliminar"><i class="fas fa-trash-alt"></i></button>
            </div>';
            }

            echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
            die();
        }

        public function setRolesUsuario()
        {
                if($_POST){
                    $strIdRol = strval(strClean($_POST['idRoles']));
                    $strNombreRol = strClean($_POST['txtNombre']);
                    $strDescripcion = intval($_POST['txtDescripcion']);
                    $intstatus = intval($_POST['listStatus']);
                    if ($strIdRol == 0) {
                        //crea un nuevo rol
                        $request_usuarios = $this->model->insertRol($strNombreRol, $strDescripcion, $intstatus);
                        $option = 1;
                    } else {
                        // Actualiza un rol
                        $request_usuarios = $this->model->updateRol($strIdRol,$strNombreRol, $strDescripcion, $intstatus);
                        $option = 2;
                    }

                if ($request_usuarios > 0) 
                {
                if($option == 1)
                {
                    $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
                }else{
                    $arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
                }    
                } else if ($request_usuarios == 'exist') {
                    $arrResponse = array('status' => false, 'msg' => '¡Atención! El usuario ya existe.');
                } else {
                    $arrResponse = array('status' => false, 'msg' => 'No es posible almacenar los datos');
                }

                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                die();
            }
            
    }

    }

?>