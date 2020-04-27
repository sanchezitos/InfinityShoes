<?php
session_start();
?>
<html>
    <head>
        <title>InfinityShoes-Busqueda</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="shortcut icon" type="image/x-icon" href="images/logo.ico" />
        <link rel="stylesheet" type="text/css" href="css/coin-slider.css" />
        <link href="css/style.css" rel="stylesheet" type="text/css" />
        <link href="css/bootstrap.css" rel="stylesheet">
        <meta charset="UTF-8">


    </head>

    <div class="container">
        <div class="logo">
            <a href="index.php"> <img src="images/logo.png" id="logo" alt="logo"/></a>
        </div>
        <a href="index.php"><img src="images/infinity2.0.png" id="infinity20"/></a>
        <hr>
        <?php
        $log = $_SESSION["usuario"];
        if ($log == "") {
            ?><div id="login"><a href="login.php"> <img src="images/login.jpg" alt="" id="logi"/></a>

            </div>
            <?php } else {
            ?>
            <div class="izquierdo" id="izquierdo">
                <h1 id="letra">Bienvenido</h1><h4> <?php echo $_SESSION['nombre']; ?></h4>
                <h4 id="letra"><?php echo $_SESSION['rol']; ?> sucursal:</h4><h4> <?php echo $muestra['almacen']; ?> (<?php echo $muestra['sucursal']; ?>)</h4>
            </div>
            <?php
        }
        ?>
        <body>
            <div id="contenedor">
                <br><br><br><br><br>
                <h2>Busqueda por nombre</h2>
                <?php
                include 'funciones.php';
                 $nombre = $_GET["bcn"];
                 bus_zap_nom($nombre);
                ?>
                <br><button type='button' class='btn btn-default' onClick="location.href = 'index.php'">Volver</button>
            </div>



    </div>
</body>
<script type="text/javascript" src="js/operaciones.js"></script>
</html>


