<?php
session_start();
include 'conexion.php';
$bd = conectar();
$color = mysql_query("select * from Colores", $bd);
$talla = mysql_query("select * from Tallas order by talla", $bd);
$marca = mysql_query("select * from Marcas", $bd);
$categoria = mysql_query("select * from Categorias", $bd);
?>
<html>

    <?php
    $log = $_SESSION["usuario"];
    if ($log == "") {
        ?><div id="login"><a href="login.php"> <img src="images/login.jpg" alt="" id="logi"/></a>

        </div>
    <?php } else {
        ?>

        <?php
    }
    ?>
    <h2>Agregar calzado</h2>
    <form action="agr_zap1.php" method="post">
        <div class="form-group">
            <label id="letra">Nombre</label>
            <input type="text" class="form-control" id="agr_cal" name="agr_cal" placeholder="Nombre del calzado" required="" autofocus="" onkeypress="return validarEspacio(event)" >
        </div>
        <div class="form-group">
            <label id="letra">Color</label>
            <select id="agr_cal_color" name="agr_cal_color" required="" class="form-control" placeholder="Color del calzado">
                <option value="">Seleccione un color</option>
                <?php
                while ($colores = mysql_fetch_array($color)) {
                    echo '<option value = "' . $colores['idcolor'] . '">' . $colores['color'] . '</option>';
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label id="letra">Talla</label>
            <select id="agr_cal_talla" name="agr_cal_talla" required="" class="form-control" placeholder="Talla del calzado">
                <option value="">Seleccione una talla</option>
                <?php
                while ($tallas = mysql_fetch_array($talla)) {
                    echo '<option value = "' . $tallas['idtalla'] . '">' . $tallas['talla'] . '</option>';
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label id="letra">Marca</label>
            <select id="agr_cal_marca" name="agr_cal_marca" required="" class="form-control" placeholder="Marca del calzado">
                <option value="">Seleccione una marca</option>
                <?php
                while ($marcas = mysql_fetch_array($marca)) {
                    echo '<option value = "' . $marcas['idmarca'] . '">' . $marcas['marca'] . '</option>';
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label id="letra">Categoría</label>
            <select id="agr_cal_categoria" name="agr_cal_categoria" required="" class="form-control" placeholder="Marca del calzado">
                <option value="">Seleccione una marca</option>
                <?php
                while ($categorias = mysql_fetch_array($categoria)) {
                    echo '<option value = "' . $categorias['idcategoria'] . '">' . $categorias['categoria'] . '</option>';
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label id="letra">Valor</label>
            <input type="text" class="form-control"   id="agr_cal_valor" name="agr_cal_valor" placeholder="Valor del calzado" required="" autofocus="" onkeypress="return validarEspacio(event)" >
        </div>
        <div id="esp_agr_zap_valor"></div>
        <div class="form-group">
            <label id="letra">Genero</label>
            <select id="agr_cal_genero" name="agr_cal_genero" required="" class="form-control" placeholder="Genero">
                <option value="">Seleccione genero</option>
                <option value="F">Femenino</option>
                <option value="M">Masculino</option>
            </select>
        </div><br>
        <div id="esp_agr_zap"></div>
        <center><button type='button' id="btn_agr_zap" class='btn btn-default'>Agregar</button>    <button type='button' class='btn btn-default' onclick="return admcalzado(event)">Volver</button></center>
    </form>
    <?php
    ?>







    <script type="text/javascript" src="js/operaciones.js"></script>
</html>


