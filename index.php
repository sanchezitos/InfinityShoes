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
        <div id="login">
            <a href="login.php"> <img src="images/login.jpg" alt="" id="logi"/></a>
        </div>
        <body>
            <div id="contenedor">
                <div id="findex"> 
                    <img src="images/fondo.jpg" id="font" alt=""/>
                </div>
                <div id="buscar">
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
                    <div id="espb"></div>
                </div>
            </div>
    </div>
</body>
<script src="js/jquery-3.1.0.min.js"></script>
<script src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/coin-slider.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/operaciones.js"></script>
</html>
    <?php
}
?>