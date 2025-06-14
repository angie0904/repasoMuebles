<?php
require_once('class.bd.php');
class Inmuebles{
    private $db;
    public function __construct(){
        $this->db=new db();
    }

    public function getInmuebles(){
        $conn=$this->db->conn;
        $sent="SELECT * FROM inmuebles";
        $cons=$conn->prepare($sent);
        $cons->bind_result($id_inmuebles,$imagen,$dirección,$precio,$id_cliente);
        $cons->execute();
        $result=array();
        while($cons->fetch()){
            $inmuebles[$id_inmuebles] = array('img'=>$imagen,'dir'=>$dirección,'precio'=>$precio,'cli'=>$id_cliente);
        }
        $cons->close();
        return $inmuebles;
    }
    public function getinmueble(int $id_inmuebles){
        $conn=$this->db->conn;
        $sent="SELECT  * FROM inmuebles WHERE id_inmuebles=?";
        $cons=$conn->prepare($sent);
        $cons->bind_param('i',$id_inmuebles);
        $cons->bind_result($id_inmuebles,$imagen,$dirección,$precio,$id_cliente);
        $cons->execute();
        $inmuebles=array();
        while($cons->fetch()){
            $inmuebles= array($id_inmuebles,$imagen,$dirección,$precio,$id_cliente);
        }
        $cons->close();
        return $inmuebles;
    }

    public function borrarInmueble(int $id_inmuebles){
        $conn=$this->db->conn;
        $sent="DELETE FROM inmuebles WHERE id_inmuebles=?";
        $cons=$conn->prepare($sent);
        $cons->bind_param("i",$id_inmuebles);
        $cons->execute();
        $res=false;
        if($cons->affected_rows==1) $res=true;
        $cons->close();
        return $res;
    }
    public function modificarInmueble(int $id_inmuebles,String $imagen,String $dirección, int $precio,int $id_cliente){
        $conn=$this->db->conn;
        $sent="UPDATE inmuebles SET imagen=?,dirrección=?,precio=?,id_cliente=? WHERE id_inmuebles=?";
        $cons=$conn->prepare($sent);
        $cons->bind_param("ssii",$imagen,$dirección,$precio,$id_cliente);
        $cons->execute();
        $res=false;
        if($cons->affected_rows==1) $res=true;
        $cons->close();
        return $res;
    }
    public function insertarInmueble(String $imagen,String $dirección, int $precio){
        $conn=$this->db->conn;
        $sent="INSERT INTO inmuebles (imagen,dirección,precio) VALUES (?,?,?)";
        $cons=$conn->prepare($sent);
        $cons->bind_param("ssi",$imagen,$dirección,$precio);
        $cons->execute();
        $res=false;
        if($cons->affected_rows==1) $res=true;
        $cons->close();
        return $res;
    }
    public function buscarInmueble(String $busqueda){
        $conn=$this->db->conn;
        $sent="SELECT  * FROM inmuebles WHERE dirección=? OR precio=?";
        $cons=$conn->prepare($sent);
        $cons->bind_param('si',$busqueda,$busqueda);
        $cons->bind_result($id_inmuebles,$imagen,$dirección,$precio,$id_cliente);
        $cons->execute();
        $inmuebles=array();
        while($cons->fetch()){
            $inmuebles[$id_inmuebles] = array('img'=>$imagen,'dir'=>$dirección,'precio'=>$precio,'cli'=>$id_cliente);
        }

       
        $cons->close();
        return $inmuebles;
    }
}

?>