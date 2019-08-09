<?php 
//Archivo donde guardamos las funciones reutilizables.
function conexion($tabla,$usuario,$pass){ //Si funciona correctamente, nos devuelve la conexion.   
    try {
        $conexion = new PDO("mysql:host=localhost;dbname=$tabla",$usuario,$pass);
        return $conexion;
    } catch (PDOException $e){   
        return false;   //Sino, devuelve false.
    }
}


?>