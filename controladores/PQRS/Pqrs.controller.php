<?php
/* =============================================================================================================
* Desarrollado Por            : GAES 14
* Fecha de Creación           : 18 enero 2023
* Lenguaje Programación       : PHP
* Producto o sistema          : EMEESA
* Tipo                        : Controlador
* ====================================================================================================================
* Versión Descripción
* [1.0.0.0] Controlador de la tabla pqrs
* ====================================================================================================================
* MODIFICACIONES:
* ====================================================================================================================
* Ver.      Fecha            Autor – Empresa                       Descripción
* --------- -------------  -----------------------------------   -------------------------------------------------------
* 1.0       27/05/2024      GAES 14-EMESSA                           Versión inicial del controlador
* ====================================================================================================================
*/

require_once "./Modelos/Pqrs.model.php";

class PqrsController {

    // Método para recuperar listado de los registros
    static public function index() {
        return PqrsModel::index();
    }

    // Método para obtener una PQRS por su ID
    static public function getPqrsById($id_pqrs) {
        // Llamada al método findById del modelo PqrsModel
        return PqrsModel::findById($id_pqrs);
    }

    // Método para crear registros
    static public function create() {
        if (isset($_POST["addInputCode"]) &&
            isset($_POST["addInputFechaRadicacion"]) &&
            isset($_POST["addInputTipo"]) &&
            isset($_POST["addInputDetalle"])) {

            $data = array(
                "addInputCode" => $_POST["addInputCode"],
                "addInputFechaRadicacion" => $_POST["addInputFechaRadicacion"],
                "addInputTipo" => $_POST["addInputTipo"],
                "addInputDetalle" => $_POST["addInputDetalle"],
                "userId" => 1 // Valor del usuario, deberías ajustarlo según el contexto
            );

            // Llamada al método create del modelo PqrsModel
            $response = PqrsModel::create($data);

            // Manejo de la respuesta
            if ($response == "Ok") {
                echo '<script>
                        Swal.fire({
                            icon: "success",
                            title: "La PQRS ha sido cargada de forma correcta.",
                            showConfirmButton: true,
                            confirmButtonText: "Aceptar"
                        }).then(function(result){
                            if (result.value) {
                                window.location.href = "index.php?ruta=PQRS/Consulta/Consulta";
                            }
                        });
                      </script>';
            } else if ($response == "Pqrs ya ingresada") {
                echo '<script>
                        Swal.fire({
                            icon: "warning",
                            title: "PQRS ya ingresada.",
                            text: "El código de la PQRS ya existe en la base de datos.",
                            showConfirmButton: true,
                            confirmButtonText: "Aceptar"
                        });
                      </script>';
            } else {
                echo '<script>
                        Swal.fire({
                            icon: "error",
                            title: "Error al guardar la PQRS.",
                            text: "Por favor, inténtalo de nuevo.",
                            showConfirmButton: true,
                            confirmButtonText: "Aceptar"
                        });
                      </script>';
            }
        } else {
            echo '<script>
                    Swal.fire({
                        icon: "warning",
                        title: "Datos incompletos.",
                        text: "Por favor, completa todos los campos.",
                        showConfirmButton: true,
                        confirmButtonText: "Aceptar"
                    });
                  </script>';
        }
    }

    // Método para actualizar registros
    static public function update($id_pqrs) {
        if (isset($_POST["addInputCode"]) &&
            isset($_POST["addInputFechaRadicacion"]) &&
            isset($_POST["addInputTipo"]) &&
            isset($_POST["addInputDetalle"])) {

            $data = array(
                "addInputCode" => $_POST["addInputCode"],
                "addInputFechaRadicacion" => $_POST["addInputFechaRadicacion"],
                "addInputTipo" => $_POST["addInputTipo"],
                "addInputDetalle" => $_POST["addInputDetalle"],
                "userId" => 1 // Valor del usuario, deberías ajustarlo según el contexto
            );

            // Llamada al método update del modelo PqrsModel
            $response = PqrsModel::update($id_pqrs, $data);

            // Manejo de la respuesta
            if ($response == "Ok") {
                echo '<script>
                        Swal.fire({
                            icon: "success",
                            title: "La PQRS ha sido actualizada de forma correcta.",
                            showConfirmButton: true,
                            confirmButtonText: "Aceptar"
                        }).then(function(result){
                            if (result.value) {
                                window.location.href = "index.php?ruta=PQRS/Consulta/Consulta";
                            }
                        });
                      </script>';
            } else if ($response == "Pqrs no encontrada") {
                echo '<script>
                        Swal.fire({
                            icon: "warning",
                            title: "PQRS no encontrada.",
                            text: "El código de la PQRS no existe en la base de datos.",
                            showConfirmButton: true,
                            confirmButtonText: "Aceptar"
                        });
                      </script>';
            } else {
                echo '<script>
                        Swal.fire({
                            icon: "error",
                            title: "Error al actualizar la PQRS.",
                            text: "Por favor, inténtalo de nuevo.",
                            showConfirmButton: true,
                            confirmButtonText: "Aceptar"
                        });
                      </script>';
            }
        } else {
            echo '<script>
                    Swal.fire({
                        icon: "warning",
                        title: "Datos incompletos.",
                        text: "Por favor, completa todos los campos.",
                        showConfirmButton: true,
                        confirmButtonText: "Aceptar"
                    });
                  </script>';
        }
    }
}

