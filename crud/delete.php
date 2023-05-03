<?php
include("../config/connection.php");

try {
    $ID = $_GET["id"];
    $query = "DELETE FROM `pelicula` WHERE ID = $ID";
    $con->query($query);
} catch (Exception $e) {
}
