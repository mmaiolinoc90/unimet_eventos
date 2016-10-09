<?php
$fecha_sistema = $_GET['query'];
$nro_bloques = $_GET['bloques'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: Gestióna tu Evento Interno ::</title>
<link href = "css/styles.css" rel="stylesheet" type="text/css"/>
<script src="js/jquery-3.1.0.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">

<?php include("clases/fechas.php");?>
  
</head>
<body>

<div class="bloque_principal">
    	<?php include("header.php");?>
 		
        <div class="contenedor_interno">
                    
                  <div id="formulario_interno">
                  </br>
                  </br>
                    <center>Formulario para evento interno</center>
                      <form name="registro_evento_interno_horas" method="post" id="registro2" action="clases/registro_evento_interno_horas.php">
                      
                      <?php  
							//tomamos los datos del archivo conexion.php  
									include("clases/conexion.php");
									$conexion = mysql_connect($host,$user,$ps)or die("problema al conectar el host");
									mysql_select_db($bd,$conexion)or die ("problemas al conectar la bd tabla usuario");
									
							//se hace consulta para traer ID_evento  
							$resultado1 = mysql_query('SELECT * FROM evento_interno WHERE fecha_solicitud="'.mysql_real_escape_string($fecha_sistema).'"'); 
							//
							 
							while ($row = mysql_fetch_row($resultado1)){
											echo ' <table width="500"  style="margin-left:200px"> ';  
											echo "<tr>";
												  echo "<td><input value=".$row[0]." name=".'id_evento'." type=".'text'." style=".'visibility:hidden'." /></td>";
											      echo "<td><input value=".$row[9]." name=".'id_usuario_interno'." type=".'text'." style=".'visibility:hidden'." /></td>";
											echo "</tr>";
										echo "</table>";
							}  
							  
					?>  
                    <table>
                    	<td><input type="text"  name="nro_bloques" value="<?php echo $nro_bloques?>" style="visibility:hidden" /></td>
                        </table>
                        
                           </br>
                        </br>
                        <p>Bloques del evento:</p>
                        </br>
                        </br>
                        <?php 
						$contador_fechas_Jquery = 0;
							//se inicia el ciclo FOR que va a permitir que se puedan mostrar todos los bloques requeridos
							for ($contador_bloques =  1; $contador_bloques <= $nro_bloques; $contador_bloques++)
							{
								$contador_fechas_Jquery++;
						?>
						
                        <table width="900">
                          <tr>
                         	 <td width="77"></td>
                          	<td width="161" > Fecha inicial del bloque</td>
                          	<td width="173" > Horario inicial del bloque</td>
                            <td width="156" > Fecha final del bloque</td>
                          	<td width="162" > Horario final del bloque</td>
                          	<td width="143" > Localidad </td>
                          </tr>
                          
                          </br>
                          <tr>
                            <td width="77" style="text-align:center">Bloque <?php echo $contador_bloques ?></td>
                          <td><input name="fecha_inicial<?php echo $contador_bloques?>" type="date" style="width:150px" id='txtfeca<?php echo $contador_fechas_Jquery ?>'/></td>
                            <td><input type="time"  name="hora_inicial<?php echo $contador_bloques?>"  style="width:165px" />
                            	<?php $contador_fechas_Jquery++; ?>
                            </td>
                          <td><input name="fecha_final<?php echo $contador_bloques?>" type="date" style="width:140px" id='txtfeca<?php echo $contador_fechas_Jquery ?>'/></td>
                            <td><input type="time"  name="hora_final<?php echo $contador_bloques?>"  style="width:150px" />
                            			
                            </td> 
                            <td> 
                                    <?php
									
									$conexion = mysql_connect($host,$user,$ps)or die("problema al conectar el host");
									mysql_select_db($bd,$conexion)or die ("problemas al conectar la bd tabla usuario");
									//se envia la consulta 
									$id_localidad = mysql_query('SELECT id_localidad FROM localidad');
									// consulta para traer nombre de la localidad
									?>  
                            <select name="localidad<?php echo $contador_bloques?>" style="width:128px; font-size:12px">    
    								<?php   
   									 while ( $row9 =mysql_fetch_array($id_localidad) )   
    								{
       								 ?>
        									<option  value=" <?php echo $row9['id_localidad'] ?> " >
       										<?php  $row9['id_localidad']; 
													$localidad = mysql_query('SELECT nombre FROM localidad WHERE id_localidad="'.mysql_real_escape_string(			$row9['id_localidad']).'"');
													 while ( $row10 =mysql_fetch_array($localidad))
												   {
													   echo $row10['nombre'];
													   }
											?>
                                            		
       										</option>
       								 <?php
    								}    
   									 ?>        
							</select>
							 </td> 
                           </tr>
                        </table>
                            
                             </br>
                         	</br>
                        <table width="800"  style="margin-left:80px; font-weight:bold">
                            <tr>
                            <td width="600" >Servicios del bloque <?php echo $contador_bloques ?>: </td>
                        </table>
                            
                            
                        <table width="800"  style="margin-left:80px; border-style: solid; border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px">
                            <tr>
                            <td width="135" height="65"  style="font-weight:bold">Audiovisuales:</td>
                            <td width="116" style="text-align:center">Micrófonos <input name="checkbox<?php echo $contador_bloques?>[]" type="checkbox" value="1" /></td>
                            <td width="118" style="text-align:center">Video Bean<input name="checkbox<?php echo $contador_bloques?>[]" type="checkbox" value="2" /></td>
                            <td width="100" style="text-align:center">Laptops <input name="checkbox<?php echo $contador_bloques?>[]" type="checkbox" value="3" /></td>
                            <td width="101" style="text-align:center">Cornetas <input name="checkbox<?php echo $contador_bloques?>[]" type="checkbox" value="4" /></td>
                            <td width="202" style="text-align:center">Consola de amplificación <input name="checkbox<?php echo $contador_bloques?>[]" type="checkbox" value="5" /></td>
                           </tr>
                        </table> 
                         <table width="800"  style="margin-left:80px; border-style: solid; border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px" >
                             <tr>
                            <td width="135" height="47" style="font-weight:bold">Protocolo:</td>
                            <td width="344">Coordinador <input name="checkbox<?php echo $contador_bloques?>[]" type="checkbox" value="6" /></td>            
                            <td width="305">Guías de Protocolo <input name="checkbox<?php echo $contador_bloques?>[]" type="checkbox" value="7" /></td>
                           </tr>
                        </table> 
                          
                          <table width="800"  style="margin-left:80px; border-style: solid; border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px">
                            <tr>
                            <td width="134" height="49"  style="font-weight:bold">Seguridad:</td>
                            <td width="345">Personal atención al público <input name="checkbox<?php echo $contador_bloques?>[]" type="checkbox" value="8" /></td>
                            <td width="305">Personal atención VIP <input name="checkbox<?php echo $contador_bloques?>[]" type="checkbox" value="9" /></td>
                           </tr>
                        </table>
                         
                         <table width="800"  style="margin-left:80px; border-style: solid; border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px">
                        	<tr>
                            <td width="133" height="52"  style="font-weight:bold">Mantenimiento:</td>
                            <td width="344">Personal de limpieza <input name="checkbox<?php echo $contador_bloques?>[]" type="checkbox" value="10" /></td>            
                            <td width="307">Acondicionamiento de espacios<input name="checkbox<?php echo $contador_bloques?>[]" type="checkbox" value="11" /></td>
                           </tr>
                        </table>
                    </br>
                         	</br> 
                            
                            <?php
							}
							?>               
                       <input name="enviar" value="Aceptar" type="submit" class="botom" id="enviar" style="font-size:12px"  />
                        
                      </form>
                      <p>&nbsp;</p>
          </div>
        </div>
        
       
       <div class="espacio"></div>
       <div style="clear:both">
        
        
</div>
<div style="clear:both">
</body>
</html>
