<?php
use Clases\Estudiante;
use Clases\Programa;
include_once "menu.php";
include_once "config/autoload.php";

?>
<table border="1">
    <tr>
        <th>&nbsp;</th>
        <th>Nombres</th>
        <th>Apellidos</th>
        <th>Programa</th>
        <th colspan="2">&nbsp;</th>
    </tr>
    <!-- TODO: cargar datos de los estudiantes -->

    <?php

$estudiante = new Estudiante("","","","","","");
$estudiantes = $estudiante->MostrarEstudiante();

/* var_dump($arrDatos);*/
/*Recorremos todos los resultados, ya no hace falta invocar más a fetchAll como si fuera fetch...*/
foreach ($estudiantes as $est) {
     echo '<tr>';
     $programa= new Programa("","");
     $programas = $programa->buscarProgramas($est['id_pa']);
     echo '<td >' . $est['id'] . '</td>';
     echo '<td >' . $est['nombres'] . '</td>';
     echo '<td >' . $est['apellidos'] . '</td>';
     echo '<td >' .$programas['nombre']. '</td>';
 

     echo '<td>
               <a href="actualizar.php?id='.$est['id'].'" id="actualizar">Actualizar   
                             </a>

              </td>';
              echo '<td>
               <a href="eliminar.php?id='.$est['id'].'" id="eliminar">Eliminar   
                             </a>

              </td>';
     echo ' </tr>';

 }
?>

 
</table>
