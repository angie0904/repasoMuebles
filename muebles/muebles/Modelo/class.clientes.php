<?php
require_once('class.bd.php');
class Clientes{
    private $db;
    public function __construct(){
        $this->db=new db();
    }

    public function getClientes(){
        $conn=$this->db->conn;
        $sent="SELECT * FROM clientes";
        $cons=$conn->prepare($sent);
        $cons->bind_result($id_clientes,$nombre,$apellidos,$dirección,$telefono);
        $cons->execute();
        $result=array();
        while($cons->fetch()){
            $clientes[$id_clientes] = array('nom'=>$nombre,'ape'=>$apellidos,'dir'=>$dirección,'tlf'=>$telefono);
        }
        $cons->close();
        return $clientes;
    }
    public function getCliente(int $id_clientes){
        $conn=$this->db->conn;
        $sent="SELECT  * FROM clientes WHERE id_clientes=?";
        $cons=$conn->prepare($sent);
        $cons->bind_param('i',$id_clientes);
        $cons->bind_result($id_clientes,$nombre,$apellidos,$dirección,$telefono);
        $cons->execute();
        $clientes=array();
        while($cons->fetch()){
            $clientes = array($id_clientes,$nombre,$apellidos,$dirección,$telefono);
        }
        $cons->close();
        return $clientes;
    }

    public function borrarCliente(int $id_clientes){
        $conn=$this->db->conn;
        $sent="DELETE FROM clientes WHERE id_clientes=?";
        $cons=$conn->prepare($sent);
        $cons->bind_param("i",$id_clientes);
        $cons->execute();
        $res=false;
        if($cons->affected_rows==1) $res=true;
        $cons->close();
        return $res;
    }
    public function modificarClientes(int $id_clientes,String $nombre,String $apellidos, String $dirección, int $telefono){
        $conn=$this->db->conn;
        $sent="UPDATE clientes SET nombre=?,apellidos=?,dirección=?,telefono1=? WHERE id_clientes=?";
        $cons=$conn->prepare($sent);
        $cons->bind_param("sssii",$nombre,$apellidos,$dirección,$telefono,$id_clientes);
        $cons->execute();
        $res=false;
        if($cons->affected_rows==1) $res=true;
        $cons->close();
        return $res;
    }
    public function insertarCliente(String $nombre,String $apellidos, String $dirección, int $telefono){
        $conn=$this->db->conn;
        $sent="INSERT INTO clientes (nombre,apellidos,dirección,telefono1) VALUES (?,?,?,?)";
        $cons=$conn->prepare($sent);
        $cons->bind_param("sssi",$nombre,$apellidos,$dirección,$telefono);
        $cons->execute();
        $res=false;
        if($cons->affected_rows==1) $res=true;
        $cons->close();
        return $res;
    }
}
?>