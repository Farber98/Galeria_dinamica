<?php 
require 'funciones.php';

$conexion = conexion('galeria_practica','root','');

if (!$conexion) //Si la conexion devuelve false, dirigimos al archivo de error.
{
    //header('Location: error.php');
    die();
}

//Mientras se hayan enviado los datos por post y files no este vacia:
//tmp_name es donde se guarda la imagen temporalmente mientras se sube.

if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES)) //Files guarda en un arreglo informacion que tenemos sobre el archivo a subir.
{                                                       
    //Funcion getimagesize nos permite retornar un arreglo con las propiedades de la imagen.
    //En caso de no ser una imagen, devuelve un false. Queremos comprobar que sea una imagen.
    $check = @getimagesize($_FILES['foto']['tmp_name']);    //Agregamos el arroba para no tener error tipo NOTICE.

    if($check !== false)
    {
        $carpeta_destino = 'fotos/';    //Carpeta donde guardaremos las fotos.
        $archivo_subido = $carpeta_destino . $_FILES['foto']['name'];   //Concatenamos el archivo subido con la carpeta destino y el nombre de la foto.
                                                                        //Quedara algo asi como: fotos/1.jpg. Foto es el nombre que le asignamos al array $_FILES.
        //Subimos el archivo mediante metodo move_uploaded_file.
        //Pasamos como parametro el array $_FILES y nuestra variable que indica donde almacenar las fotos subidas.
        move_uploaded_file($_FILES['foto']['tmp_name'],$archivo_subido); 

        //Realizamos nuestra consulta.
        $statement = $conexion->prepare('INSERT INTO fotos (id, titulo,imagen,texto) VALUES (null, :titulo, :imagen, :texto)');

        $statement->execute(array(
            ':titulo'=>$_POST['titulo'],         //El placeholder :titulo toma el valor del titulo que recibe por 'POST'
            ':imagen'=>$_FILES['foto']['name'], //:imagen toma el valor del name del array $_FILES de la foto.
            ':texto'=>$_POST['texto']  //:texto toma el valor de texto recibido por 'POST'
        ));
    
        header('Location: index.php');  //Luego redirigimos al usuario al index.
    }else 
    {
        $error = "Archivo no es una imagen o archivo es muy pesado";
    }

}

require 'views/subir.view.php';
?>