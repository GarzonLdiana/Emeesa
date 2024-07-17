<?php

/* =============================================================================================================
* Desarrollado Por        : GAES 14
* Fecha de Creación       : 16 Julio 2024
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
* 1.0       16/07/2024    GAES 14 -  Emeesa                     Versión inicial del modelo
* ====================================================================================================================
*/

require_once "./modelos/connection.php";

class RolesModel {

  public static function index() {
    try {
      /** Realizar la consulta a la base de datos */
      $conexion = Connection::connect();
      $stmt = $conexion->prepare("SELECT rol.id_roles, rol.nombre_de_usuario, rol.descripcion_del_rol, rol.estado, rol.acciones 
                                  FROM Roles AS rol
                                  ORDER BY rol.id_roles DESC");

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
      $stmt = $conexion->prepare("SELECT * FROM Roles WHERE CODIGO = :code");
      $stmt->bindParam(":code", $data["addInputCode"], PDO::PARAM_STR);
      $stmt->execute();

      if ($stmt->rowCount() > 0) {
        // Ya existe un registro con ese código
        echo '<script>
                Swal.fire({
                  icon: "error",
                  title: "La consulta ya fue generada.",
                  showConfirmButton: true,
                  confirmButtonText: "Aceptar"
                }).then(function(result){
                  if (result.value) {
                    window.location.href = "index.php?ruta=Roles/ListarRoles/roles.crear";
                  }
                });
              </script>';
      } else {
        // Crear la nueva consulta
        $createStmt = $conexion->prepare("INSERT INTO Rol (codigo, descripcion, activo, user_create)
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


