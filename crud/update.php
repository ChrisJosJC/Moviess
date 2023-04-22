<?php
include("upload.php");
include("../connection.php");

try {
    extract($_POST);
    $insert = "UPDATE `pelicula` set `Nombre`='$title', `Duracion`='$duracion', `Director`='$director', `Productora`='$productora', `Ano`='$ano', `Genero`='$genero', `Imagen`='$target_file' where ID = $ID";
    $con->query($insert);

   
    include("../includes/nice.php");
} catch (Exception $e) {
    echo $e;
}
