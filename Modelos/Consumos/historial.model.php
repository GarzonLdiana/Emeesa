<?php

/* =============================================================================================================
* Desarrollado Por        : GAES 14
* Fecha de Creación       : 18 Mayo 2024
* Lenguaje Programación   : PHP
* Producto o sistema      : IEMESSA
* Tipo                    : Modelo
* ====================================================================================================================
* Versión Descripción
* [1.0.0.0] Modelo de la tabla historial de consumo.
* ====================================================================================================================
* MODIFICACIONES:
* ====================================================================================================================
* Ver.      Fecha            Autor – Empresa                       Descripción
* --------- ------------- -----------------------------------   -------------------------------------------------------
* 1.0       01/07/2024    GAES 14 -  Emessa                     Versión inicial del modelo
* ====================================================================================================================
*/

require_once "./modelos/connection.php";

class HistorialModel {
    // Método para recuperar todos los consumos
    public static function index() {
        try {
            /** Realizar la consulta a la base de datos */
            $conexion = Connection::connect();
            $stmt = $conexion->prepare("SELECT his.id_consumo, his.periodo_consumo, his.rango_facturas, his.total_consumo, his.pdf_path
                                        FROM Consumo AS his
                                        ORDER BY his.id_consumo DESC");

            /** Ejecutar la consulta */
            $stmt->execute(); 

            /** Devuelve los datos consultados */
            return $stmt->fetchAll(PDO::FETCH_ASSOC); // Devuelve todos los registros como un array asociativo

        } catch (Exception $e) {
            error_log("Error en HistorialModel::index(): " . $e->getMessage()); // Registra el error
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
            $stmt = $conexion->prepare("SELECT * FROM Consumo WHERE id_consumo = :code");
            $stmt->bindParam(":code", $data["addInputCode"], PDO::PARAM_STR);
            $stmt->execute();
            
            if ($stmt->rowCount() > 0) {
                return "Consumo ya ingresado"; // Retorna un mensaje si ya existe
            } else {
                // Crear el nuevo consumo
                $createStmt = $conexion->prepare("INSERT INTO Consumo (id_consumo, periodo_consumo, rango_facturas, total_consumo, usuario_id_usuario, pdf_path)
                                                  VALUES (:addInputCode, :addInputPeriodoConsumo, :addInputRangoFacturas, :addInputTotalConsumo, :userId, :pdfPath)");
                $createStmt->bindParam(":addInputCode", $data["addInputCode"], PDO::PARAM_STR);
                $createStmt->bindParam(":addInputPeriodoConsumo", $data["addInputPeriodoConsumo"], PDO::PARAM_STR);
                $createStmt->bindParam(":addInputRangoFacturas", $data["addInputRangoFacturas"], PDO::PARAM_STR);
                $createStmt->bindParam(":addInputTotalConsumo", $data["addInputTotalConsumo"], PDO::PARAM_STR);
                $createStmt->bindParam(":userId", $data["userId"], PDO::PARAM_INT);
                $createStmt->bindParam(":pdfPath", $data["pdfPath"], PDO::PARAM_STR);

                if ($createStmt->execute()) {
                    return "Ok"; // Retorna "Ok" si la inserción fue exitosa
                } else {
                    error_log("Error en HistorialModel::create(): " . implode(", ", $createStmt->errorInfo())); // Registra el error
                    return "Error al guardar el consumo"; // Retorna un mensaje de error
                }
            }

        } catch (Exception $e) {
            error_log("Error en HistorialModel::create(): " . $e->getMessage()); // Registra el error
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
