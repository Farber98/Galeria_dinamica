<?php 
require 'funciones.php';

$conexion = conexion('galeria_practica','root','');

if(!$conexion)
{
    //header('Location: error.php');
    die();
}

$id = isset($_GET['id']) ? (int)$_GET['id'] : false;   //Si el valor esta seteado, casteamos a entero. Sino false.

if(!$id)
{
    header('Location: index.php');  //En caso de escribir cualquier cosa, se lo manda al index.
}

$statement = $conexion->prepare('SELECT * FROM fotos WHERE id = :id');
$statement->execute(array(':id'=>$id));

$foto = $statement->fetch();

if(!$foto)  //Si la foto de dicho id no existe en la BD.
{
    header('Location: index.php');
}

require 'views/foto.view.php';
?>