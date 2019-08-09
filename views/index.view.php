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
            <h1 class="titulo">Mi galeria</h1>
        </div>
    </header>
    <section class="fotos">
        <div class="contenedor">
            <?php foreach($fotos as $foto): ?>
                <div class="thumb">
                    <a href="foto.php?id=<?php echo $foto['id'];?>"> <!-- Traemos id de nuestra BD. -->
                        <img src="fotos/<?php echo $foto['imagen'];?>" alt="<?php echo $fotos['titulo'];?>"> <!-- Traemos la ruta y la descripcion alternativa de nuestra BD. -->
                    </a>
                </div>

            <?php endforeach; ?>

            <div class="paginacion">
            <?php if($pagina_actual>1): ?>
                <a href="index.php?pagina=<?php echo $pagina_actual-1; ?>" class="izquierda"><i class="fa fa-long-arrow-left"></i> Pagina anterior</a>
            <?php endif ?>

            <?php if($total_paginas != $pagina_actual): ?>
                <a href="index.php?pagina=<?php echo $pagina_actual+1; ?>" class="derecha">Pagina siguiente <i class="fa fa-long-arrow-right"></i></a>
            <?php endif ?>
            </div>
        </div>
    </section>
        <footer>
            <p class="copyright">J.F - Agosto de 2019.</p>
        </footer>
</body>
</html>