<?php

function bus_zap($calzado) {
    include 'conexion.php';
    $bd = conectar();
    $consulta = mysql_query("SELECT * FROM Calzado
                                                INNER  JOIN Categorias ON Categorias.idcategoria=Calzado.idcategoria 
                                                INNER  JOIN Marcas ON Marcas.idmarca=Calzado.idmarca
                                                INNER  JOIN Colores ON Colores.idcolor=Calzado.idcolor
                                                INNER  JOIN Tallas ON Tallas.idtalla=Calzado.idtalla 
                                                INNER  JOIN Sucursales ON Sucursales.idsucursales=Calzado.idsucursales
                                                inner join Almacenes ON Sucursales.idalmacen=Almacenes.idalmacen
                                                where idcalzado like '%$calzado%'", $bd) or die("Problemas al ejecutar la consulta...");
    if (mysql_num_rows($consulta) != 0) {
        echo "<table class='datagrid'>
                    <tr>
                        <th id='th1'><center>Código</center></th>
                        <th id='th2'><center>Zapato</center></th> 
                        <th id='th2'><center>Color</center></th>
                        <th id='th2'><center>Talla</center></th>
                        <th id='th2'><center>Marca</center></th>
                        <th id='th2'><center>Categoría</center></th>
                        <th id='th2'><center>Genero</center></th>
                        <th id='th2'><center>Dirección</center></th>
                        <th id='th2'><center>Sucursal</center></th>
                        <th id='th2'><center>Almacen</center></th>
                        <th id='th2'><center>Cantidad</center></th>
                        <th id='th2'><center>Valor</center></th>
                    </tr>";
        while ($muestra = mysql_fetch_array($consulta)) {
            echo"<tr>
                        <td id='td2'><center>" . $muestra["idcalzado"] . " </center></td>
                        <td id='td1'><center>" . $muestra["nombre"] . "</center></td> 
                        <td id='td1'><center>" . $muestra["color"] . "</center></td> 
                        <td id='td1'><center>" . $muestra["talla"] . "</center></td>
                        <td id='td1'><center>" . $muestra["marca"] . "</center></td>
                        <td id='td1'><center>" . $muestra["categoria"] . "</center></td>
                        <td id='td1'><center>" . $muestra["genero"] . "</center></td>
                        <td id='td1'><center>" . $muestra["direccion"] . "</center></td>
                        <td id='td1'><center>" . $muestra["sucursal"] . "</center></td>
                        <td id='td1'><center>" . $muestra["almacen"] . "</center></td>
                        <td id='td1'><center>" . $muestra["cantidad"] . "</center></td>
                        <td id='td1'><center>" . "$ " . number_format($muestra["valor"], $decimals = 0, $dec_point = ",", $thousands_sep = ".") . "</center></td>
                    </tr>";
        }
        echo "</table>";
    } else {
        echo '<div id="derecho"><div class="panel panel-default"><h3 id="letra">Lo sentimos, no hemos encontrado ningún código similar en nuestra base de datos :(</h3></div></div>';
    }
    return;
}

function bus_zap_nom($nombre) {
    include 'conexion.php';
    $bd = conectar();
    $consulta = mysql_query("SELECT * FROM Calzado
                                                INNER  JOIN Categorias ON Categorias.idcategoria=Calzado.idcategoria 
                                                INNER  JOIN Marcas ON Marcas.idmarca=Calzado.idmarca
                                                INNER  JOIN Colores ON Colores.idcolor=Calzado.idcolor
                                                INNER  JOIN Tallas ON Tallas.idtalla=Calzado.idtalla 
                                                INNER  JOIN Sucursales ON Sucursales.idsucursales=Calzado.idsucursales
                                                inner join Almacenes ON Sucursales.idalmacen=Almacenes.idalmacen
                                                where nombre like '%$nombre%'", $bd) or die("Problemas al ejecutar la consulta...");

    if (mysql_num_rows($consulta) != 0) {
        echo "<table class='datagrid'>
                    <tr>
                        <th id='th1'><center>Código</center></th>
                        <th id='th2'><center>Zapato</center></th> 
                        <th id='th2'><center>Color</center></th>
                        <th id='th2'><center>Talla</center></th>
                        <th id='th2'><center>Marca</center></th>
                        <th id='th2'><center>Categoría</center></th>
                        <th id='th2'><center>Genero</center></th>
                        <th id='th2'><center>Dirección</center></th>
                        <th id='th2'><center>Sucursal</center></th>
                        <th id='th2'><center>Almacen</center></th>
                        <th id='th2'><center>Cantidad</center></th>
                        <th id='th2'><center>Valor</center></th>
                    </tr>";
        while ($muestra = mysql_fetch_array($consulta)) {
            echo"<tr>
                        <td id='td2'><center>" . $muestra["idcalzado"] . " </center></td>
                        <td id='td1'><center>" . $muestra["nombre"] . "</center></td> 
                        <td id='td1'><center>" . $muestra["color"] . "</center></td> 
                        <td id='td1'><center>" . $muestra["talla"] . "</center></td>
                        <td id='td1'><center>" . $muestra["marca"] . "</center></td>
                        <td id='td1'><center>" . $muestra["categoria"] . "</center></td>
                        <td id='td1'><center>" . $muestra["genero"] . "</center></td>
                        <td id='td1'><center>" . $muestra["direccion"] . "</center></td>
                        <td id='td1'><center>" . $muestra["sucursal"] . "</center></td>
                        <td id='td1'><center>" . $muestra["almacen"] . "</center></td>
                        <td id='td1'><center>" . $muestra["cantidad"] . "</center></td>
                        <td id='td1'><center>" . "$ " . number_format($muestra["valor"], $decimals = 0, $dec_point = ",", $thousands_sep = ".") . "</center></td>
                    </tr>";
        }
        echo "</table>";
    } else {
        echo '<div id="derecho"><div class="panel panel-default"><h3 id="letra">Lo sentimos, no hemos encontrado ningún nombre similar en nuestra base de datos :(</h3></div></div>';
    }
    return;
}

function bus_per() {
    $sucursal = $_SESSION["sucursal"];
    include 'conexion.php';
    $bd = conectar();
    $sql = "Select * from Sucursales inner join Almacenes on Almacenes.idalmacen=Sucursales.idalmacen inner join Personal on Sucursales.idsucursales=Personal.idsucursal where idsucursal='$sucursal'";
    $res = mysql_query($sql, $bd) or die("Problemas al ejecutar la consulta...");
    if ($res) {
        echo "<table class='datagrid'>
                    <tr>
                        <th id='th1'><center>Nombre</center></th>
                        <th id='th2'><center>Apellido</center></th> 
                        <th id='th2'><center>Cedula</center></th>
                        <th id='th2'><center>Sucursal</center></th>
                    </tr>";
        while ($muestra = mysql_fetch_array($res)) {
            echo"<tr>
                        <td id='td2'><center>" . $muestra["nombre"] . " </center></td>
                        <td id='td1'><center>" . $muestra["apellido"] . "</center></td> 
                        <td id='td1'>" . $muestra["cedula"] . "</td>
                        <td id='td1'><center>" . $muestra["sucursal"] . "</center></td>
                        <td id='td1'>";
            ?>
            <button type='button' class='btn btn-default' onClick="location.href = 'index.php'">Eliminar</button>
            <?php
            echo " </td>";
            echo "</tr>";
        }
        echo "</table>";
        //echo "<br><button type='button' class='btn btn-default' onClick='location.href = 'index.php''>Volver</button>";
    } else {
        echo 'essta mal';
    }
}
?>
