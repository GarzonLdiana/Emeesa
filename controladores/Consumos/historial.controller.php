<?php
/* =============================================================================================================
* Desarrollado Por    		: GAES 14
* Fecha de Creación 		  : 18 enero 2023
* Lenguaje Programación 	: PHP
* Producto o sistema    	: EMEESA
* Tipo                    : Controlador
* ====================================================================================================================
* Versión Descripción
* [1.0.0.0] Controlador de la tabla historial de consumos
* ====================================================================================================================
* MODIFICACIONES:
* ====================================================================================================================
* Ver.      Fecha    		  Autor – Empresa                       Descripción
* --------- ------------- -----------------------------------   -------------------------------------------------------
* 1.0       27/05/2024    GAES 14-EMESSA                           Versión inicial del controlador
* ====================================================================================================================
*/

require_once "./Modelos/Consumos/historial.model.php";

class HistorialController {

    // Método para recuperar listado de los registros
    static public function index() {
        return HistorialModel::index();
    }

    // Método para crear registros
    static public function create() {
        if (
            isset($_POST["addInputCode"]) &&
            isset($_POST["addInputPeriodoConsumo"]) &&
            isset($_POST["addInputRangoFacturas"]) &&
            isset($_POST["addInputTotalConsumo"]) &&
            isset($_FILES["inputPdf"])
        ) {
            // Manejo del archivo PDF
            $pdfFile = $_FILES["inputPdf"];
            $uploadDir = "./assets/Docs/"; // Directorio donde se subirán los archivos
            $pdfPath = $uploadDir . basename($pdfFile["name"]);

            if (move_uploaded_file($pdfFile["tmp_name"], $pdfPath)) {
                $data = array(
                    "addInputCode" => $_POST["addInputCode"],
                    "addInputPeriodoConsumo" => $_POST["addInputPeriodoConsumo"],
                    "addInputRangoFacturas" => $_POST["addInputRangoFacturas"],
                    "addInputTotalConsumo" => $_POST["addInputTotalConsumo"],
                    "pdfPath" => basename($pdfFile["name"]), // Solo el nombre del archivo
                    "userId" => 1 // Aquí debería capturar el ID del usuario real desde la sesión
                );

                // Llamada al método create del modelo HistorialModel
                $response = HistorialModel::create($data);

                // Manejo de la respuesta
                if ($response == "Ok") {
                    echo '<script>
                            Swal.fire({
                                icon: "success",
                                title: "El consumo ha sido cargado de forma correcta.",
                                showConfirmButton: true,
                                confirmButtonText: "Aceptar"
                            }).then(function(result){
                                if (result.value) {
                                    window.location.href = "index.php?ruta=Consumos/Historial/historial.crear";
                                }
                            });
                          </script>';
                } else if ($response == "Consumo ya ingresado") {
                    echo '<script>
                            Swal.fire({
                                icon: "warning",
                                title: "Consumo ya ingresado.",
                                text: "El código del consumo ya existe en la base de datos.",
                                showConfirmButton: true,
                                confirmButtonText: "Aceptar"
                            });
                          </script>';
                } else {
                    echo '<script>
                            Swal.fire({
                                icon: "error",
                                title: "Error al guardar el consumo.",
                                text: "Por favor, inténtalo de nuevo.",
                                showConfirmButton: true,
                                confirmButtonText: "Aceptar"
                            });
                          </script>';
                }
            } else {
                echo '<script>
                        Swal.fire({
                            icon: "error",
                            title: "Error al subir el archivo.",
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

        // Devolver un valor al final del método
        return;
    }
}
