<?php
 error_reporting (0);
session_start();

if (($_SESSION['rol']) == 'administrador' ) {
    header("Location:usuario.php");
    
} else  
    if(($_SESSION['rol'])== 'vendedor'){
    header("Location:personal.php");
}else{
    ?>
<html>
    <head>
        <script type="text/javascript">
            function validarLetraNumero(e) {
                tecla = (document.all) ? e.keyCode : e.which;
                if (tecla == 8)
                    return true; //Tecla de retroceso (para poder borrar) 
                // dejar la línea de patron que se necesite y borrar el resto 
                patron = /\w/; // Acepta números y letras 
                //patron = /\D/; // No acepta números 
                // 
                te = String.fromCharCode(tecla);
                return patron.test(te);
            }
        </script> 

        <title>InfinityShoes</title>
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
        <body>
            <div id="contenedor">
                <div id="flog">
                    <img src="images/flog.jpg" id="font" alt=""/>
                </div>
                <div id="logear">
                    <h1>Ingresar</h1>
                    <form action="log1.php" method="post">
                        <label id="letra">Usuario</label><br>
                        <input type='text' class='form-control' placeholder='Nombre de usuario'autofocus="" id="usuario" name="usu" onkeypress="return validarEspacio(event)"><br>
                        <label id="letra">Contraseña</label><br>
                        <input type='password' class='form-control' placeholder='Contraseña'autofocus="" name="pas" id="contrasena" onkeypress="return validarEspacio(event)">
                        <div id="mostra">

                        </div>
                        <br><center><button type='button' id='envia' class='btn btn-default'>Ingresar</button>  <button type='button' class='btn btn-default' onClick="location.href = 'index.php'">Volver</button></center>
                    </form>
                   
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
?>