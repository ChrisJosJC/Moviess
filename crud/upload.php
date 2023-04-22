<?php
error_reporting(3);

# Save file on the server
try {
    $title = $_POST["title"];
    $genero = $_POST["genero"];
    $duracion = $_POST["duracion"];
    $director = $_POST["director"];
    $productora = $_POST["productora"];
    $ano = $_POST["ano"];
    $image = $_FILES["image"];
    $allows = array("jpg", "png", "webp", "jpeg");
    $ext = strtolower(end(explode(".", $image["name"])));
    $rand_name = explode(".", $image["tmp_name"])[0];
    $target_file = "./uploads/" . basename($rand_name . "." . $ext);

    if (in_array($ext, $allows)) {
        move_uploaded_file($image["tmp_name"], ".".$target_file);
    }
    else{
        die("Tu archivo no es una imagen permitida!");
    }
} catch (\Throwable $th) {
    error_log("\n$th", 3, "error.log");
    echo $th;
}
error_clear_last();


