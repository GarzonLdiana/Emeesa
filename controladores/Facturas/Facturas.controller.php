<?php
    /* =============================================================================================================
    * Desarrollado Por    		: GAES 14
    * Fecha de Creación 		  : 18 enero 2023
    * Lenguaje Programación 	: PHP
    * Producto o sistema    	: EMEESA
    * Tipo                    : Controlador
    * ====================================================================================================================
    * Versión Descripción
    * [1.0.0.0] Controlador de la tabla Facturas
    * ====================================================================================================================
    * MODIFICACIONES:
    * ====================================================================================================================
    * Ver.      Fecha    		  Autor – Empresa                       Descripción
    * --------- ------------- -----------------------------------   -------------------------------------------------------
    * 1.0       18/05/2024    GAES 14-EMESSA                           Versión inicial del controlador
    * ====================================================================================================================
    */


    require_once "./Modelos/Facturas.model.php";

class FacturasController {

    // Método para recuperar listado de los registros
    static public function index() {
        return FacturasModel::index();
    }

    // Método para crear registros
    static function create() {
      
        if (isset($_POST["addInputDetalle"]) &&
            isset($_POST["addInputCode"]) &&
            isset($_POST["addInputMonto"]) &&
            isset($_POST["addInputFechaEmision"])) 
        {
            $data = array(
                "addInputDetalle" => $_POST["addInputDetalle"],
                "addInputFechaEmision" => $_POST["addInputFechaEmision"],
                "addInputMonto" => $_POST["addInputMonto"],
                "addInputCode" => $_POST["addInputCode"],
                "userId" => 1 // Cambia esto según tu lógica de usuario
            );
            
            $response = FacturasModel::create($data);
            
            if ($response == "Ok") {
                echo '<script>
                        Swal.fire({
                            icon: "success",
                            title: "La factura ha sido cargada de forma correcta.",
                            showConfirmButton: true,
                            confirmButtonText: "Aceptar"
                        }).then(function(result){
                            if (result.value) {
                                window.location.href = "index.php?ruta=Facturas/Verfacturas";
                            }
                        });
                      </script>';
            } else {
                echo '<script>
                        Swal.fire({
                            icon: "error",
                            title: "Error al guardar la factura.",
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

