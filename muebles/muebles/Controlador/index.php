<?php
function listaClientes(){
    require_once('../Modelo/class.clientes.php');
    $clientes=new Clientes();
    $lista = $clientes->getClientes();
    require_once('../Vista/header.html');
    require_once('../Vista/listarclientes.php');
}

function formCliente(){
    require_once('../Vista/header.html');
    require_once('../Vista/clientes.php');
}

function aniadirCli(){
    require_once('../Modelo/class.clientes.php');
    $clientes= new Clientes();
    $err = $clientes->insertarCliente($_POST['nom'], $_POST['ape'], $_POST['dir'], $_POST['tlf']);
    if(!$err){
        listaClientes();
    }else{
        formCliente();
    }
}

function modFormCli(){
    require_once('../Modelo/class.clientes.php');
    $clientes=new clientes();
    $datos = $clientes->getCliente($_POST['id']);
    require_once('../Vista/clientes.php');
}

function modCli(){
    require_once('../Vista/header.html');
    require_once('../Modelo/class.clientes.php');
    $clientes=new clientes();
    $modi=$clientes->modificarClientes($_POST['id'], $_POST['nom'], $_POST['ape'], $_POST['dir'], $_POST['tlf']);
    modFormCli();
}


function listaInmuebles(){
    require_once('../Modelo/class.inmuebles.php');
    $inmuebles=new inmuebles();
    $inmuebles = $inmuebles->getInmuebles();
    require_once('../Vista/header.html');
    require_once('../Vista/listarinmuebles.php');
}

function formInmueble(){
    require_once('../Vista/header.html');
    require_once('../Vista/inmuebles.php');
}

function aniadirInmu(){
    $url = compRuta($_FILES["foto"]["tmp_name"], $_FILES["foto"]["name"]);
    require_once('../Modelo/class.inmuebles.php');
    $inmuebles= new inmuebles();
    $err = $inmuebles->insertarInmueble($url, $_POST['dir'], $_POST['precio']);
    if(!$err){
        listainmuebles();
    }else{
        formInmueble();
    }
}

function modFormInmu(){
    require_once('../Modelo/class.inmuebles.php');
    $inmuebles=new inmuebles();
    $datos = $inmuebles->getInmuebles($_POST['id_inmuebles']);
    require_once('../Vista/inmuebles.php');
}

function modInmu(){
    require_once('../Vista/header.html');
    require_once('../Modelo/class.inmuebles.php');
    $inmuebles=new inmuebles();
    $modi=$inmuebles->modificarinmueble($_POST['id_inmuebles'], $_POST['dir'], $_POST['precio']);
    modFormInmu();
}

function compRuta(String $origen, String $nomFile){
    if(!file_exists('../img/')){
        mkdir('../img/');
    }

    move_uploaded_file($origen,'../img/'.$nomFile);

    return '../img/'.$nomFile;
}
function borrarInmueble(){
    require_once('../Modelo/class.inmuebles.php');
    $inmuebles=new inmuebles();
    $borrar=$inmuebles->borrarInmueble($_POST['id']);
    listainmuebles();
}
function buscarInmueble(){
    require_once('../Modelo/class.inmuebles.php');
    $inmuebles=new inmuebles();
    $inmuebles=$inmuebles->buscarInmueble($_POST['buscarInmueble']);
    require_once('../Vista/header.html');
    require_once('../Vista/listarinmuebles.php');
}

if(isset($_REQUEST['action'])){
    $action = strtolower($_REQUEST['action']);

    $action();
}else{
    formCliente();
}
?>