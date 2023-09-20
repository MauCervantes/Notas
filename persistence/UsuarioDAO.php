<?php

class UsuarioDAO{
    private $host = "localhost";
    private $usr = "root";
    private $pass = "19240369";
    private $db = "notas";

    private function conectar(){
        try{
            $conn = new PDO("mysql:host=localhost;dbname=notas", "mau", "19240369");
        }catch(PDOException $e){
            die('Connection Failed: error ' . $e->getMessage());
        }
        return $conn;
    }

    public function consulta($csql){
        $conexion = $this->conectar();
        $records = $conexion->prepare($csql);
        $records->execute();
        
        return $records;
    }

    public function buscar($alias, $contrasena){
        $csql = "select * from usuario where alias = '{$alias}' and contra = '{$contrasena}'";
        $resultado = $this->consulta($csql);
        $row = $resultado->fetch(PDO::FETCH_ASSOC);

        if ($row['id'] == null) {
            return null;
        } else {
            return new Usuario($row['id'], $row['alias'], $row['contra'], $row['nombre']);
        }
    }

    public function registraUsu($usuario, $contra, $nombre){
        // Creamos consulta con los datos
        $csql = "INSERT INTO usuario (id, alias, contra, nombre) VALUES (null, '$usuario', '$contra', '$nombre')";
        $result = $this->consulta($csql);
        return $result;
    }

    //retorna nombres de pacientes registrados
    public function buscarNombre($alias){
        $csql = "select * from usuario where alias = '$alias'";
        $result = $this->consulta($csql);
        
        if (!$result) {
            return null;
        } else {
            $row = $result->fetch(PDO::FETCH_ASSOC);
            return new Usuario($row['id'], $row['alias'], $row['contra'], $row['nombre']);
        }
    }

    public function borrarUsu($alias_eliminar){
        $csql = "DELETE FROM usuario WHERE alias = '$alias_eliminar'";
        $result = $this->consulta($csql);
        
        return $result;
    }
}
