<?php

require_once "./modelos/Roles.model.php";

class RolesController {

    // Método para recuperar todos los roles
    static public function index() {
        return RolesModel::index();
    }

    // Método para recuperar un rol por ID y ID de usuario
    static public function getRolById($id_roles, $id_usuario) {
        return RolesModel::getById($id_roles, $id_usuario);
    }

    // Método para guardar un rol (crear o actualizar)
    static public function saveRole() {
        if (isset($_POST["id_roles"], $_POST["rol"], $_POST["estado_rol"], $_POST["id_usuario"])) {
            $data = array(
                "id_roles" => $_POST["id_roles"],
                "rol" => $_POST["rol"],
                "estado_rol" => $_POST["estado_rol"],
                "id_usuario" => $_POST["id_usuario"]
            );
            
            $response = RolesModel::saveRole($data);

            if ($response === "Ok") {
                echo '<script>
                        Swal.fire({
                            icon: "success",
                            title: "El rol ha sido guardado correctamente.",
                            showConfirmButton: true,
                            confirmButtonText: "Aceptar"
                        }).then(function(result){
                            if (result.value) {
                                window.location.href ="index.php?ruta=Roles/Roles";
                            }
                        });
                      </script>';
            } else {
                echo '<script>
                        Swal.fire({
                            icon: "error",
                            title: "Error al guardar el rol.",
                            text: "Por favor, inténtalo de nuevo.",
                            showConfirmButton: true,
                            confirmButtonText: "Aceptar"
                        });
                      </script>';
            }
        }
    }
}