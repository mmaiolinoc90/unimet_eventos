<div class="header">
	
			 <?php
				//Llamamos a la clase conexion para conectarnos a la BD
				include("clases/conexion.php");
				$conexion = mysql_connect($host,$user,$ps)or die("problema al conectar el host");
				mysql_select_db($bd,$conexion)or die ("problemas al conectar la bd tabla usuario");
				
				//hacemos la consulta a la tabla banner
				$header_logo = mysql_query('SELECT Logo_img FROM header');
				while($row_logo = mysql_fetch_row($header_logo))
						{
							echo '<a href="index.php"><div class="logo_header">'.'<img src="img/'.$row_logo[0].'" alt="" style="width:330" height="127" />'.'</a>'.'<div style="clear:both"></div>'.'</div></a>';
								
						}
                ?>	
</div>