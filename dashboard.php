<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/verify.css">
    <link rel="stylesheet" href="./style/catalogo.css">
    <script defer src="./script/script.js" defer></script>
    <link rel="shortcut icon" href="./public/favicon.svg" type="image/x-icon">
    <script defer src="./script/filter.js" defer></script>
    <title>Blune - Catalogo de Peliculas</title>
</head>
<?php 
include("./config/connection.php");
include("./includes/header.php");
if (!isset($_SESSION["username"])&&$_SESSION["rol"]!==1) {
    header("location:index.php");
} 
?>

<section class="dashboard">
<input value="" type="text" class="search-bar" placeholder="Buscar pelicula">        
<div class="peliculas-cards">
    <?php
    if ($dataPeli->num_rows > 0) {
        while ($row = $dataPeli->fetch_assoc()) {
            $ID = $row["ID"];
            $nombre = $row["nombre"];
            $descripcion = $row["sinopsis"];
            $duracion = $row["duracion"];
            $director = $row["director"];
            $productora = $row["productora"];
            $ano = $row["ano"];
            $genero = $row["genero"];
            $imagen = $row["imagen"];
    ?>
            <article class=" article">
                <img loading="lazy" src="<?php echo $imagen ?>" alt="Banner de $nombre">
                <div class="data">
                    <h2><?php echo $nombre. " - ". $ano ?></h2>
                    <p><?php echo $descripcion ?></p>
                    <h3>Genero: <?php echo $genero; ?></h3>
                    <h3>Director/a: <?php echo $director; ?></h3>
                    <h3>Productor/a: <?php echo $productora; ?></h3>
                    <h3>Duracion: <?php echo $duracion; ?> horas</h3>
                </div>
                <div class="btn-actions">
                    <a href="./pelicula_admin.php?id=<?php echo $ID; ?>" class="button bad">Ver más</a>
                    <a href="./editar-pelicula.php?id=<?php echo $ID; ?>" class=""><img loading="lazy" id="pencil" src="./public/pencil.svg" width="30px"></a>
                    <img class="trash" loading="lazy" src="./public/trash.svg" data-href="./crud/delete.php?id=<?php echo $ID ?>">
                </div>
            </article>
    <?php
        }
    } else {
        echo "No hay peliculas almacenadas";
    }
    ?>
</div>
</section>
<div class="popup">
    <div class="card">
        <h2>¿Estas seguro de que quieres eliminar esta pelicula?</h2>
        <p>No hay forma de recuperarla despues de haberla eliminado.</p>
        <div class="btns-option-delete">
            <button class="btn-option option-delete" id="delete">Si, estoy seguro</button>
            <button class="btn-option cancel">Cancelar</button>
        </div>
    </div>
</div>
</body>

</html>
