<?php

require_once "./modelos/connection.php";

class RolesModel {

    // Método para recuperar todos los registros de roles
    public static function index() {
        try {
            $conexion = Connection::connect();
            $stmt = $conexion->prepare("
                SELECT roles.id_roles, 
                       usuario.nombre AS usuario_nombre, 
                       usuario.estado_usuario AS usuario_estado_usuario, 
                       roles.rol, 
                       roles.estado_rol, 
                       usuario.id_usuario AS id_usuario
                FROM roles_has_usuario
                INNER JOIN usuario ON usuario.id_usuario = roles_has_usuario.usuario_id_usuario 
                INNER JOIN roles ON roles.id_roles = roles_has_usuario.roles_id_roles
                ORDER BY usuario.id_usuario DESC
            ");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            error_log("Error en RolesModel::index(): " . $e->getMessage());
            return [];
        } finally {
            $conexion = null;
        }
    }

    // Método para recuperar un registro de rol por su ID y ID de usuario
    public static function getById($id_roles, $id_usuario) {
        try {
            $conexion = Connection::connect();
            $stmt = $conexion->prepare("
                SELECT roles.id_roles, 
                       usuario.nombre AS usuario_nombre, 
                       usuario.estado_usuario AS usuario_estado_usuario, 
                       roles.rol, 
                       roles.estado_rol
                FROM roles_has_usuario
                INNER JOIN usuario ON usuario.id_usuario = roles_has_usuario.usuario_id_usuario 
                INNER JOIN roles ON roles.id_roles = roles_has_usuario.roles_id_roles
                WHERE roles.id_roles = :id_roles AND usuario.id_usuario = :id_usuario
            ");
            $stmt->bindParam(":id_roles", $id_roles, PDO::PARAM_INT);
            $stmt->bindParam(":id_usuario", $id_usuario, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            error_log("Error en RolesModel::getById(): " . $e->getMessage());
            return null;
        } finally {
            $conexion = null;
        }
    }

    // Método para crear o actualizar un rol
    public static function saveRole($data) {
        try {
            $conexion = Connection::connect();
            
            // Verificar si es una actualización o una creación
            if (isset($data['id_roles'])) {
                // Actualizar el rol
                $stmt = $conexion->prepare("
                    UPDATE roles 
                    SET rol = :rol, 
                        estado_rol = :estado_rol
                    WHERE id_roles = :id_roles
                ");
                $stmt->bindParam(":id_roles", $data['id_roles'], PDO::PARAM_INT);
            } else {
                // Crear un nuevo rol
                $stmt = $conexion->prepare("
                    INSERT INTO roles (rol, estado_rol) 
                    VALUES (:rol, :estado_rol)
                ");
            }
            
            $stmt->bindParam(":rol", $data['rol'], PDO::PARAM_STR);
            $stmt->bindParam(":estado_rol", $data['estado_rol'], PDO::PARAM_STR);
            
            if ($stmt->execute()) {
                $id_roles = isset($data['id_roles']) ? $data['id_roles'] : $conexion->lastInsertId();
                
                // Actualizar la relación en roles_has_usuario
                $stmtUsuario = $conexion->prepare("
                    REPLACE INTO roles_has_usuario (roles_id_roles, usuario_id_usuario) 
                    VALUES (:id_roles, :id_usuario)
                ");
                $stmtUsuario->bindParam(":id_roles", $id_roles, PDO::PARAM_INT);
                $stmtUsuario->bindParam(":id_usuario", $data['id_usuario'], PDO::PARAM_INT);
                
                if ($stmtUsuario->execute()) {
                    return "Ok";
                } else {
                    error_log("Error en RolesModel::saveRole(): " . implode(", ", $stmtUsuario->errorInfo()));
                    return "Error al actualizar la relación con el usuario";
                }
            } else {
                error_log("Error en RolesModel::saveRole(): " . implode(", ", $stmt->errorInfo()));
                return "Error al guardar el rol";
            }
        } catch (Exception $e) {
            error_log("Error en RolesModel::saveRole(): " . $e->getMessage());
            return "Error en la operación";
        } finally {
            if (isset($stmt)) {
                $stmt->closeCursor();
            }
            $conexion = null;
        }
    }
}