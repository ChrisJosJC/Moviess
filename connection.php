<?php

$con = mysqli_connect("localhost", "root", "", "moviess");
# Productora
$queryProd = "SELECT * FROM productora";
$dataProd = $con->query($queryProd);
$dataProd= $dataProd->fetch_all();

$queryDire = "SELECT * FROM director";
$dataDire = $con->query($queryDire);
$dataDire= $dataDire->fetch_all();

$queryGenero = "SELECT * FROM genero";
$dataGene= $con->query($queryGenero);
$dataGene= $dataGene->fetch_all();

$queryPeli = "SELECT pelicula.`ID`,
pelicula.`nombre`,
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
AND pelicula.director = director.ID_director";
$dataPeli = $con->query($queryPeli);
