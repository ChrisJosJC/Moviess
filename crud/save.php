<?php
include("./upload.php");
include("../config/connection.php");

try {
    $insert = "INSERT INTO `pelicula`(`nombre`, `sinopsis`, `duracion`, `director`, `productora`, `ano`, `genero`, `imagen`) VALUES ('$title', '$sinopsis','$duracion','$director','$productora','$ano','$genero','$target_file')";
    $con->query($insert);
    include("../includes/nice.php");
} catch (Exception $e) {
    echo $e;
    include("../includes/bad.php");
}
