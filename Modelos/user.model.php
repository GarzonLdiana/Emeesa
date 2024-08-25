<?php
require_once "connection.php";

class UserModel {
    // Método para autenticar al usuario
    public static function authenticate($correo, $contraseña) {
        try {
            $conexion = Connection::connect();
            $stmt = $conexion->prepare("SELECT * FROM usuario WHERE correo = :correo");
            $stmt->bindValue(":correo", $correo);
            $stmt->execute();

            if ($user = $stmt->fetch(PDO::FETCH_ASSOC)) {
                if (password_verify($contraseña, $user['contraseña'])) {
                    return $user; // Devuelve los datos del usuario si la autenticación es exitosa
                }
            }
            return null; // Devuelve null si las credenciales son incorrectas
        } catch (Exception $e) {
            error_log("Error en UserModel::authenticate(): " . $e->getMessage());
            return null; // Manejo de errores
        } finally {
            $conexion = null; // Cierra la conexión
        }
    }

    // Método para crear un nuevo usuario
    public static function createUser($nombre, $correo, $contraseña, $estado) {
        try {
            $conexion = Connection::connect();
            $stmt = $conexion->prepare("INSERT INTO usuario (nombre, correo, contraseña, estado) VALUES (:nombre, :correo, :contraseña, :estado)");
            $stmt->bindValue(":nombre", $nombre);
            $stmt->bindValue(":correo", $correo);
            $stmt->bindValue(":contraseña", password_hash($contraseña, PASSWORD_DEFAULT)); // Encriptar la contraseña
            $stmt->bindValue(":estado", $estado);
            $stmt->execute();
            return true; // Retorna verdadero si se crea el usuario
        } catch (Exception $e) {
            error_log("Error en UserModel::createUser(): " . $e->getMessage());
            return false; // Retorna falso si hay un error
        } finally {
            $conexion = null; // Cierra la conexión
        }
    }

    // Método para obtener la lista de usuarios
    public static function getUsers() {
        try {
            $conexion = Connection::connect();
            $stmt = $conexion->prepare("SELECT id_usuario, nombre, correo, estado FROM usuario");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC); // Devuelve todos los usuarios
        } catch (Exception $e) {
            error_log("Error en UserModel::getUsers(): " . $e->getMessage());
            return []; // Retorna un array vacío si hay un error
        } finally {
            $conexion = null; // Cierra la conexión
        }
    }
}