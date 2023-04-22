<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/verify.css">
    <link rel="stylesheet" href="./style/catalogo.css">
    <title>Catalogo</title>
</head>
<?php
include("./connection.php");
include("./includes/header.php");
if ($dataPeli->num_rows > 0) {
    while ($row = $dataPeli->fetch_assoc()) {
        $ID = $row["ID"];
        $nombre = $row["nombre"];
        $duracion = $row["duracion"];
        $director = $row["director"];
        $productora = $row["productora"];
        $ano = $row["ano"];
        $genero = $row["genero"];
        $imagen = $row["imagen"];

        if ($ID == $_GET["id"]) {
?>
            <article class="article">
                <img loading="lazy" src="./<?php echo $imagen ?>" alt="Banner de $nombre">
                <div>
                    <hr>
                    <h2><?php echo $nombre . " - " . $ano ?></h2>
                    <div class="data">
                        <h3>Director: <?php echo $director ?></h3>
                        <h3>Productor: <?php echo $productora ?></h3>
                        <h3>Duracion: <?php echo $duracion ?></h3>
                        <h3>Genero: <?php echo $genero ?></h3>
                    </div>
                    <a href="./Rick Rolled.mp4" class="button bad">Ver</a>
                </div>
            </article>
<?php
        }
    }
} else {
    echo "Esta pelicula no existe chico!";
}
?>
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