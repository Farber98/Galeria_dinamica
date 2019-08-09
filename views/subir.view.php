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
            <h1 class="titulo">Subir foto</h1>
        </div>
    </header>

    <div class="contenedor">

    <!-- Formulario para poder subir una foto -->

    <!-- enctype="multipart/form-data" para poder subir archivos. -->
        <form class="formulario" method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <label for="foto">Selecciona tu foto</label>
            <input type="file" id="foto" name="foto">       <!-- Para poder establecer la foto. -->

            <label for="titulo">Titulo de la foto</label>   <!-- Para poder establecer el titulo. -->
            <input type="text" id="titulo" name="titulo">

            <label for="texto">Descripcion:</label>         <!-- Establecemos la descripcion -->
            <textarea name="texto" id="texto" placeholder="Ingresa una descripcion"></textarea>

            <?php if(isset($error)) : ?>
                <p class="error"><?php echo $error; ?></p>
            <?php endif ?>

            <input type="submit" class="submit" value="Subir foto"> <!-- Boton submit. -->
        </form>

    </div>

    <footer>
        <p class="copyright">J.F - Agosto de 2019.</p>
    </footer>
</body>
</html>