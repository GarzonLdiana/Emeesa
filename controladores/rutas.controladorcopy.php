<?php

class RutasControlador
{

    public function IniciarPlantillalogin()
    {
        include "./Vistas/Login/login.vista.php";
    }

    /** Armar la Ruta del Formulario Recibido desde la vista */
    public function Rutas()
    {
        if (isset($_GET["ruta"])) {
            $ruta = $_GET["ruta"];
        } else {
            $ruta = "Login/login";
        }

        /** Llamar al modelo para armar la ruta */
        $rutaformulario = RutasModelo::RutasModelo($ruta);

        include $rutaformulario;
    }
}
?>
