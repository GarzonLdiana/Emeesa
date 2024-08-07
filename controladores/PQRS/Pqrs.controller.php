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

require_once "./Modelos/Pqrs.model.php";

class PqrsController {

    // Método para recuperar listado de los registros
    static public function index() {
        // Llamar al modelo para recuperar todos los registros de la tabla
        $data = PqrsModel::index();
        return $data;
    }

    // Método para crear registros
    static public function create() {
        /** Validar que vengan datos en las variables pasadas desde la vista */
        if (isset($_POST["addInputDescription"])
            && isset($_POST["addInputCode"])
            && isset($_POST["addInputActive"])
        ) {
            $data = array(
                "addInputDescription" => $_POST["addInputDescription"],
                "addInputActive" => $_POST["addInputActive"],
                "addInputCode" => $_POST["addInputCode"],
                //"userId" => $_SESSION["userId"] 
                "userId" => 1
            );

            // Ejecutar el método create del modelo
            $response = PqrsModel::create($data);

            // ENVIAR MENSAJE DE REGISTRO ALMACENADO CON ÉXITO
            if ($response == "Ok") {
                /** Enviar mensaje de creación correcta */
                echo '<script>
                        Swal.fire({
                            icon: "success",
                            title: "El registro ha sido generado de forma correcta.",
                            showConfirmButton: true,
                            confirmButtonText: "Aceptar"
                        }).then(function(result){
                            if (result.value) {
                                /** Redireccionar a la página principal de historial */
                                window.location.href = "index.php?ruta=PQRS/Cosulta/Consulta";
                            }
                        })
                      </script>';
            } else {
                echo "error controlador";
            }
        }
    }
}

