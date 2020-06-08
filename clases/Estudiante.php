<?php
namespace Clases;
use Clases\ConexionDB as db;
use PDOException;

require_once "config/autoload.php";

class Estudiante extends Usuario
{
    private $codigo;

    public function __construct($codigo, $nombres, $apellidos, $telefono, $correo, $id_pa)
    {
        parent::__construct($nombres, $apellidos, $telefono, $correo, $id_pa);
        $this->codigo = $codigo;
    }
 
    public function getCodigo()
    {
        return $this->codigo;
    }

    public function setCodigo($codigo): void
    {
        $this->codigo = $codigo;
    }

    public function crearEstudiante() : bool {
        try {
            $db = new db();
            $conn = $db->abrirConexion();

            $sql = "INSERT INTO estudiantes(codigo, nombres, apellidos, telefono, correo, id_pa) 
                    VALUES('$this->codigo','$this->nombres', '$this->apellidos', '$this->telefono', '$this->correo', $this->id_pa)";
            $respuesta = $conn->prepare($sql);
            $respuesta->execute();
            $numRows = $respuesta->rowCount();
            if($numRows!=0){
                $result = true;
            }else{
                $result = false;
            }

            $db->cerrarConexion();

            return $result;
        }
        catch (PDOException $e){
            echo $e->getMessage();
        }
    }
    public function ActualizarEstudiante($id){
        try{
            $db= new db();
            $conn =$db->abrirConexion();
           
            $sql= "UPDATE estudiantes SET codigo=?, nombres=?, apellidos=?,telefono=?,correo=?,id_pa=? WHERE id=?";
            $respuesta = $conn->prepare($sql);
            $respuesta->execute([$this->codigo,$this->nombres, $this->apellidos, $this->telefono, $this->correo, $this->id_pa,$id]);
            $numRows = $respuesta->rowCount();

            if($numRows!=0){
                $result = true;
            }else{
                $result = false;
            }

            $db->cerrarConexion();

            return $result;

        }
        catch(PDOException $e){
            echo $e->getMessage();
        }

    }

    public function EliminarEstudiante($ide){

        try{

            $db = new db();
            $conn = $db->abrirConexion();
            $sql = " DELETE FROM estudiantes WHERE id = ?";
            $respuesta = $conn->prepare($sql);
            $respuesta->execute([$ide]);
           // var_dump($sql);
         
            $numRows = $respuesta->rowCount();
            if($numRows!=0){
                $result = true;
            }else{
                $result = false;
            }

            $db->cerrarConexion();

            return $result;

        }
        catch (PDOException $e){
            echo $e->getMessage();
        }
    }
    public function MostrarEstudiante(){
        try{
            $db = new db();
            $conn = $db->abrirConexion();

            $sql = "SELECT * FROM estudiantes";
            $respuesta = $conn->prepare($sql);
            $respuesta->execute();
            $result = $respuesta->fetchAll();

            $db->cerrarConexion();
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
        }

    }
    public function BuscarEstudiante($ide){
        try{
            $db = new db();
            $conn = $db->abrirConexion();

            $sql = "SELECT * FROM estudiantes where id= :id";
            $respuesta = $conn->prepare($sql);
            $respuesta->bindParam(':id',$ide);
            $respuesta->execute();
            $result = $respuesta->fetch();

            $db->cerrarConexion();
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
        }

    }


    
 }






