<?php
function conectar() {
    $bd = mysql_connect("localhost", "id2773512_root", "Sistemas7");
    if (!$bd) {
        echo "<h3>Atención</h3>";
        echo "<p>Error al conectar!</p>";
        return null;
    }
    if (!mysql_select_db("id2773512_bodega", $bd)) {
        echo "<h3>Atención</h3>";
        echo "<p>Base de datos no existe</p>";
        return null;
    }
    return $bd;
}

?>