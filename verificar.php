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

$users = $con->query("SELECT * FROM users");
$users = $users->fetch_all(MYSQLI_ASSOC);
foreach ($users as $user => $data) {
    var_dump($data);
    echo "<br>";
    if (($data["name"] || $data["email"]) == $username && $data["password"] == md5($password) && $data["rol"] == 1) {
        // echo "OK";
        session_start();
        $_SESSION["username"] = $data["name"];
        $_SESSION["rol"] = 1;
        header("location:./dashboard.php");
    }  
    if ($data["name"] == $username && $data["password"] == md5($password) && $data["rol"] == 2) {
        // echo "OK";
        session_start();
        $_SESSION["username"] = $username;
        $_SESSION["rol"] = 2;
        header("location:./home.php");
    }  

}

echo "<div class='error-box'>";
echo "<h2 class='error'>Error al iniciar sesion</h2>";
echo "<a id='send' href='./login'>Intentar nuevamente</a>";
echo "</div>";