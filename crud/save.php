<?php
include("./upload.php");
include("../connection.php");

try {
    $insert = "INSERT INTO `pelicula`(`nombre`, `duracion`, `director`, `productora`, `ano`, `genero`, `imagen`) VALUES ('$title','$duracion','$director','$productora','$ano','$genero','$target_file')";
    $con->query($insert);
    include("../includes/nice.php");
} catch (Exception $e) {
    include("../includes/bad.php");
}
