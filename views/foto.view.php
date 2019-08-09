<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Slabo+27px&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Galeria</title>
</head>
<body>
    <header>
        <div class="contenedor">
            <h1 class="titulo">Foto:<?php if(!empty($foto['titulo'])) //Si tiene titulo lo mostramos.
                echo $foto['titulo'];
                else 
                {
                    echo $foto['imagen'];   //Sino mostramos el nombre del archivo.
                }
            ?></h1>
        </div>
    </header>

    <div class="contenedor">

        <div class="foto">
            <img src="fotos/<?php echo $foto['imagen']; //Traemos la foto correspondiente segun su ruta.?>" alt="">
            <p class="<?php echo $foto['texto']; //Traemos el texto?>"></p>
            <a href="index.php" class="regresar"><i class="fa fa-long-arrow-left"></i> Regresar</a>
        </div>

    </div>

    <footer>
        <p class="copyright">J.F - Agosto de 2019.</p>
    </footer>
</body>
</html>