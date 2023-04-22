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
<?php include("./includes/header.php") ?>
    <section class="peliculas">
        <?php
        include("./connection.php");
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
        ?>
                <article class=" article">
                    <img loading="lazy" src="<?php echo $imagen ?>" alt="Banner de $nombre">
                    <div class="data">
                    <h2><?php echo $nombre ?></h2>
                    <h3><?php echo $director ?></h3>
                    <h3><?php echo $productora ?></h3>
                    <h3>Duracion: <?php echo $duracion ?></h3>
                    </div>
                    <a href="./pelicula.php?id=<?php echo $ID ?>" class="button bad">Ver más</a>
                </article>
        <?php
            }
        } else {
            echo "No hay peliculas almacenadas";
        }
        ?>
    </section>
</body>

</html>

<?php
if (isset($_SESSION["username"])) {
    header("location:./dashboard.php");
} 
?>