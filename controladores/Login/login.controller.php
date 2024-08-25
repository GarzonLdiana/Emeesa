<?php
require_once "./Modelos/user.model.php"; // Asegúrate de que la ruta sea correcta

class LoginController {
    public static function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $correo = $_POST['correo'];
            $contraseña = $_POST['contraseña'];

            $user = UserModel::authenticate($correo, $contraseña);
            if ($user) {
                // Iniciar sesión y redirigir al dashboard
                session_start();
                $_SESSION['user_id'] = $user['id_usuario'];
                header("Location: index.php?ruta=Dashboard/dashboard");
                exit();
            } else {
                echo '<script>alert("Credenciales incorrectas. Inténtalo de nuevo.");</script>';
            }
        }
    }
}