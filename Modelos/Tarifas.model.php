<?php

require_once "./modelos/connection.php";

class TarifasModel {
    // Método para recuperar todos los tarifas
    public static function index() {
        try {
            $conexion = Connection::connect();
            $stmt = $conexion->prepare("SELECT tar.id_tarifa, tar.mes_año_tarifa, tar.pdf_path
                                        FROM Tarifa AS tar
                                        ORDER BY tar.id_tarifa DESC");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            error_log("Error en TarifasModel::index(): " . $e->getMessage());
            return [];
        } finally {
            $conexion = null;
        }
    }

    // Método para guardar registro en la tabla de la base de datos
    public static function create($data) {
        try {
            $conexion = Connection::connect();
            $stmt = $conexion->prepare("SELECT * FROM Tarifa WHERE id_tarifa = :code");
            $stmt->bindParam(":code", $data["addInputCode"], PDO::PARAM_STR);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return "Tarifa ya ingresada";
            } else {
                // Crear la nueva Tarifa
                $createStmt = $conexion->prepare("INSERT INTO Tarifa (id_tarifa, mes_año_tarifa, pdf_path)
                                                  VALUES (:addInputCode, :addInputMesAño, :pdfPath)");
                $createStmt->bindParam(":addInputCode", $data["addInputCode"], PDO::PARAM_STR);
                $createStmt->bindParam(":addInputMesAño", $data["addInputMesAño"], PDO::PARAM_STR);
                $createStmt->bindParam(":pdfPath", $data["pdfPath"], PDO::PARAM_STR);

                if ($createStmt->execute()) {
                    return "Ok";
                } else {
                    error_log("Error en TarifasModel::create(): " . implode(", ", $createStmt->errorInfo()));
                    return "Error al guardar la tarifa";
                }
            }
        } catch (Exception $e) {
            error_log("Error en TarifasModel::create(): " . $e->getMessage());
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

    // Método para subir el archivo PDF
    public static function uploadFile($file) {
        $targetDir = "assets/Docs/"; // Directorio donde se guardarán los archivos
        $targetFile = $targetDir . basename($file["name"]);
        $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Verificar si es un archivo PDF
        if ($fileType != "pdf") {
            return false;
        }

        // Mover el archivo a la carpeta de destino
        if (move_uploaded_file($file["tmp_name"], $targetFile)) {
            return $targetFile; // Retorna la ruta del archivo subido
        } else {
            return false; // Retorna false si hubo un error al mover el archivo
        }
    }
}