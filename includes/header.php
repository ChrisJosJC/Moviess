

<body>
    <nav>
        <h1>Peliculas recientes</h1>
        <img src="./public/rocket.png" width="60%"alt="Cohete">
        <div class="btns">
            <a class="button" href="./edit.php"><img loading="lazy" src="./public/add.svg" alt="" height="30px" width="30px">Añadir nueva pelicula</a>
            <a class="button " href="./index.php"><img loading="lazy" src="./public/home.svg" width="30px" height="30px" alt="">Ir a la pagina de inicio</a>
            <?php 
            session_start();
            if (isset($_SESSION["username"])) {
                echo '<a class="button " href="./logout.php"><img loading="lazy" src="./public/profile.svg" width="25px" height="25px" alt="">Cerrar sesion</a>';
            } else {
                echo '<a class="button " href="./login.php"><img loading="lazy" src="./public/profile.svg" style="padding-left:5px" width="25px" height="25px" alt="">Iniciar sesion</a>';
            }
            ?>
        </div>
    </nav>
    