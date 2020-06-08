<?php
use Clases\Facultad;
use Clases\Programa;

include_once "config/autoload.php";
include_once "menu.php";
?>
    <h1>Registrar Programa</h1>
    <form method="post" action="#">
        <input type="text" name="nombre" placeholder="Nombre" required/><br>
   <select name="id_fa">
            <?php
           $facultad = new Facultad("");
            $facultades = $facultad->verFacultad();
           foreach ($facultades  as $facultad) {
              echo "<option value='" . $facultad["id"] . "'>" . $facultad["nombre"] . "</option>";
           }
            ?>
        </select><br/>
       <br/>
        <input type="submit" name="submit" value="Guardar">

    </form>

<?php
if (isset($_POST["submit"])) {
 
    $nombre = $_POST["nombre"];
    $id_fa = $_POST["id_fa"];

    $programa = new Programa($nombre,$id_fa);
    if ($programa->crearPrograma()) {
        echo "Datos guardados";
    } else {
        echo "Error: Los datos no se guardaron";
    }

}