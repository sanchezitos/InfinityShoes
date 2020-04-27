<html>
<head>
<title>InfinityShoes</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" type="image/x-icon" href="images/logo.ico" />
<link rel="stylesheet" type="text/css" href="css/coin-slider.css" />
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-titillium-250.js"></script>
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/coin-slider.min.js"></script>
</head>
<body>
<div class="main">
  <div class="header">
    <div class="header_resize">
      <div class="logo">
          <img src="images/logo.png" id="logo" alt="logo"/>
          <h1><a href="admin.php"><span>Infinity</span>- <small>Shoes</small></a></h1>
      </div>
     <br>
	 	<br>

		
		<?php
			$calzado= $_POST['txtcod'];
			
    	include 'conexion.php';
$bd = conectar();

			

			$consulta = mysql_query("SELECT * FROM Calzado
                                                INNER  JOIN Categorias ON Categorias.idcategoria=Calzado.idcategoria 
                                                INNER  JOIN Marcas ON Marcas.idmarca=Calzado.idmarca
                                                INNER  JOIN Colores ON Colores.idcolor=Calzado.idcolor
                                                INNER  JOIN Tallas ON Tallas.idtalla=Calzado.idtalla 
                                                INNER  JOIN Sucursales ON Sucursales.idsucursales=Calzado.idsucursales 
                                                where idcalzado like '%".$calzado."%'", $bd);
                         if(($consulta)){ 
                             echo '<div class="mostabla"';
                             echo '<h1>'.'<h1>'.'Busqueda por código'.'</h1>';
                             echo '<table class="datagrid">';
                              echo '<th>'.'Idcalzado'.'</th>';
                              echo '<th>'.'Nombre'.'</th>';
                              echo '<th>'.'Categoria'.'</th>';
                              echo '<th>'.'Genero'.'</th>';
                              echo '<th>'.'Marca'.'</th>';
                              echo '<th>'.'Nacionalida'.'</th>';
                              echo '<th>'.'Color'.'</th>';
                              echo '<th>'.'Talla'.'</th>';
                              echo '<th>'.'Sucursal'.'</th>';
                              echo '<th>'.'Valor'.'</th>';
                              echo '<th>'.'Cantidad'.'</th>';
			while($muestra = mysql_fetch_array($consulta)){
                              
				echo '<tr>';
				echo '<td>'.$muestra['idcalzado'].'</td>';
				echo '<td>'.$muestra['nombre'].'</td>';
				echo '<td>'.$muestra['categoria'].'</td>';
				echo '<td>'.$muestra['genero'].'</td>';
				echo '<td>'.$muestra['marca'].'</td>';
                                echo '<td>'.$muestra['nacionalidad'].'</td>';
				echo '<td>'.$muestra['color'].'</td>';
				echo '<td>'.$muestra['talla'].'</td>';
				echo '<td>'.$muestra['sucursal'].'</td>';
				echo '<td>'.$muestra['valor'].'</td>';
                                echo '<td>'.$muestra['cantidad'].'</td>';
                            }
                            echo '</table>';
                            }else{
                                
                                ?>
                 <button type="button" id="bus_cod_index" class="btn btn-default">Buscar</button>
                <?php
                                echo'hpta';
				}	
		?>
		
	</center>
	</div>
<button type="button" id="bus_cod_index" class="btn btn-default">Buscar</button>
</body>
    <script src="js/jquery-3.1.0.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/cod.js"></script>
        <script src="js/operaciones.js"></script>
</html>