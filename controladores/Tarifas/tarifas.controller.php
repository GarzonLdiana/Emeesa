<?php
require_once "./Modelos/Tarifas.model.php";

class TarifasController {

    // Método para recuperar listado de los registros
    static public function index() {
        return TarifasModel::index();
    }

    // Método para crear registros
    static public function create() {
        if (
            isset($_POST["addInputCode"]) &&
            isset($_POST["addInputMesAño"]) &&
            isset($_FILES["inputPdf"])
        ) {
            // Manejo del archivo PDF
            $pdfFile = $_FILES["inputPdf"];
            $pdfPath = TarifasModel::uploadFile($pdfFile); // Llama al método para subir el archivo

            if ($pdfPath === false) {
                echo '<script>
                        Swal.fire({
                            icon: "error",
                            title: "Error al subir el archivo.",
                            text: "Por favor, inténtalo de nuevo.",
                            showConfirmButton: true,
                            confirmButtonText: "Aceptar"
                        });
                      </script>';
                return;
            }

            $data = array(
                "addInputCode" => $_POST["addInputCode"],
                "addInputMesAño" => $_POST["addInputMesAño"],
                "pdfPath" => basename($pdfFile["name"]) // Solo el nombre del archivo
            );

            // Llamada al método create del modelo TarifasModel
            $response = TarifasModel::create($data);

            // Manejo de la respuesta
            if ($response == "Ok") {
                echo '<script>
                        Swal.fire({
                            icon: "success",
                            title: "La tarifa ha sido cargada de forma correcta.",
                            showConfirmButton: true,
                            confirmButtonText: "Aceptar"
                        }).then(function(result){
                            if (result.value) {
                                window.location.href = "index.php?ruta=Tarifas/tarifas.crear";
                            }
                        });
                      </script>';
            } else if ($response == "Tarifa ya ingresada") {
                echo '<script>
                        Swal.fire({
                            icon: "warning",
                            title: "Tarifa ya ingresada.",
                            text: "El número de la tarifa ya existe en la base de datos.",
                            showConfirmButton: true,
                            confirmButtonText: "Aceptar"
                        });
                      </script>';
            } else {
                echo '<script>
                        Swal.fire({
                            icon: "error",
                            title: "Error al guardar la tarifa.",
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

        return;
    }
}