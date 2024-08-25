<?php
require_once "./Modelos/user.model.php"; // Asegúrate de que la ruta sea correcta

class UserController {
    // Método para crear un nuevo usuario
    public static function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $correo = $_POST['correo'];
            $contraseña = $_POST['contraseña'];
            $estado = $_POST['estado'];

            if (UserModel::createUser($nombre, $correo, $contraseña, $estado)) {
                header("Location: index.php?ruta=User/success");
                exit();
            } else {
                echo '<script>alert("Error al crear el usuario.");</script>';
            }
        }
    }

    // Método para obtener la lista de usuarios
    public static function getUsers() {
        return UserModel::getUsers();
    }
}