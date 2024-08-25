<?php
    /* =============================================================================================================
    * Desarrollado Por    		: GAES 14
    * Fecha de Creación 		  : 18 enero 2023
    * Lenguaje Programación 	: PHP
    * Producto o sistema    	: EMEESA
    * Tipo                    : Controlador
    * ====================================================================================================================
    * Versión Descripción
    * [1.0.0.0] Controlador de la tabla Financiaciones
    * ====================================================================================================================
    * MODIFICACIONES:
    * ====================================================================================================================
    * Ver.      Fecha    		  Autor – Empresa                       Descripción
    * --------- ------------- -----------------------------------   -------------------------------------------------------
    * 1.0       20/05/2024    GAES 14-EMESSA                           Versión inicial del controlador
    * ====================================================================================================================
    */

    require_once "./Modelos/Financiaciones.model.php";
    
    class FinanciacionesController{

        // Método para recuperar listado de los registros
        public static function index() {
            return FinanciacionesModel::index();
        } 

        // Método para crear registros
        public static function create() {

            // Validar que vengan datos en las variables pasadas desde la vista
            if (isset($_POST["addInputCode"]) &&
                isset($_POST["addInputFechaRespuesta"]) &&
                isset($_POST["addInputMontoFinanciado"]) &&
                isset($_POST["addInputPlanPago"]) &&
                isset($_POST["addInputEstado"]) &&
                isset($_POST["addInputDetalles"]) &&
                isset($_FILES["inputPdf"])
            ) {
                // Manejo del archivo PDF
                $pdfFile = $_FILES["inputPdf"];
                $uploadDir = "./assets/Docs/"; // Directorio donde se subirán los archivos
                $pdfPath = $uploadDir . basename($pdfFile["name"]);

                if (move_uploaded_file($pdfFile["tmp_name"], $pdfPath)) {
                    $data = array(
                        "addInputCode" => $_POST["addInputCode"],
                        "addInputFechaRespuesta" => $_POST["addInputFechaRespuesta"],
                        "addInputMontoFinanciado" => $_POST["addInputMontoFinanciado"],
                        "addInputPlanPago" => $_POST["addInputPlanPago"],
                        "addInputEstado" => $_POST["addInputEstado"],
                        "addInputDetalles" => $_POST["addInputDetalles"],
                        "pdfPath" => basename($pdfFile["name"]), // Solo el nombre del archivo
                        "userId" => 1 // Aquí deberías asegurarte de asignar el ID correcto del usuario
                    );

                    // Llamada al método create del modelo FinanciacionesModel
                    $response = FinanciacionesModel::create($data);

                    // Manejo de la respuesta
                    if ($response == "Ok") {
                        echo '<script>
                                Swal.fire({
                                    icon: "success",
                                    title: "El Registro ha sido cargado de forma correcta.",
                                    showConfirmButton: true,
                                    confirmButtonText: "Aceptar"
                                }).then(function(result){
                                    if (result.value) {
                                        window.location.href = "index.php?ruta=Financiaciones/financiaciones.crear";
                                    }
                                });
                              </script>';
                    } else if ($response == "Registro ya ingresado") {
                        echo '<script>
                                Swal.fire({
                                    icon: "warning",
                                    title: "Registro ya ingresado.",
                                    text: "El código del registro ya existe en la base de datos.",
                                    showConfirmButton: true,
                                    confirmButtonText: "Aceptar"
                                });
                              </script>';
                    } else {
                        echo '<script>
                                Swal.fire({
                                    icon: "error",
                                    title: "Error al guardar el registro.",
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

