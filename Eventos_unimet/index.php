<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: Eventos Unimet ::</title>
<link href = "css/styles.css" rel="stylesheet" type="text/css"/> 
</head>

<body background="fondos/samanatardecer2.png">
	<div class="bloque_fondo" >
	<div class="bloque_principal">
    
    	<?php 
		// Se llama al archivo header.php
		include("header.php");
		?>
 		
        <div class="contenedor_interno">
            
            
                <?php
		//Llamamos a la clase conexion para conectarnos a la BD
		include("clases/conexion.php");
		$conexion = mysql_connect($host,$user,$ps)or die("problema al conectar el host");
		mysql_select_db($bd,$conexion)or die ("problemas al conectar la bd tabla usuario");
		
		//hacemos la consulta a la tabla banner
		$banner = mysql_query('SELECT * FROM banner_index');
		
		//Se muestran los banners contenidos en la Base de Datos
    	while($row_banner = mysql_fetch_row($banner)){
		echo '<a href="'.$row_banner[3].'">'.'<div class="banner_index">'.'<div class="logo_banner_index"><img src="img/'.$row_banner[2].'" alt="" style="width:70" height="70" />'.'</div>'.'<div class="descripcion_banner_index">'.$row_banner[1].'</div>'.'</div>';}
				?>
    
       <div class="espacio"></div>
       
       </div>
       
       <div style="clear:both">
    </div>
     </div>
</body>
</html>
