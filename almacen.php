<?php
error_reporting(0);
session_start();
$usuario = $_SESSION['usuario'];
$contrasena = $_SESSION['contrasena'];
$sucursal = $_SESSION['idsucursal'];
$rol = $_SESSION['rol'];
$codigo = $_SESSION['codigo'];
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


            <div class="izquierdo" id="izquierdo">
                <h1 id="letra">Bienvenido</h1><h4> <?php echo $_SESSION['nombre']; ?></h4>
                <h4 id="letra"><?php echo $_SESSION['rol']; ?> sucursal:</h4><h4> <?php echo $muestra['almacen']; ?> (<?php echo $muestra['sucursal']; ?>)</h4>
            </div>
            <?php
            $sql = "Select * from Personal";
            $res = mysql_query($sql, $bd);
            while ($row = mysql_fetch_array($res)) {
                if ($row["usuario"] == "lucho") {
                    echo 'Esta bien' ." ". $row["usuario"];
                    return;
                }
            }
            echo 'mal' . $row["usuario"];
            return;
            ?>
            <div class="opciones" id="opciones">
                <div class="list-group">
                    <button type="button" class="list-group-item" onclick="return miperf(event)">Almacenes</button>
                    <button type="button" class="list-group-item" onclick="return edtperf(event)">Sucursales</button>
                    <button type="button" class="list-group-item" onclick="return eliperf(event)">Telefonos</button>
                </div>
            </div>
            <div  class="derecho" id="derecho">
            </div>
            <br>  <br>  <br>  <br>  <br>  <br>  <br>  <br>  <br>  <br>  <br>  <br>  <br><br>  <br>  <br>  <br>  <br>  <br>  <br>  <br>  <br>  <br>  <br>  <br>  <br>
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
