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
* 1.0       27/05/2024    GAES 14 -  Emessa                     Versión inicial del modelo de historial de consumo
* ====================================================================================================================
*/

require_once "./modelos/connection.php";

class historialModel {

  public static function index() {
    try {
      /** Realizar la consulta a la base de datos */
      $conexion = Connection::connect();
      $stmt = $conexion->prepare("SELECT hisc.id_consumo, hisc.fecha_consumo, hisc.total_consumo 
                                  FROM consumo AS hisc
                                  ORDER BY hisc.id_consumo DESC");

      /** Ejecutar la consulta */
      $stmt->execute(); 

      /** Devuelve los datos consultados */
      $result = $stmt->fetchAll();

      /** Cerrar el cursor */
      $stmt->closeCursor();

      return $result;

    } catch (Exception $e) {
      echo $e->getMessage();
      die();
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
      $stmt = $conexion->prepare("SELECT * FROM historial WHERE CODIGO = :code");
      $stmt->bindParam(":code", $data["addInputCode"], PDO::PARAM_STR);
      $stmt->execute();

      if ($stmt->rowCount() > 0) {
        // Ya existe un registro con ese código
        echo '<script>
                Swal.fire({
                  icon: "error",
                  title: "La consumo ya fue registrado.",
                  showConfirmButton: true,
                  confirmButtonText: "Aceptar"
                }).then(function(result){
                  if (result.value) {
                    window.location.href = "index.php?ruta=Consumos/VerHistorial/historial.crear";
                  }
                });
              </script>';
      } else {
        // Crear el nuevo registro del consumo
        $createStmt = $conexion->prepare("INSERT INTO Historial (codigo, Consumo kWh, activo, user_create)
                                          VALUES (:addInputCode, :addInputDescription, :addInputActive, :userId)");
        $createStmt->bindParam(":addInputCode", $data["addInputCode"], PDO::PARAM_STR);
        $createStmt->bindParam(":addInputDescription", $data["addInputDescription"], PDO::PARAM_STR);
        $createStmt->bindParam(":addInputActive", $data["addInputActive"], PDO::PARAM_INT);
        $createStmt->bindParam(":userId", $data["userId"], PDO::PARAM_INT);

        if ($createStmt->execute()) {
          return "Ok";
        } else {
          return "Error Modelo";
        }
      }

    } catch (Exception $e) {
      echo $e->getMessage();
      die();
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
}

?>
