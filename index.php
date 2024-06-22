<?php


/** INCLUIR LOS ARCHIVOS DE CONTROLADORES REQUERIDOS */

require_once "controladores/rutas.controlador.php";


/** INCLUIR LOS ARCHIVOS DE MODELOS REQUERIDOS */

require_once "Modelos/rutas.modelo.php";

/** INICIALIZAR CLASES */

$rutas = New RutasControlador();

/** EJECUTAR LA FUNCION INICIALIZAR PLANTILLA */

$rutas -> IniciarPlantilla();




