<?php
error_reporting(0);
session_start();
$usuario = $_SESSION['usuario'];
$contrasena = $_SESSION['contrasena'];
$rol = $_SESSION['rol'];
$codigo = $_SESSION['codigo'];
$nombre = $_SESSION['nombre'];
include 'conexion.php';
$bd = conectar();
$sql = "Select * from Sucursales inner join Almacenes on Almacenes.idalmacen=Sucursales.idalmacen inner join Personal on Sucursales.idsucursales=Personal.idsucursal where Personal.idpersonal='$codigo'";
$res = mysql_query($sql, $bd) or die("Problemas al ejecutar la consulta...");
$muestra = mysql_fetch_array($res); 

if ($usuario == "" && $contrasena == "") {
    header("Location: index.php");
} else {
    if ($rol == "vendedor") {
        header("Location: vendedor.php");
    } else {
        ?>
        <html>
            <head>
                <title>InfinityShoes - <?php echo $nombre?></title>
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
                <a href="cerrar.php"><img src="images/logout.jpg" id="logout1" alt=""/></a>
                <body> 
                    <br><br><br><br><br>
                    <div>
                        <ul id="menu" class="nav nav-pills">
                            <li role="presentation" id="ind"><a href="index.php">Inicio</a></li>
                            <li role="presentation" Onclick="return almacen(event)"><a href="#/Almacen">Almacenes</a></li>
                            <li role="presentation" onclick="return calzado(event)"><a href="#/Calzado">Calzado</a></li>
                            <li role="presentation" onclick="return personal(event)"><a href="#/Personal">Personal</a></li>
                            <li role="presentation"><a href="#">Registro</a></li>
                            <li role="presentation"><a href="#">Quienes somos</a></li>
                            <li role="presentation" Onclick="return cuenta(event)"><a href="#/Cuenta">Cuenta</a></li>
                            <li role="presentation"><a href="#">Messages</a></li>
                        </ul>
                    </div>

            </div><br><br>
         
                <br>
                <div class="body" id="body1">
                <div class="contenedor" id="contenedor">


                    <div class="izquierdo" id="izquierdo">
                        <h1 id="letra">Bienvenido</h1><h4> <?php echo $_SESSION['nombre']; ?></h4>
                        <h4 id="letra"><?php echo $_SESSION['rol']; ?> sucursal:</h4><h4> <?php echo $muestra['almacen']; ?> (<?php echo $muestra['sucursal']; ?>)</h4>
                    </div>

                    <div id="derecho">
                        <div id="buscar1">
                            <h1>Buscar zapato</h1>
                            <label id="letra">¿Que desea hacer?</label><br>
                            <select id="buscarz" class="form-control">
                                <option value="0">Selecione una</option>
                                <option value="1">Buscar por código</option>
                                <option value="2">Buscar por nombre</option>
                            </select> 
                            <br>
                            <div id="espacio">

                            </div>
                        </div>
                    </div>
                    <div class="opciones" id="opciones">
<!--                        <div class="list-group">
                            <button type="button" class="list-group-item" onclick="return miperf(event)">Mi perfil</button>
                            <button type="button" class="list-group-item" onclick="return edtperf(event)">Editar perfil</button>
                            <button type="button" class="list-group-item" onclick="return eliperf(event)">Eliminar cuenta</button>
                            <button type="button" class="list-group-item">Contactar administrador</button>
                        </div>-->
                    </div>
                    <div  class="derecho" id="derecho">
                    </div>
                    <br>  <br>  <br>  <br>  <br>  <br>  <br>  <br>  <br>  <br>  <br>  <br>  <br><br>  <br>  <br>  <br>  <br>  <br>  <br>  <br>  <br>  <br>  <br>  <br>  <br>
                </div>
                </div>
        </body>
        <script src="js/jquery-3.1.0.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/cod.js"></script>
        <script src="js/operaciones.js"></script>


        </html>
        <?php
    }
}
?>