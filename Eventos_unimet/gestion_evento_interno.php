<?php
$id_usuario_interno = $_GET['query'];
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

<script>
document.formulario_registro.addEventListener('submit', validarFormulario);
 
function validarFormulario(evObject) {
evObject.preventDefault(); //Evita el envío del formulario hasta comprobar
}

function validarFormulario(evObject) {
evObject.preventDefault();
var todoCorrecto = true;

var formulario = document.formulario_registro;
for (var i=0; i<formulario.length; i++) {
                if(formulario[i].type =='text') {
                               if (formulario[i].value == null || formulario[i].value.length == 0 || /^\s*$/.test(formulario[i].value)){
                               alert (formulario[i].name+ ' no puede estar vacío o contener sólo espacios en blanco');
                               todoCorrecto=false;
                               }
                }
                }
if (todoCorrecto ==true) {formulario.submit();}
}
</script>
  
</head>
<body>

<div class="bloque_principal">
    	<?php include("header.php");?>
 		
        <div class="contenedor_interno">
                    
                  <div id="formulario_interno">
                  </br>
                  </br>
                    <center>Formulario para evento interno</center>
                      </br>
                      <p>Datos Personales:</p>
                      <p>&nbsp;</p>
                      <p>&nbsp;</p>
                      <form name="formulario_registro" method="post" id="registro" action="clases/resgistro.php"  enctype="multipart/form-data">
                      
                      <?php  
							//tomamos los datos del archivo conexion.php  
									include("clases/conexion.php");
									$conexion = mysql_connect($host,$user,$ps)or die("problema al conectar el host");
									mysql_select_db($bd,$conexion)or die ("problemas al conectar la bd tabla usuario");
							//se envia la consulta  
							$nombre = mysql_query('SELECT * FROM usuario_interno WHERE correo="'.mysql_real_escape_string($id_usuario_interno).'"');  
							 
							while ($row = mysql_fetch_row($nombre)){
										echo ' <table width="600"  style="margin-left:200px"> ';  
											echo "<tr>";  
												   echo '<td width="230"> Nombre del Solicitante:</td>';
												   echo "<td>$row[1]</td>";
											echo "</tr>";
											
											echo "<tr>";  
												   echo '<td width="230"> Apellido del Solicitante:</td>';
												   echo "<td>$row[2]</td>";
											echo "</tr>";
											
											echo "<tr>";  
												   echo '<td width="230"> Cedula de Identidad:</td>';
												   echo "<td>$row[3]</td>";
											echo "</tr>";
											
											echo "<tr>";  
												   echo '<td width="230"> Correo Electrónico:</td>';
												   echo "<td>$row[4]</td>";
											echo "</tr>";
											
											echo "<tr>";  
												   echo '<td width="230"> Nro. de telefono:</td>';
												   echo "<td>$row[5]</td>";
												   echo "<td><input value=".$row[0]." name=".'id_usuario'." type=".'text'." style=".'visibility:hidden'." /></td>";
											echo "</tr>";
										echo "</table>";
								
							}  
							  
					?>  
                    
                   
                    </br>
                        </br>
                        <p>Datos del evento:</p>
                         </br>
                         </br>
                        <table width="531"  style="margin-left:200px">
                          <tr>
                            <td width="173">Titulo del Evento:</td>
                            <td width="346" ><input name="titulo" id="titulo" type="text" style="width:300px" /></td>
                          </tr>
                          <tr>
                            <td>Descripción del Evento:</td>
                            <td ><textarea name="descripcion" cols="" rows="" style="width:300px"></textarea></td>
                          </tr>
                          <tr>
                            <td>Cantidad de personas:</td>
                            <td><input name="cantidad" type="text" style="width:300px"/></td>
                          </tr>
                           <tr>
                            <td>Institución Aliada:</td>
                            <td><input name="institucion_aliada" type="text" style="width:300px"/></td>
                          </tr>
                          <tr>
                            <td>Adjunte su poster del evento:</td>
                            <td><input name="foto_evento" type="file" style="width:300px" /></td>
                          </tr>
                        </table>
                        
                        
                        <table width="340"  style="margin-left:200px">
                              <tr>
                                <td width="40">Cuantos bloques tendrá su evento:</td>
                                <td width="20" ><input name="nro_bloque" type="text" style="width:20px" /></td>
                              </tr>
                        </table>
                        </br>
                        </br>
                        <table width="531"  style="margin-left:200px">
                        	¿Usted cuenta con el presupuesto para realizar el evento?
                            <td width="20"></br>
                         </br>
                          <tr>
                            <td style="width:20px" >Si</td>
                            <td width="499" ><input name="financiamiento" type="radio" value="SI" /></td>
                          </tr>
                          <tr>
                            <td style="width:20px" >No</td>
                            <td ><input name="financiamiento" type="radio" value="NO" /></td>
                          </tr>
                        </table>
                        
                       <input name="enviar" value="Aceptar" type="submit" class="botom" id="enviar"  />
                        
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
