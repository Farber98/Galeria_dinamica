<?php 
require 'funciones.php';

$fotos_por_pagina = 8;

//Si esta seteado, toma el valor del $_GET y sino por defecto se establece en 1.
$pagina_actual = (isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1);
//Puntero que tomaremos como referencia para movernos por la BD.
$inicio = ($fotos_por_pagina * $pagina_actual) - $fotos_por_pagina;

$conexion = conexion('galeria_practica', 'root', '');

if (!$conexion) 
{
   // header('Location: error.php');
   die();
}

//SQL_CALC_FOUND_ROWS para calcular cuantas fotos hay en la DB.
$statement = $conexion->prepare("
SELECT SQL_CALC_FOUND_ROWS * FROM fotos LIMIT $inicio,$fotos_por_pagina"); //8 fotos desde el puntero.

$statement->execute();  //Ejecutamos la consulta.
$fotos = $statement->fetchAll();    //Guardamos el arreglo obtenido de 8 imagenes en una variable $fotos con fetchall();

if(!$fotos)
{
    //header('Location: error.php');
    header('Location: index.php');
}
//FOUND_ROWS() nos trae todas las filas encontradas y las almacena en una variable como total_filas.
$statement = $conexion->prepare("SELECT FOUND_ROWS() as total_filas");
$statement->execute();
$total_post = $statement->fetch()['total_filas'];   //Almacenamos el valor de total_filas en una variable 

$total_paginas = ceil($total_post / $fotos_por_pagina); //ceil redondea para arriba. 

require 'views/index.view.php';
?>