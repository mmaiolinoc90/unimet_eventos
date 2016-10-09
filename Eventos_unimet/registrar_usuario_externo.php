<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: Gestiòn evento externo ::</title>
<link href = "css/styles.css" rel="stylesheet" type="text/css"/>
</head>

<body>

<div class="bloque_principal">
    	<?php include("header.php");?>
 		
        <div class="contenedor_interno">
                    
                  <div id="formulario_interno">
                  </br>
                  </br>
                    <center>Formulario registro usuario externo</center>
                      <form name="usuario_externo" method="post" id="usuario_externo" action="clases/registro_usuario_externo.php">
                           </br>
                        </br>
                        <p>Ingrese los siguientes datos:</p>
                        </br>
                        </br>
                        <table width="531"  style="margin-left:200px">
                          <tr>
                            <td width="173">Nombre:</td>
                            <td width="346" ><input name="nombre" id="titulo" type="text" style="width:300px" /></td>
                          </tr>
                          <tr>
                            <td>Apellido:</td>
                            <td ><textarea name="apellido" cols="" rows="" style="width:300px"></textarea></td>
                          </tr>
                          <tr>
                            <td>Rif:</td>
                            <td><input name="rif" type="text" style="width:300px"/></td>
                          </tr>
                           <tr>
                            <td>Correo:</td>
                            <td><input name="correo" type="text" style="width:300px"/></td>
                          </tr>
                          <tr>
                            <td>Nro. de telefono:</td>
                            <td><input name="telefono" type="text" style="width:300px"/></td>
                          </tr>
                           <tr>
                            <td>Empresa:</td>
                            <td><input name="empresa" type="text" style="width:300px"/></td>
                          </tr>
                        </table> 
                             </br>
                         	</br>
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
