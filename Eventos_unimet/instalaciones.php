<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: Instalaciones UNIMET ::</title>
<link href = "css/styles.css" rel="stylesheet" type="text/css"/> 
<link rel="stylesheet" href="css/custom-theme/jquery-ui-1.8.22.custom.css" type="text/css" media="screen" />
<script src="js/jquery.js" type="text/javascript"></script>
<!--efecto lightbox-->

<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<script type="text/javascript" src="js/slimbox2.js"></script>
<link rel="stylesheet" href="css/slimbox2.css" type="text/css" media="screen" />
<!-- Fin efecto lightbox -->

</head>

<body>

	<div class="bloque_principal">
    	<?php include("header.php");?>
 	
    	<div class="instalaciones_internas">
        		<div class="titulo_instalaciones">
                	Instalaciones de la Universidad Metropolitana
                </div>
                
                <?php
                //tomamos los datos del archivo conexion.php  
									session_start();
									$host = "localhost";
									$user ="root";
									$ps = "";
									$bd="unimet_eventos";
									
									$conexion = mysql_connect($host,$user,$ps)or die("problema al conectar el host");
									mysql_select_db($bd,$conexion)or die ("problemas al conectar la bd tabla usuario");
							//se envia la consulta  
							$instalaciones = mysql_query('SELECT * FROM localidad WHERE id_localidad != "1"');  
							//se despliega el resultado  
                while ($foto = mysql_fetch_row($instalaciones)){
					
					echo ' <div class="instalaciones"> ';
							echo ' <div class="instalaciones_foto"> ' ;
								echo ' <a href="fotos/instalaciones/'.$foto[4].'" rel="lightbox" title="'.$foto[1].' - Capacidad para '.$foto[3].' personas - Precio: '.$foto[5].' Bsf + Iva"><img src="fotos/instalaciones/'.$foto[4].'" class="zoom" width="300" height="200"/></a>';
							echo '</div>';
							
							echo '<div class="instalaciones_datos">
								'.$foto[1].'</br>
								Capacidad para '.$foto[3].' personas</br>
								Precio: '.$foto[5].' Bsf + Iva
							</div>
					</div>';
				}
                ?>
                
        <div style="clear:both">
        </div>
            
             
      
       <a href="index.php"><div class="boton_volver">Volver</div></a>
    <div style="clear:both">
    </div>

</body>
</html>
