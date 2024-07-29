<?php

/* =============================================================================================================
* Desarrollado Por        : GAES 14
* Fecha de Creación       : 18 Mayo 2024
* Lenguaje Programación   : PHP
* Producto o sistema      : IEMESSA
* Tipo                    : Modelo
* ====================================================================================================================
* Versión Descripción
* [1.0.0.0] Modelo de la tabla facturas.
* ====================================================================================================================
* MODIFICACIONES:
* ====================================================================================================================
* Ver.      Fecha            Autor – Empresa                       Descripción
* --------- ------------- -----------------------------------   -------------------------------------------------------
* 1.0       18/05/2024    GAES 14 -  Emeesa                     Versión inicial del modelo
* ====================================================================================================================
*/

require_once "./modelos/connection.php";

class FacturasModel {

    // Método para recuperar todas las facturas
    public static function index() {
        try {
            /** Realizar la consulta a la base de datos */
            $conexion = Connection::connect();
            $stmt = $conexion->prepare("SELECT fac.id_factura, fac.fecha_emision, fac.detalle 
                                         FROM Factura AS fac
                                         ORDER BY fac.id_factura DESC");

            /** Ejecutar la consulta */
            $stmt->execute(); 

            /** Devuelve los datos consultados */
            return $stmt->fetchAll(PDO::FETCH_ASSOC); // Devuelve todos los registros como un array asociativo

        } catch (Exception $e) {
            error_log("Error en FacturasModel::index(): " . $e->getMessage()); // Registra el error
            return []; // Retorna un array vacío en caso de error
        } finally {
            /** Liberar la conexión */
            $conexion = null;
        }
    }

    // Método para guardar registro en la tabla de la base de datos
    public static function create($data) {
        try {
            $conexion = Connection::connect();
            
            // Validar que no exista un registro con el mismo código
            $stmt = $conexion->prepare("SELECT * FROM Factura WHERE id_factura = :code");
            $stmt->bindParam(":code", $data["addInputCode"], PDO::PARAM_STR);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return "Factura ya ingresada"; // Retorna un mensaje si ya existe
            } else {
                // Crear la nueva factura
                $createStmt = $conexion->prepare("INSERT INTO Factura (id_factura, fecha_emision, monto, detalle, usuario_id_usuario)
                                                  VALUES (:addInputCode, :addInputFechaEmision, :addInputMonto, :addInputDetalle, :userId)");
                $createStmt->bindParam(":addInputCode", $data["addInputCode"], PDO::PARAM_STR);
                $createStmt->bindParam(":addInputDetalle", $data["addInputDetalle"], PDO::PARAM_STR);
                $createStmt->bindParam(":addInputFechaEmision", $data["addInputFechaEmision"], PDO::PARAM_STR); // Cambiado a PARAM_STR
                $createStmt->bindParam(":addInputMonto", $data["addInputMonto"], PDO::PARAM_STR); // Cambiado a PARAM_STR
                $createStmt->bindParam(":userId", $data["userId"], PDO::PARAM_INT);

                if ($createStmt->execute()) {
                    return "Ok"; // Retorna "Ok" si la inserción fue exitosa
                } else {
                    error_log("Error en FacturasModel::create(): " . implode(", ", $createStmt->errorInfo())); // Registra el error
                    return "Error al guardar la factura"; // Retorna un mensaje de error
                }
                
            }

        } catch (Exception $e) {
            error_log("Error en FacturasModel::create(): " . $e->getMessage()); // Registra el error
            echo "<script>console.log('Console: " . $e->getMessage() . "' );</script>";
            return "Error en la operación"; // Retorna un mensaje genérico de error
        } finally {
            if (isset($stmt)) {
                $stmt->closeCursor(); // Cierra el cursor
            }
            if (isset($createStmt)) {
                $createStmt->closeCursor(); // Cierra el cursor
            }
            $conexion = null; // Libera la conexión
        }
    }
}