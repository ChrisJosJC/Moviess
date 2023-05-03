<?php
extract($_POST);
include("upload.php");

try {
    $insert = "UPDATE `pelicula` set `Nombre`='$title',`sinopsis`='$sinopsis', `Duracion`='$duracion', `Director`='$director', `Productora`='$productora', `Ano`='$ano', `Genero`='$genero', `Imagen`='$target_file' where ID = $ID";
    $con->query($insert);
    include("../includes/nice.php");
} catch (Exception $e) {
    echo $e;
}
