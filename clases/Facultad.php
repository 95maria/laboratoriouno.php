<?php
namespace Clases;
use Clases\ConexionDB as db;
use PDOException;

require_once "config/autoload.php";
class Facultad
{
    private $nombre;

    public function __construct($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }
    public function crearFacultad(){
        try{
        $db = new db();
            $conn = $db->abrirConexion();

            $sql = "INSERT INTO facultad(nombre) 
                    VALUES('$this->nombre')";
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
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    public function verFacultad() {
        try {
            $db = new db();
            $conn = $db->abrirConexion();
            $sql = "SELECT * FROM facultad";
            $respuesta = $conn->prepare($sql);
            
            $respuesta->execute();
            $result = $respuesta->fetchAll();
           // var_dump($result);
            $db->cerrarConexion();
            return $result;
        }
        catch (PDOException $e){
            echo $e->getMessage();
        }
    }
}