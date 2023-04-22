<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style.css">
    <title>Corify Strreaming</title>
    <script src="./public/home.js"></script>
</head>

<body>

<?php

include_once "connection.php";

$username = $_POST["username"];
$password = md5($_POST["password"]);

$users = $con->query("SELECT * FROM users");
$users = $users->fetch_all();
var_dump($users);

foreach ($users as $user => $data) {
    if ($data["2"] == $username && $data["3"] == $password) {
        // echo "OK";
        session_start();
        $_SESSION["username"] = $username;
        $_SESSION["password"] = $password;
        header("location:./index.php");
    }  

}

echo "<div class='error-box'>";
echo "<h2 class='error'>Error al iniciar sesion</h2>";
echo "<a id='send' href='./login.php'>Intentar nuevamente</a>";
echo "</div>";