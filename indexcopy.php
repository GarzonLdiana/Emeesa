<?php

/** Incluir los archivos de controladores requeridos */
require_once "controladores/rutas.controladorcopy.php";

/** Incluir los archivos de modelos requeridos */
require_once "Modelos/rutas.modelo.php";

/** Inicializar la clase */
$rutas = new RutasControlador();

/** Ejecutar la función IniciarPlantillaLogin */
$rutas->IniciarPlantillalogin();

?>

