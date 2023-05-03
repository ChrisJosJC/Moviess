<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/home.css">
    <link rel="shortcut icon" href="./public/favicon.svg" type="image/x-icon">
    <title>Blune - Iniciar sesion</title>
</head>

<body>

    <?php

    include_once "./config/connection.php";

    extract($_POST);


    try {
        $users = $con->query("INSERT INTO `users`(`name`, `email`, `password`, `rol`) VALUES ('$name', '$email', '$passwordto', 2)");
        header("location:home.php");
    } catch (Exception $e) {
        echo "<div class='error-box'>";
        echo "<h2 class='error'>Error al iniciar sesion</h2>";
        echo "<a id='send' href='./login'>Intentar nuevamente</a>";
        echo "</div>";
        echo "<div class='error-box'>";
        echo "<h2 class='error'>Error al iniciar sesion</h2>";
        echo "<a id='send' href='./login'>Intentar nuevamente</a>";
        echo "</div>";
    }
