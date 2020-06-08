<?php
include_once "config/autoload.php";
include_once "menu.php";
$id= $_GET["id"];

use Clases\Estudiante;
use Clases\Programa;
$estudiante = new Estudiante("","","","","","");
if ($estudiante->EliminarEstudiante($id)) {
    echo 'Eliminado<br><a href="index.php">Volver</a>';
} else {
    echo "Error: Los datos no se guardaron";
}