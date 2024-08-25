<?php

/* =============================================================================================================
* Desarrollado Por        : GAES 14
* Fecha de Creación       : 18 Mayo 2024
* Lenguaje Programación   : PHP
* Producto o sistema      : IEMESSA
* Tipo                    : Modelo
* ====================================================================================================================
* Versión Descripción
* [1.0.0.0] Modelo de la tabla pqrs.
* ====================================================================================================================
* MODIFICACIONES:
* ====================================================================================================================
* Ver.      Fecha            Autor – Empresa                       Descripción
* --------- -------------  -----------------------------------   -------------------------------------------------------
* 1.0       18/05/2024      GAES 14 -  Emeesa                     Versión inicial del modelo
* ====================================================================================================================
*/

require_once "./modelos/connection.php";

class PqrsModel {

    // Método para recuperar todas las Pqrs
    public static function index() {
        try {
            $conexion = Connection::connect();
            $stmt = $conexion->prepare("SELECT id_pqrs, fecha_radicacion_pqrs, tipo_pqrs, detalle, estado_pqrs FROM Pqrs ORDER BY id_pqrs DESC");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            error_log("Error en PqrsModel::index(): " . $e->getMessage());
            return [];
        } finally {
            $conexion = null;
        }
    }

    // Método para obtener una PQRS por su ID
    public static function findById($id_pqrs) {
        try {
            $conexion = Connection::connect();
            $stmt = $conexion->prepare("SELECT * FROM Pqrs WHERE id_pqrs = :id_pqrs");
            $stmt->bindParam(":id_pqrs", $id_pqrs, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            error_log("Error en PqrsModel::findById(): " . $e->getMessage());
            return null;
        } finally {
            if (isset($stmt)) {
                $stmt->closeCursor();
            }
            $conexion = null;
        }
    }

    // Método para guardar registro en la tabla de la base de datos
    public static function create($data) {
        try {
            $conexion = Connection::connect();
            
            $stmt = $conexion->prepare("SELECT * FROM Pqrs WHERE id_pqrs = :code");
            $stmt->bindParam(":code", $data["addInputCode"], PDO::PARAM_STR);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return "Pqrs ya ingresada";
            } else {
                $createStmt = $conexion->prepare("INSERT INTO Pqrs (id_pqrs, fecha_radicacion_pqrs, tipo_pqrs, detalle, usuario_id_usuario)
                                                  VALUES (:addInputCode, :addInputFechaRadicacion, :addInputTipo, :addInputDetalle, :userId)");
                $createStmt->bindParam(":addInputCode", $data["addInputCode"], PDO::PARAM_STR);
                $createStmt->bindParam(":addInputFechaRadicacion", $data["addInputFechaRadicacion"], PDO::PARAM_STR);
                $createStmt->bindParam(":addInputTipo", $data["addInputTipo"], PDO::PARAM_STR);
                $createStmt->bindParam(":addInputDetalle", $data["addInputDetalle"], PDO::PARAM_STR);
                $createStmt->bindParam(":userId", $data["userId"], PDO::PARAM_INT);

                if ($createStmt->execute()) {
                    return "Ok";
                } else {
                    error_log("Error en PqrsModel::create(): " . implode(", ", $createStmt->errorInfo()));
                    return "Error al guardar la PQRS";
                }
            }

        } catch (Exception $e) {
            error_log("Error en PqrsModel::create(): " . $e->getMessage());
            return "Error en la operación";
        } finally {
            if (isset($stmt)) {
                $stmt->closeCursor();
            }
            if (isset($createStmt)) {
                $createStmt->closeCursor();
            }
            $conexion = null;
        }
    }

    // Método para actualizar un registro en la tabla de la base de datos
    public static function update($id_pqrs, $data) {
        try {
            $conexion = Connection::connect();
            
            $stmt = $conexion->prepare("SELECT * FROM Pqrs WHERE id_pqrs = :code");
            $stmt->bindParam(":code", $id_pqrs, PDO::PARAM_STR);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $updateStmt = $conexion->prepare("UPDATE Pqrs 
                                                  SET fecha_radicacion_pqrs = :addInputFechaRadicacion, tipo_pqrs = :addInputTipo, detalle = :addInputDetalle
                                                  WHERE id_pqrs = :addInputCode");
                $updateStmt->bindParam(":addInputCode", $data["addInputCode"], PDO::PARAM_STR);
                $updateStmt->bindParam(":addInputFechaRadicacion", $data["addInputFechaRadicacion"], PDO::PARAM_STR);
                $updateStmt->bindParam(":addInputTipo", $data["addInputTipo"], PDO::PARAM_STR);
                $updateStmt->bindParam(":addInputDetalle", $data["addInputDetalle"], PDO::PARAM_STR);

                if ($updateStmt->execute()) {
                    return "Ok";
                } else {
                    error_log("Error en PqrsModel::update(): " . implode(", ", $updateStmt->errorInfo()));
                    return "Error al actualizar la PQRS";
                }
            } else {
                return "Pqrs no encontrada";
            }

        } catch (Exception $e) {
            error_log("Error en PqrsModel::update(): " . $e->getMessage());
            return "Error en la operación";
        } finally {
            if (isset($stmt)) {
                $stmt->closeCursor();
            }
            if (isset($updateStmt)) {
                $updateStmt->closeCursor();
            }
            $conexion = null;
        }
    }
}
