<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/catalogo.css">
    <link rel="stylesheet" href="./style/style.css">
    <title>Save you movies</title>
</head>

<body>
<?php include("./includes/header.php") ?>
<?php include("./connection.php") ?>
    <div class="upload">
    <h1>Peliculas</h1>
    <form action="./crud/save.php" method="post" id="form" enctype="multipart/form-data">
        <label for="title">Titulo / Nombre
            <input placeholder="Titulo de la pelicula" type="text" id="title" name="title"></label>
        <label for="genero">Genero</label>
        <select name="genero" id="genero">
            <?php 
            foreach ($dataGene as $key => $genero) {
                $id = $genero['0'];
                $nombre = $genero['1'];
                echo "<option value='$id'>$nombre</option>";
            }
            ?>
        </select>
        <label for="duracion">Duracion<input value="01:00:10"  type="time" id="duracion" name="duracion"></label>
        <label for="director">Director</label>
        <select name="director" id="director">
        <?php 
            foreach ($dataDire as $key => $director) {
                $id = $director['0'];
                $nombre = $director['1'];
                echo "<option value='$id'>$nombre</option>";
            }
            ?>
        </select>
        <label for="productora">Productora</label>
        <select name="productora" id="productora">
        <?php 
            foreach ($dataProd as $key => $productora) {
                $id = $productora['0'];
                $nombre = $productora['1'];
                echo "<option value='$id'>$nombre</option>";
            }
            ?>
        </select>
        <label for="ano">Año<input placeholder="ano de publicacion" value="2022" type="number" id="ano" name="ano"></label>
        <label for="image" id="uploadImage">Subir imagen</label>
        <input type="file" name="image" id="image" hidden>
        <input type="submit" value="Guardar">
    </form>
    </div>
</body>

</html>