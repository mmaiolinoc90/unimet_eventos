<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: Cotizacion :: </title>
<link href = "css/styles.css" rel="stylesheet" type="text/css"/>
</head>

<body>

<div class="bloque_principal">
    	<?php include("header.php");?>
 		
        <div class="contenedor_interno">
                    
                  <div id="formulario_interno">
                  </br>
                  </br>
                    <center>Formulario de cotizaciòn</center>
                      </br>
                      <p>Datos Personales:</p>
                      <p>&nbsp;</p>
                      <p>&nbsp;</p>
                      <form name="cotizacion" method="post" id="registro" action="index.php"  enctype="multipart/form-data">
                      
                    </br>
                         </br>
                        <table width="531"  style="margin-left:200px">
                          <tr>
                            <td width="173">Nombre:</td>
                            <td width="346" ><input name="nombre" id="titulo" type="text" style="width:300px" /></td>
                          </tr>
                          <tr>
                            <td>Apellido:</td>
                            <td ><input name="apellido" ctype="text" rows="" style="width:300px"></textarea></td>
                          </tr>
                          <tr>
                            <td>Correo electronico:</td>
                            <td><input name="correo" type="text" style="width:300px"/></td>
                          </tr>
                           <tr>
                            <td>Cedula de identidad:</td>
                            <td><input name="cedula" type="text" style="width:300px"/></td>
                          </tr>
                          <tr>
                            <td>Consulta:</td>
                            <td><textarea name="consulta" cols="" rows="" style="width:300px"></textarea></td>
                          </tr>
                        </table>
                      <input name="enviar" value="Aceptar" type="submit" class="botom" id="enviar" />
                      </form>
                      <p>&nbsp;</p>
          </div>
        </div>
        
       
       <div class="espacio"></div>
       <div style="clear:both">
        
        
</div>
<div style="clear:both">
</body>

</body>
</html>
