<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/verify.css">
    <link rel="stylesheet" href="./style/catalogo.css">
    <link rel="shortcut icon" href="./public/favicon.svg" type="image/x-icon">
    <script src="./script/filter.js" defer></script>
    <title>Blune - Catalogo de Peliculas</title>
</head>
<?php 
include("./includes/header.php");   
if (isset($_SESSION["rol"]) && $_SESSION["rol"]==1) {
    header("location:dashboard.php");
} 
if (isset($_SESSION["rol"]) && $_SESSION["rol"]!==2 ) {
    header("location:index.php");
}   
$search = (isset($_GET["search"])) ? $_GET["search"] : "" ;
?>
    <section class="peliculas">
        <input value="" type="text" class="search-bar" placeholder="Buscar pelicula">
        <div class="peliculas-cards">
        <?php
        include("./config/connection.php");
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
        ?>
                <article class=" article">
                    <img loading="lazy" src="<?php echo $imagen ?>" alt="Banner de $nombre">
                    <div class="data">
                    <h2><?php echo $nombre ?></h2>
                    <h3>Director/a: <?php echo $director ?></h3>
                    <h3>Productor/a: <?php echo $productora; ?></h3>
                    <h3>Duracion: <?php echo $duracion; ?></h3>
                    </div>
                    <a href="./pelicula.php?id=<?php echo $ID ?>" class="button bad">Ver más</a>
                </article>
        <?php
            }
        } else {
            echo "No hay peliculas almacenadas";
        }
        ?>
        </div>
    </section>
</body>

</html>
