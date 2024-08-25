<?php
/* =============================================================================================================
* Desarrollado Por        : GAES 14
* Fecha de Creación       : 18 Mayo 2024
* Lenguaje Programación   : PHP
* Producto o sistema      : IEMESSA
* Tipo                    : Modelo
* ====================================================================================================================
* Versión Descripción
* [1.0.0.0] Modelo de la tabla financiaciones.
* ====================================================================================================================
* MODIFICACIONES:
* ====================================================================================================================
* Ver.      Fecha            Autor – Empresa                       Descripción
* --------- ------------- -----------------------------------   -------------------------------------------------------
* 1.0       18/05/2024    GAES 14 -  Emessa                     Versión inicial del modelo
* ====================================================================================================================
*/

require_once "./modelos/connection.php";

class FinanciacionesModel {

    // Método para recuperar el listado de registros
    public static function index() {
        try {
            // Realizar la consulta a la base de datos
            $conexion = Connection::connect();
            $stmt = $conexion->prepare("SELECT hisf.id_financiaciones, hisf.fecha_respuesta, hisf.monto_financiado, hisf.plan_pago, hisf.estado, hisf.detalles, hisf.pdf_path  
                                        FROM financiaciones AS hisf
                                        ORDER BY hisf.id_financiaciones DESC");

            // Ejecutar la consulta
            $stmt->execute(); 

            // Devuelve los datos consultados
            return $stmt->fetchAll(PDO::FETCH_ASSOC); // Devuelve todos los registros como un array asociativo

        } catch (Exception $e) {
            error_log("Error en FinanciacionesModel::index(): " . $e->getMessage()); // Registra el error
            return []; // Retorna un array vacío en caso de error
        } finally {
            // Liberar la conexión
            $conexion = null;
        }
    }

    // Método para guardar un registro en la tabla de la base de datos
    public static function create($data) {
        try {
            $conexion = Connection::connect();
            
            // Validar que no exista un registro con el mismo código
            $stmt = $conexion->prepare("SELECT * FROM Financiaciones WHERE id_financiaciones = :code");
            $stmt->bindParam(":code", $data["addInputCode"], PDO::PARAM_STR);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return "Registro ya ingresado"; // Retorna un mensaje si ya existe
            } else {
                // Crear el nuevo registro
                $createStmt = $conexion->prepare("INSERT INTO Financiaciones (id_financiaciones, fecha_respuesta, monto_financiado, plan_pago, estado, detalles, usuario_id_usuario, pdf_path)
                                                  VALUES (:addInputCode, :addInputFechaRespuesta, :addInputMontoFinanciado, :addInputPlanPago, :addInputEstado, :addInputDetalles, :userId, :pdfPath)");
                $createStmt->bindParam(":addInputCode", $data["addInputCode"], PDO::PARAM_STR);
                $createStmt->bindParam(":addInputFechaRespuesta", $data["addInputFechaRespuesta"], PDO::PARAM_STR);
                $createStmt->bindParam(":addInputMontoFinanciado", $data["addInputMontoFinanciado"], PDO::PARAM_STR);
                $createStmt->bindParam(":addInputPlanPago", $data["addInputPlanPago"], PDO::PARAM_STR);
                $createStmt->bindParam(":addInputEstado", $data["addInputEstado"], PDO::PARAM_STR);
                $createStmt->bindParam(":addInputDetalles", $data["addInputDetalles"], PDO::PARAM_STR);
                $createStmt->bindParam(":userId", $data["userId"], PDO::PARAM_INT);
                $createStmt->bindParam(":pdfPath", $data["pdfPath"], PDO::PARAM_STR);

                if ($createStmt->execute()) {
                    return "Ok"; // Retorna "Ok" si la inserción fue exitosa
                } else {
                    error_log("Error en FinanciacionesModel::create(): " . implode(", ", $createStmt->errorInfo())); // Registra el error
                    return "Error al guardar el registro"; // Retorna un mensaje de error
                }
                
            }

        } catch (Exception $e) {
            error_log("Error en FinanciacionesModel::create(): " . $e->getMessage()); // Registra el error
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

