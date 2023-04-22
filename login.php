<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/verify.css">
    <link rel="stylesheet" href="./style/catalogo.css">
    <link rel="stylesheet" href="./style/signup.css">
    <title>Login</title>
</head>
<?php include('./includes/header.php') ?>
<form action="./verificar.php" method="post">
    <img loading="lazy" src="./public/rocket.png" width="75%" alt="">
    <div class="entries">
        <h1>Iniciar sesion</h1>
        <hr>
        <label for="username">Username o (nombre de usuario)</label>
        <input type="text" name="username">
        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password">
        <input id="send" type="submit" value="Iniciar sesion">
    </div>
</form>
</body>

</html>