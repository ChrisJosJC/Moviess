

<body>
    <nav>
        <?php 
            session_start();
            if (isset($_SESSION["rol"]) && $_SESSION["rol"] == 1 ) {
                ?>
                <h1>Bienvenido <?php echo $_SESSION["username"]. ".<br> Cuenta de administrador"; ?></h1>
                <img src="./public/rocket.png" width="60%"alt="Cohete">
                <div class="btns">
                <a class="button " href="./dashboard.php"><img loading="lazy" src="./public/home.svg" width="30px" height="30px" alt="">Ir a la pagina de inicio</a>
                <a class="button" href="./edit.php"><img loading="lazy" src="./public/add.svg" alt="" height="30px" width="30px">Añadir nueva pelicula</a>
                <a class="button" href="./logout.php"><img loading="lazy" src="./public/profile.svg" width="25px" height="25px" alt="">Cerrar sesion</a>    
                <?php
            } else {
                ?>
                <h1>Bienvenido <?php echo $_SESSION["username"]. ".<br> Usuario normal"; ?></h1>
                <img src="./public/rocket.png" width="60%"alt="Cohete">
                <div class="btns">
                <a class="button " href="./home.php"><img loading="lazy" src="./public/home.svg" width="30px" height="30px" alt="">Ir a la pagina de inicio</a>
                <a class="button" href="./logout.php"><img loading="lazy" src="./public/profile.svg" width="25px" height="25px" alt="">Cerrar sesion</a>    
                <?php
            }
            ?>
        </div>
    </nav>
    