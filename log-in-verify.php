<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/home.css">
    <title>Moviees...</title>
</head>

<body>

<?php

include_once "./connection.php";

$username = $_POST["username"];
$password = $_POST["password"];

$users = $con->query("SELECT * FROM users");
$users = $users->fetch_all();

foreach ($users as $user => $data) {
    if ($data["username"] == $username && $data["password"] == $password) {
        // echo "OK";
        session_start();
        $_SESSION["username"] = $username;
        $_SESSION["password"] = $password;
        header("location:./home");
    }  

}

echo "<div class='error-box'>";
echo "<h2 class='error'>Error al iniciar sesion</h2>";
echo "<a id='send' href='./login'>Intentar nuevamente</a>";
echo "</div>";