<?php
include("../config/connection.php");

$word = (isset($_POST["word"])) ? $_POST["word"] : "" ;

$queryPeli = "SELECT pelicula.`ID`,
pelicula.`nombre`,
pelicula.`sinopsis`,
pelicula.`duracion`,
pelicula.`ano`,
pelicula.`imagen`,
productora.nombre as 'productora',
director.nombre as 'director',
genero.nombre_genero as 'genero' FROM `pelicula`
inner join `productora`
inner join `director`
inner join `genero`
on pelicula.productora = productora.ID_productora 
AND pelicula.genero = genero.ID_genero
AND pelicula.director = director.ID_director WHERE pelicula.nombre like '$word%'";
$dataPeli = $con->query($queryPeli);
$dataPeli = $dataPeli->fetch_all(MYSQLI_ASSOC);
echo json_encode($dataPeli);