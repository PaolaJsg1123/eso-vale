<?php

class Modelo{
    private $Modelo;
    private $db;
    private $datos;
    public function __construct(){
        $this->Modelo=array();
        $this->db=new PDO('mysql:host=localhost;dbname=fiftyfive',"root","");
    }
    public function insertar($tabla, $data){
        $consulta="insert into ".$tabla." values(null,".$data.")";
        $resultado=$this->db->query($consulta);
        if($resultado){
            return true;
        }else{
            return false;
        }
    }
    public function traerId($tabla, $data){
        $consulta="select id from ".$tabla." where ".$data.";";
        $resul=$this->db->query($consulta);
        $row = $resul->fetch();
        $res = $row[0];
        return $res;
    } 
     public function traerIdSesiones($tabla){
        $consulta="select MAX(id) from ".$tabla.";";
        $resul=$this->db->query($consulta);
        $row = $resul->fetch();
        $res = $row[0];
        return $res;
    } 
    public function traerIdUser($tabla, $data){
        $consulta="select id_usuario from ".$tabla." where id=".$data.";";
        $resul=$this->db->query($consulta);
        $row = $resul->fetch();
        $res = $row[0];
        return $res;
    }

    public function mostrar($tabla,$condicion,$id){
        $consul="select * from ".$tabla." where condicion=".$condicion." and id_usuario=".$id;
        $resul=$this->db->query($consul);
        while($filas=$resul->FETCHALL(PDO::FETCH_ASSOC)){
            $this->datos[]=$filas;
        }
        return $this->datos;
    }

    public function mostrar2($tabla,$condicion){
        $consul="select * from ".$tabla." where ".$condicion;
        $resul=$this->db->query($consul);
        while($filas=$resul->FETCHALL(PDO::FETCH_ASSOC)){
            $this->datos[]=$filas;
        }
        return $this->datos;
    }

    public function login($tabla, $condicion){
        $consul="select * from ".$tabla." where ".$condicion.";";
        $resul=$this->db->query($consul);
        if($resul){
            return $resul->fetchAll(PDO::FETCH_ASSOC);
        }else{
            return false;
        }
    }

    public function actualizar($tabla, $data, $condicion){
        $consulta="update ".$tabla." set ". $data ." where ".$condicion;
        $resultado=$this->db->query($consulta);
        if($resultado){
            return true;
        }else{
            return false;
        }
    }

    public function archivar($tabla, $data,$condicion){
        $consulta="update ".$tabla." set condicion=".$condicion." where ".$data;
        $resultado=$this->db->query($consulta);
        if($resultado){
            return true;
        }else{
            return false;
        }
     }
     
    public function eliminar($tabla, $condicion){
        $eli="delete from ".$tabla." where ".$condicion;
        $res=$this->db->query($eli);
        if($res){
            return true;
        }else{
            return false;
        }
    }  

    // Login /registrar
    public function validar_User_existente($tabla, $condicion,$condicion2){
        $consul="select * from ".$tabla." where ".$condicion." OR ".$condicion2.";";
        $resul=$this->db->query($consul);
        if($resul){
            return $resul->fetchAll(PDO::FETCH_ASSOC);
        }else{
            return false;
        }
    }
    public function validar_User_existente2($tabla, $condicion){
        $consul="select * from ".$tabla." where ".$condicion.";";
        $resul=$this->db->query($consul);
        if($resul){
            return $resul->fetchAll(PDO::FETCH_ASSOC);
        }else{
            return false;
        }
    }
}