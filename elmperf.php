<?php
session_start();
?>
<html>
    <!--    <link href="css/style.css" rel="stylesheet" type="text/css" />-->
    <h2>Eliminar cuenta</h2>
    <div class="letra"><b><i>Atención!!</i></b> Si elimina su cuenta, no podrá recuperarla después.</div>
    <br>
    <div id="elm" >
        <div class="panel panel-default">
            <div class="panel-body">         
                <?php
                include 'funciones.php';
                bus_per();
                ?>
                <br><button type='button' class='btn btn-default' onClick="location.href = 'index.php'">Volver</button>

            </div>
        </div>
    </div>
</html>
