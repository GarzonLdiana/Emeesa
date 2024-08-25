<?php
/* =============================================================================================================
* Desarrollado Por        : GAES 14
* Fecha de Creación       : 18 Mayo 2024
* Lenguaje Programación   : PHP
* Producto o sistema      : IEMESSA
* Tipo                    : Modelo
* ====================================================================================================================
* Versión Descripción
* [1.0.0.0] Modelo de la tabla lectura.
* ====================================================================================================================
* MODIFICACIONES:
* ====================================================================================================================
* Ver.      Fecha            Autor – Empresa                       Descripción
* --------- ------------- -----------------------------------   -------------------------------------------------------
* 1.0       18/06/2024    GAES 14 -  Emeesa                     Versión inicial del modelo
* ====================================================================================================================
*/

require_once "./modelos/connection.php";

class LecturaModel {

    // Método para recuperar todas las lecturas
    public static function index() {
        try {
            /** Realizar la consulta a la base de datos */
            $conexion = Connection::connect();
            $stmt = $conexion->prepare("SELECT tom.id_lectura, tom.consumo_id_consumo, tom.fecha_lectura, tom.lectura, tom.pdf_path
                                        FROM toma_de_lectura AS tom
                                        ORDER BY tom.id_lectura DESC");

            /** Ejecutar la consulta */
            $stmt->execute(); 

            /** Devuelve los datos consultados */
            return $stmt->fetchAll(PDO::FETCH_ASSOC); // Devuelve todos los registros como un array asociativo

        } catch (Exception $e) {
            error_log("Error en LecturaModel::index(): " . $e->getMessage()); // Registra el error
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
            $stmt = $conexion->prepare("SELECT * FROM toma_de_lectura WHERE id_lectura = :code");
            $stmt->bindParam(":code", $data["addInputCode"], PDO::PARAM_STR);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return "Lectura ya ingresada"; // Retorna un mensaje si ya existe
            } else {
                // Crear la nueva lectura
                $createStmt = $conexion->prepare("INSERT INTO toma_de_lectura (id_lectura, consumo_id_consumo, fecha_lectura, lectura, usuario_id_usuario, pdf_path)
                                                  VALUES (:addInputCode, :addInputIdConsumo, :addInputFechaLectura, :addInputLectura, :userId, :pdfPath)");
                $createStmt->bindParam(":addInputCode", $data["addInputCode"], PDO::PARAM_STR);
                $createStmt->bindParam(":addInputIdConsumo", $data["addInputIdConsumo"], PDO::PARAM_STR);
                $createStmt->bindParam(":addInputFechaLectura", $data["addInputFechaLectura"], PDO::PARAM_STR);
                $createStmt->bindParam(":addInputLectura", $data["addInputLectura"], PDO::PARAM_STR);
                $createStmt->bindParam(":userId", $data["userId"], PDO::PARAM_INT);
                $createStmt->bindParam(":pdfPath", $data["pdfPath"], PDO::PARAM_STR);

                if ($createStmt->execute()) {
                    return "Ok"; // Retorna "Ok" si la inserción fue exitosa
                } else {
                    error_log("Error en LecturaModel::create(): " . implode(", ", $createStmt->errorInfo())); // Registra el error
                    return "Error al guardar la lectura"; // Retorna un mensaje de error
                }
                
            }

        } catch (Exception $e) {
            error_log("Error en LecturaModel::create(): " . $e->getMessage()); // Registra el error
            return "Error en la operación"; // Retorna un mensaje genérico de error
        } finally {
            if (isset($stmt)) {
                $stmt->closeCursor(); // Cierra el cursor
            }
            if (isset($createStmt)) {
                $createStmt->closeCursor(); // Cierra el cursor
            }
             $conexion = null; // libera la conexion
        }
    }
}
