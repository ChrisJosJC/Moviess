<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/verify.css">
    <link rel="stylesheet" href="./style/catalogo.css">
    <link rel="stylesheet" href="./style/signup.css">
    <link rel="shortcut icon" href="./public/favicon.svg" type="image/x-icon">
    <script defer src="./script/flipit.js"></script>
    <title>Blune - Inicio de sesion</title>
</head>

<div class="toflip" id="toflip">
    <form class="front face" action="verificar.php" method="post">
        <img loading="lazy" src="./public/dashboard-growth.png" width="75%" alt="">
        <div class="entries">
            <h1>Iniciar sesion</h1>
            <hr>
            <label for="username">Username o (nombre de usuario)</label>
            <input type="text" name="username">
            <label for="password">Contraseña</label>
            <input type="password" name="password" id="password">
            <input id="send" type="submit" value="Iniciar sesion"/>
            <button type="button" id="frontAnchor">¿No tienes una cuenta creada?</button>
        </div>
    </form>
    <form class="back face" action="añadirUsuario.php" method="post">
        <img loading="lazy" src="./public/dashboard-growth.png" width="75%" alt="">
        <div class="entries">
            <h1>Registrarse</h1>
            <hr>
            <label for="name">Username o (nombre de usuario)</label>
            <input type="text" name="name">
            <label for="email">Email o (correo electronico)</label>
            <input type="text" name="username">
            <label for="passwordto">Contraseña</label>
            <input type="password" name="passwordto" id="passwordto">
            <input id="sendto" type="submit" value="Registrarse">
            <button type="button" id="backAnchor">¿Ya tienes una cuenta?</button>
        </div>
    </form>
    </div>
</form>
</body>

</html>