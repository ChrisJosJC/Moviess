<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/verify.css">
    <link rel="stylesheet" href="./style/catalogo.css">
    <link rel="shortcut icon" href="./public/favicon.svg" type="image/x-icon">
    <script defer src="./script/script.js"></script>
    <title>Blune - Pelicula</title>
</head>
<?php
include("./config/connection.php");
include("./includes/header.php");
if (!isset($_SESSION["username"])&&$_SESSION["rol"]!==1) {
    header("location:index.php");
} 
if ($dataPeli->num_rows > 0) {
    while ($row = $dataPeli->fetch_assoc()) {
        $ID = $row["ID"];
        $nombre = $row["nombre"];
        $sinopsis = $row["sinopsis"];
        $duracion = $row["duracion"];
        $director = $row["director"];
        $productora = $row["productora"];
        $ano = $row["ano"];
        $genero = $row["genero"];
        $imagen = $row["imagen"];

        if ($ID == $_GET["id"]) {
?>
            <article class="article">
                <img loading="lazy" src="./<?php echo $imagen ?>" alt="Banner de <?php echo $nombre ?>">
                <div>
                    <hr>
                    <h2><?php echo $nombre . " - " . $ano ?></h2>
                    <div class="data">
                        <p><?php echo $sinopsis ?></p>
                        <h3>Director: <?php echo $director ?></h3>
                        <h3>Productor: <?php echo $productora ?></h3>
                        <h3>Duracion: <?php echo $duracion ?></h3>
                    </div>
                    <a href="./public/Rick Rolled.mp4" class="button bad">Reproducir</a>
                    <div class="btns">
                    <a href="./editar-pelicula.php?id=<?php echo $ID; ?>" class="btn btn-edit">Editar</a>
                    <button class="trash btn" data-href="./crud/delete.php?id=<?php echo $ID ?>">Eliminar</button>
                    </div>
                </div>
            </article>
<?php
        }
    }
} else {
    echo "Esta pelicula no existe chico!";
}
?>
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
<style>
    .article {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(330px, 1fr));
        gap: 30px;
        width: 90%;
        text-align: left;
        margin-inline: 20px;
        padding-inline: 40px;
        align-items: center;
    }

    .bad {
        display: block;
        max-width: 100%;
    }

    .data {
        text-align: right;
        color: #FFFFFFBA;
    }
</style>