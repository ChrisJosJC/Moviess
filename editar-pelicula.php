<?php
include('./config/connection.php');
$ID = $_GET["id"];
$movie = $con->query("SELECT pelicula.`ID`,
pelicula.`nombre`,
pelicula.`sinopsis`,
pelicula.`duracion`,
pelicula.`ano`,
pelicula.`imagen`,
pelicula.productora as 'id_productora',
pelicula.genero as 'id_genero',
pelicula.director as 'id_director',
productora.nombre as 'productora',
director.nombre as 'director',
genero.nombre_genero as 'genero' FROM `pelicula`
inner join `productora`
inner join `director`
inner join `genero`
on pelicula.productora = productora.ID_productora 
AND pelicula.genero = genero.ID_genero
AND pelicula.director = director.ID_director where pelicula.ID ='$ID'");
$movie = $movie->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/catalogo.css">
    <link rel="stylesheet" href="./style/style.css">
    <link rel="shortcut icon" href="./public/favicon.svg" type="image/x-icon">
    <title>Blune - Save you movies</title>
</head>

<body>
    <?php include("./includes/header.php");
    if (!isset($_SESSION["username"])&&$_SESSION["rol"]!==1) {
        header("location:index.php");
    }  ?>
    <div class="upload">
        <h1>Editar pelicula de <i style="color: #222"><?php echo $movie['nombre'] ?></i></h1>
        <form action="./crud/update.php" method="post" id="form" enctype="multipart/form-data">
            <input type="number" name="ID" hidden value="<?php echo $movie['ID'] ?>">
            <label for="title">Titulo / Nombre
                <input value="<?php echo $movie['nombre'] ?>" placeholder="Titulo de la pelicula" type="text" id="title" name="title"></label>
                <label for="description">Sinopsis
                <textarea placeholder="Sinopsis de la pelicula" type="text" id="description" name="description"><?php echo $movie['sinopsis'] ?></textarea>
            </label>
            <label for="genero">Genero</label>
            <select name="genero" id="genero">
                <?php
                foreach ($dataGene as $key => $genero) {
                    if ($movie['id_genero'] == $genero['0']) {
                        $id = $movie['id_genero'];
                        $nombre = $movie["genero"];
                        echo "<option value='$id' selected>$nombre</option>";
                    } else {
                        $id = $genero['0'];
                        $nombre = $genero['1'];
                        echo "<option value='$id'>$nombre</option>";
                    }
                }
                ?>
            </select>
            <label for="duracion">Duracion<input value="01:00:10" value="<?php echo $movie['duracion'] ?>" type="time" id="duracion" name="duracion"></label>
            <label for="director">Director</label>
            <select name="director" id="director">
                <?php
                foreach ($dataDire as $key => $director) {
                    if ($movie['id_director'] == $director['0']) {
                        $id = $movie['id_director'];
                        $nombre = $movie["director"];
                        echo "<option value='$id' selected>$nombre</option>";
                    } else {
                        $id = $director['0'];
                        $nombre = $director['1'];
                        echo "<option value='$id'>$nombre</option>";
                    }
                }
                ?>
            </select>
            <label for="productora">Productora</label>
            <select name="productora" id="productora">
                <?php
                foreach ($dataProd as $key => $productora) {
                    if ($movie['id_productora'] == $productora['0']) {
                        $id = $movie['id_productora'];
                        $nombre = $movie["productora"];
                        echo "<option value='$id' selected>$nombre</option>";
                    } else {
                        $id = $productora['0'];
                        $nombre = $productora['1'];
                        echo "<option value='$id'>$nombre</option>";
                    }
                }
                ?>
            </select>
            <label for="ano">Año<input placeholder="ano de publicacion" value="<?php echo $movie['ano'] ?>" type="number" id="ano" name="ano"></label>
            <label for="image" id="uploadImage" style="--bg-image: url('./<?php echo $movie['imagen'] ?>');">Subir imagen</label>
            <input type="file" name="image" id="image" hidden>
            <input type="submit" value="Guardar">
        </form>
    </div>
</body>

</html>