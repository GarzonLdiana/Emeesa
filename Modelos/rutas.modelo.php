<?php

class RutasModelo 
{
    /** Función que arma las rutas del Menú */
    static public function RutasModelo($ruta)
    {
        if (
            $ruta == "Consumos/Historial/historial" ||
            $ruta == "Consumos/Historial/historial.crear" ||
            $ruta == "Consumos/Lecturas/Lecturas" ||
            $ruta == "Consumos/Lecturas/Lecturas.crear" ||
            $ruta == "Financiaciones/financiaciones" ||
            $ruta == "Financiaciones/financiaciones.crear" ||
            $ruta == "Tarifas/tarifas" ||
            $ruta == "Tarifas/tarifas.crear" ||
            $ruta == "PQRS/Consulta/Consulta" ||
            $ruta == "PQRS/Ingresopqrs.crear" ||
            $ruta == "Dashboard/dashboard" ||
            $ruta == "Roles/Roles.crear" ||
            $ruta == "Roles/Roles" ||
            $ruta == "Facturas/Verfacturas" ||
            $ruta == "Facturas/Verfacturas.crear" ||
            $ruta == "Login/login" || // Ruta para la vista de inicio de sesión
            $ruta == "User/user" // Ruta para la vista de gestión de usuarios
        ) 
        {
            $pagina = "./Vistas/" . $ruta . ".vista.php";
        } else if ($ruta == "Contact/contact") {
            $pagina = "./Vistas/Contact/contact.vista.php";
        } else {
            $pagina = "./Vistas/Dashboard/dashboard.vista.php";
        }   
        return $pagina;
    }
}


