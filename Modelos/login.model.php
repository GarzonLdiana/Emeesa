<?php
require_once "connection.php";

class LoginModel {
    public static function authenticate($correo, $contraseña) {
        try {
            $conexion = Connection::connect();
            $stmt = $conexion->prepare("SELECT * FROM usuario WHERE correo = :correo");
            $stmt->bindParam(":correo", $correo);
            $stmt->execute();

            if ($user = $stmt->fetch(PDO::FETCH_ASSOC)) {
                if (password_verify($contraseña, $user['contraseña'])) {
                    return $user; // Devuelve los datos del usuario si la autenticación es exitosa
                }
            }
            return null; // Devuelve null si las credenciales son incorrectas
        } catch (Exception $e) {
            error_log("Error en LoginModel::authenticate(): " . $e->getMessage());
            return null; // Manejo de errores
        } finally {
            $conexion = null; // Cierra la conexión
        }
    }
}