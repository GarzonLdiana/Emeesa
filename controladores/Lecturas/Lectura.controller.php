<?php
/* =============================================================================================================
 * Desarrollado Por            : GAES 14
 * Fecha de Creación           : 18 enero 2023
 * Lenguaje Programación       : PHP
 * Producto o sistema          : EMEESA
 * Tipo                        : Controlador
 * ====================================================================================================================
 * Versión Descripción
 * [1.0.0.0] Controlador de la tabla Facturas
 * ====================================================================================================================
 * MODIFICACIONES:
 * ====================================================================================================================
 * Ver.      Fecha             Autor – Empresa                       Descripción
 * --------- ------------- -----------------------------------   -------------------------------------------------------
 * 1.0       18/06/2024    GAES 14-EMESSA                           Versión inicial del controlador
 * ====================================================================================================================
 */

require_once "./Modelos/Lectura.model.php";

class LecturaController
{

    // Método para recuperar listado de los registros
    static public function index()
    {
        return LecturaModel::index();
    }

    // Método para crear registros
    static function create()
    {

        /** Validar que vengan datos en las variables pasadas desde la vista */
        if (
            isset($_POST["addInputCode"]) &&
            isset($_POST["addInputIdConsumo"]) &&
            isset($_POST["addInputFechaLectura"]) &&
            isset($_POST["addInputLectura"]) &&
            isset($_FILES["inputPdf"])
        ) {

            // Manejo del archivo PDF
            $pdfFile = $_FILES["inputPdf"];
            $uploadDir = "./assets/Docs/"; // Directorio donde se subirán los archivos
            $pdfPath = $uploadDir . basename($pdfFile["name"]);

            if (move_uploaded_file($pdfFile["tmp_name"], $pdfPath)) {
                $data = array(
                    "addInputCode" => $_POST["addInputCode"],
                    "addInputIdConsumo" => $_POST["addInputIdConsumo"],
                    "addInputFechaLectura" => $_POST["addInputFechaLectura"],
                    "addInputLectura" => $_POST["addInputLectura"],
                    "pdfPath" => basename($pdfFile["name"]), // Solo el nombre del archivo
                    "userId" => $_POST["userId"], // Aquí deberías establecer el ID del usuario actual
                    "consumoId" => $_POST["consumoId"] 
                );

                // Ejecutar el método create del modelo
                $response = LecturaModel::create($data);

                // ENVIAR MENSAJE DE REGISTRO ALMACENADO CON ÉXITO
                if ($response == "Ok") {
                    /** Enviar mensaje de creación correcta */
                    echo '<script>
                            Swal.fire({
                                icon: "success",
                                title: "La Lectura ha sido generada de forma correcta.",
                                showConfirmButton: true,
                                confirmButtonText: "Aceptar"
                            }).then(function(result){
                                if (result.value) {
                                    /** Redireccionar a la página principal de lecturas */
                                    window.location.href = "index.php?ruta=Consumos/Lecturas/Lecturas";
                                }
                            });
                          </script>';

                } else if ($response == "Lectura ya ingresada") {
                    echo '<script>
                            Swal.fire({
                                icon: "warning",
                                title: "Lectura ya ingresada.",
                                text: "El código de la Lectura ya existe en la base de datos.",
                                showConfirmButton: true,
                                confirmButtonText: "Aceptar"
                            });
                          </script>';
                } else {
                    echo '<script>
                            Swal.fire({
                                icon: "error",
                                title: "Error al guardar la lectura.",
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
