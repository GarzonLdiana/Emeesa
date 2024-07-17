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


    require_once "./Modelos/Roles.model.php";
    
    class RolesController{

      	  
      // Método para recuperar listado de los registros
      static public function  index(){

        // LLamar al modelo para recuperar todos los registros de la tabla
        $data = RolesModel::index();
        return  $data;
      }


      // Método para crear registros
      static function create()
      {

         /** Validar que vengan datos en las variables pasadas desde la vista */
         if (isset($_POST["addInputDescription"])
             && isset($_POST["addInputCode"])
             && isset($_POST["addInputActive"])
         ) 
         {
           $data = array(	"addInputDescription" => $_POST["addInputDescription"],
                           "addInputActive" => $_POST["addInputActive"],
                           "addInputCode" => $_POST["addInputCode"],
                           //"userId" => $_SESSION["userId"] 
                           "userId" => 1
                       );


                       
           // Ejecutar el metodo create del modelo
           $response =FacturasModel::create($data);
           
            //ENVIAR MENSAJE DE REGISTRO ALMACENADO CON ÉXITO
           if($response == "Ok")
               {
                 /** Enviar mensaje de creación correcta */
                   echo '<script>
                   
                           Swal.fire({
                             icon: "success",
                             title: "La consulta  ha sido generada de forma correcta.",
                         
                             showConfirmButton: true,
                             confirmButtonText: "Aceptar"
                             }).then(function(result){
                                         if (result.value) {
                                             /**Redireccionar a la página principal de Roles */
                                             window.location.href = "index.php?ruta=Roles/ListarRoles";
                                         }
                                     })
                         </script>';

               }
               else{
                   echo "error controlador";
               }
       }

      }


    }
