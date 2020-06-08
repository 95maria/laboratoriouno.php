<?php
include_once "config/autoload.php";
$id= $_GET["id"];

include_once "menu.php";
use Clases\Estudiante;
use Clases\Programa;

$estudiante = new Estudiante("","","","","","");
$estudiantes = $estudiante->buscarEstudiante($id);


?>
<h1>Actualizar Estudiantes</h1>
    <form method="post" action="#">
        <input type="text" value="<?php echo $estudiantes['codigo']; ?>" name="codigo" placeholder="Codigo" required/><br>
        <input type="text" value="<?php echo $estudiantes['nombres']; ?>" name="nombres" placeholder="Nombres" required/><br>
        <input type="text" value="<?php echo $estudiantes['apellidos']; ?>" name="apellidos" placeholder="Apellidos" required/><br>
        <input type="text" value="<?php echo $estudiantes['telefono']; ?>" name="telefono" placeholder="Telefono"/><br>
        <input type="email" value="<?php echo $estudiantes['correo']; ?>" name="correo" placeholder="Email"/><br>
        <select name="id_pa">
            <?php
            $programa =  new Programa();
            $programas = $programa->verProgramas();
            foreach ($programas as $programa) {
                if($programa["id"]==$estudiantes['id_pa']){
                    echo "<option selected value='" . $programa["id"] . "'>" . $programa["nombre"] . "</option>";
                }else{
                    echo "<option value='" . $programa["id"] . "'>" . $programa["nombre"] . "</option>";
                }
               
            }
            ?>
        </select><br/>
        
        <input type="submit" name="submit" value="Guardar">

    </form>
    <?php
if (isset($_POST["submit"])) {
    $codigo = $_POST["codigo"];
    $nombres = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];
    $id_pa = $_POST["id_pa"];

    $estudiante = new Estudiante($codigo, $nombres, $apellidos, $telefono, $correo, $id_pa);
    if ($estudiante->ActualizarEstudiante($id)) {
        echo 'Datos guardados<br><a href="index.php">Volver</a>';
    } else {
        echo "Error: Los datos no se guardaron";
    }

}