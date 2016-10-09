<?php
$id_evento = $_GET['evento'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: Gestióna tu Evento ::</title>
<link href = "css/styles.css" rel="stylesheet" type="text/css"/>
</head>
<body>

<div class="bloque_principal">
    	<?php include("header.php");?>
 		<div class="contenedor_interno">
        
        	 <div id="formulario_interno">
                  </br>
                  </br>
                    <center>Resumen de su evento</center>
                    </br>
                    <p>Datos Personales:</p>
                    
                     <?php  
							//tomamos los datos del archivo conexion.php  
									include("clases/conexion.php");
									$conexion = mysql_connect($host,$user,$ps)or die("problema al conectar el host");
									mysql_select_db($bd,$conexion)or die ("problemas al conectar la bd tabla usuario");
							//se envia la consulta para traer el id usuario.
							$Resultado_usuario = mysql_query('SELECT id_usuario_interno FROM agenda_interna WHERE id_evento="'.mysql_real_escape_string($id_evento).'"');
							$array_usuario = mysql_fetch_row($Resultado_usuario);
							$id_usuario = $array_usuario[0];
							
							//consulta para traer datos del usuario
							$datos_usuario = mysql_query('SELECT * FROM usuario_interno WHERE id_usuario_interno="'.mysql_real_escape_string($id_usuario).'"');
							
							//se muestran los datos del usuario
							while ($row_usuario = mysql_fetch_row($datos_usuario)){
											echo ' <table width="600"  style="margin-left:200px"> ';  
											echo "<tr>";  
												   echo '<td width="230"> Nombre del Solicitante:</td>';
												   echo "<td>$row_usuario[1]</td>";
											echo "</tr>";
											
											echo "<tr>";  
												   echo '<td width="230"> Apellido del Solicitante:</td>';
												   echo "<td>$row_usuario[2]</td>";
											echo "</tr>";
											
											echo "<tr>";  
												   echo '<td width="230"> Cedula de Identidad:</td>';
												   echo "<td>$row_usuario[3]</td>";
											echo "</tr>";
											
											echo "<tr>";  
												   echo '<td width="230"> Correo Electrónico:</td>';
												   echo "<td>$row_usuario[4]</td>";
											echo "</tr>";
											
											echo "<tr>";  
												   echo '<td width="230"> Nro. de telefono:</td>';
												   echo "<td>$row_usuario[5]</td>";
											echo "</tr>";
										echo "</table>";
							}  	 
					?>
             </br>
             <p>Datos del evento:</p>
                   <?php  
							//consulta para traer datos del evento 
							$datos_evento = mysql_query('SELECT * FROM evento_interno WHERE id_evento_interno="'.mysql_real_escape_string($id_evento).'"');
							
							//se muestran los datos del usuario
							while ($row_evento = mysql_fetch_row($datos_evento)){
											echo ' <table width="600"  style="margin-left:200px"> ';  
											echo "<tr>";  
												   echo '<td width="230"> Nombre del Evento:</td>';
												   echo "<td>$row_evento[1]</td>";
											echo "</tr>";
											
											echo "<tr>";  
												   echo '<td width="230"> Descripción del Evento:</td>';
												   echo "<td>$row_evento[2]</td>";
											echo "</tr>";
											
											echo "<tr>";  
												   echo '<td width="230"> Cantidad de Personas:</td>';
												   echo "<td>$row_evento[3]</td>";
											echo "</tr>";
											
											echo "<tr>";  
												   echo '<td width="230"> Institución Aleada:</td>';
												   echo "<td>$row_evento[4]</td>";
											echo "</tr>";
											
											echo "<tr>";  
												   echo '<td width="230"> Cuenta con el presupuesto?:</td>';
												   echo "<td>$row_evento[5]</td>";
											echo "</tr>";
											
											echo "<tr>";  
												   echo '<td width="230"> Status del evento:</td>';
												   echo "<td>$row_evento[7]</td>";
											echo "</tr>";
										echo "</table>";
							}  	 
					?>
             </br>
             <p>Bloques del evento:</p>
             	 <?php  
							//consulta para traer datos del evento
							$datos_bloque = mysql_query('SELECT * FROM agenda_interna WHERE id_evento="'.mysql_real_escape_string($id_evento).'"');
							
							//se muestran los datos del usuario
							while ($row_bloques = mysql_fetch_row($datos_bloque)){
								
								//consulta para traer datos del evento
							$datos_bloque = mysql_query('SELECT * FROM agenda_interna WHERE id_evento="'.mysql_real_escape_string($id_evento).'"');
							
							$contador_bloques = 1;
							//se muestran los datos del usuario
							while ($row_bloques = mysql_fetch_row($datos_bloque)){
						
								echo '<div class="banner_comprobante_servicios"><div class="nro_bloque">Bloque '.$contador_bloques.'</div>';
								
										//se consulta la base de datos para buscar la localidad
										$datos_localidad = mysql_query
		
										('SELECT nombre FROM localidad WHERE id_localidad="'.mysql_real_escape_string($row_bloques[7]).'"');
										$localidad = mysql_fetch_row($datos_localidad);
										echo '<div class="localidad_bloque">Localidad: '.$localidad[0].'</div>';
										echo '<div class="fecha_hora_bloque">';
												echo '<div class="fechaI_bloque">Fecha: '.$row_bloques[3].'</div>';
												echo '<div class="fechaI_bloque">HoraI: '.$row_bloques[5].'</div>';
												echo '<div class="fechaI_bloque">horaF: '.$row_bloques[6].'</div>';
										echo '</div>';
										echo '<div class="servicios_bloque"> Servicios: </div>';
										//sacamos el string con los id de Servicios seleccionados y lo transformamos en aray nuevamente
										$cadena = explode(",", $row_bloques[8]);
										$cont = 0;
										//se obtienen los valores del array
										foreach($cadena as $id_servicios)
										{
											 $id_servicios = $cadena[$cont];
											 
											 //se hace la consulta para tarer los servicios
											 $servicio = mysql_query
		
											 ('SELECT nombre FROM servicios WHERE id_servicios="'.mysql_real_escape_string($id_servicios).'"');	
		
											  $ser = mysql_fetch_row($servicio);
											 $prueba = $ser[0];
											 echo ' - '.$prueba.'</br>';
											 $cont++;
										}
										$contador_bloques++;
										echo '</div>';
									}
							
							 echo '<div style="clear:both">';
							}
							
							 echo '<div style="clear:both">';
					?>
             </div>
       
       <a href="index.php"><div class="boton_volver">Finalizar</div></a> 
       <div style="clear:both">
        
        
</div>
<div style="clear:both">
</body>
</html>