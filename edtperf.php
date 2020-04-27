<?php
session_start();
$usuario = $_SESSION['usuario'];
$contrasena = $_SESSION['contrasena'];
if ($usuario == "" && $contrasena == "") {
    header("Location: index.php");
} else {
    include 'conexion.php';
    $bd = conectar();
    $sql = "Select * from Personal where usuario='$usuario'";
    $res = mysql_query($sql, $bd);
    $row = mysql_fetch_array($res);
    ?> 
    <html>

        <meta charset="UTF-8">



        <h1 >Editar perfil</h1>
        <form method="post" action="edt_usu.php">
            <div class="form-group">
                <label id="letra">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required="" autofocus="" onkeypress="return validarLetras(event), validarEspacio(event)" value="<?php echo $row['nombre'] ?>" >
            </div>
            <div class="form-group">
                <label id="letra">Apellido</label>
                <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido" required="" autofocus="" onkeypress="return validarNumero(event), validarEspacio"value="<?php echo $row['apellido'] ?>" >
            </div>
            <div class="form-group">
                <label id="letra">Correo</label>
                <input type="email" class="form-control" id="correo" name="correo" placeholder="Correo" required="" autofocus="" onkeypress="" value="<?php echo $row['correo'] ?>">
            </div>
            <button type="button" id="edtperf" class="btn btn-default">Actualizar datos</button>
        </form> 
        <div id="erredtper">

        </div>
        <hr class="hr" id="letra">
        <h2 id="letra"> Cambio de contraseña</h2>
        <form action="edtpas_usu.php" method="post">
            <div class="form-group">
                <label id="letra">Contraseña actual</label>
                <input type="password" class="form-control" id="contrasenaact" name="contrasenaact" placeholder="Contraseña actual" required="" onkeypress="return validarEspacio(event)">
            </div>
            <div id="coninc"></div>
            <div class="form-group">
                <label id="letra">Contraseña nueva</label>
                <input type="password" class="form-control" id="contrasenanew" name="contrasenanew" placeholder="Contraseña nueva" required="" onkeypress="return validarEspacio(event)">
            </div>
            <div class="form-group">
                <label id="letra">Confirmar contraseña</label>
                <input type="password" class="form-control" id="contrasenaconf" name="contrasenaconf" placeholder="Vuelva a escribir su nueva contraseña" required="" onkeypress="return validarEspacio(event)">
            </div>
            <div  id="erredtcon"></div>
            <button type="button" id="edtpas_usu" class="btn btn-default">Cambiar</button>
        </form>



    </body>
    </html>
    <script src="js/operaciones.js"></script>
    <?php
}
?>
