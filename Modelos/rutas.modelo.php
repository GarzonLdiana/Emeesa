<?php

class RutasModelo 
{
    /** Función que arma las rutas del Menú */
    static public function RutasModelo($ruta)
    {
        if (
            $ruta == "Consumos/Historial/historial" ||
            $ruta == "Consumos/Verificacion/verificacion" ||
            $ruta == "Financiaciones/financiaciones" ||
            $ruta == "Tarifas/tarifas" ||
            $ruta == "PQRS/Consulta/Consulta" ||
            $ruta == "PQRS/Ingreso/Ingreso" ||
            $ruta == "PQRS/pqrs" ||
            $ruta == "Dashboard/dashboard" ||
            $ruta == "Roles/ListarRoles" ||
            $ruta == "Roles/roles" ||
            $ruta == "Facturas/Verfacturas"
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


