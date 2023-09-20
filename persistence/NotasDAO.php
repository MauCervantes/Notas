<?php
class NotasDAO{
    private $host = "localhost";
    private $usr = "mau";
    private $pass = "19240369";
    private $db = "notas";

    private function conectar(){
        try{
            $conn = new PDO("mysql:host=$this->host;dbname=$this->db", $this->usr, $this->pass);
        }catch(PDOException $e){
            die('Connection Failed: error ' . $e->getMessage());
        }
        return $conn;
    }

    //Metodo que ejecuta las consultas, retorna la consulta
    public function consulta($csql){
        $conexion = $this->conectar();
        $records = $conexion->prepare($csql);
        $records->execute();
        
        return $records;
    }

    //método para insertar nueva cita en la base de datos
    public function registrarNota($idUsuario, $Descripcion, $anio, $mes, $dia){
        $csql = "INSERT INTO notas (id_notas, id_usuario, descripcion, fecha, estatus) VALUES (null, $idUsuario, '$Descripcion', STR_TO_DATE('$anio-$mes-$dia', '%Y-%m-%d'), 'pendiente') ";
        $resul = $this->consulta($csql);

        if(!$resul){
            return null;
        }else{
            return $resul;
        }
    }

    //actualice a aceptar o negar cita
    public function anNota($idNota, $an){
        if($an == "Aceptar"){
            $csql = "UPDATE notas SET estatus = 'Terminada' WHERE id_notas = $idNota";
        }else{
            $csql = "UPDATE notas SET estatus = 'Cancelada' WHERE id_notas = $idNota";
        }

        $resul = $this->consulta($csql);
        if(!$resul){
            return null;
        }else{
            return $resul;
        }
    }
}
?>