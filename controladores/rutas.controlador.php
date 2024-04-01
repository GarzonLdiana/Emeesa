<?php

 class RutasControlador
 {


    public function IniciarPlantilla () 
    {

       include "./Vistas/plantilla/plantilla.vista.php";

    }

    /** Armar la Ruta del Formulario Recibido desde la vista */

    public function Rutas()

    {
        if(isset($_GET["ruta"])){
            $ruta = $_GET["ruta"];    
        }

        else(
            $ruta = "Login/login"
        );
        /**llamar al modelo para armar la ruta */

        $rutaformulario = RutasModelo::RutasModelo($ruta);

        include $rutaformulario;





    }
}
?>
    