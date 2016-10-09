<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: Administrador ::</title>
</head>

<body>

<div class="bloque_pagina">

	<div class="bloque_central">
    		<table width="400" border="0" cellspacing="0" cellpadding="0" class="registro" >
                	<form method="post" enctype="multipart/form-data" id="registro" action="clases/registro.php">
                  	  <tr>
                    		<td width="105" height="40">Nombre:</td>
                   		  <td  width="295" height="40"><input name="nombre" type="text" class="campo obt"/></td>
               		  </tr>
                  		<tr>
                    		<td width="105" height="40">Contrasena:</td>
                   		  <td  width="295" height="40"><input name="contrasena" type="password" class="campo obt"/></td>
                  		</tr>	 
           		         <tr>
                   		  <td width="105" height="40">&nbsp;</td>
                   		  <td><input name="enviar" type="submit" class="boton" id="enviar" value="" rel="1" style="margin:10px 0 0 20px; width:75px; background-image:url(img/btn_enviar.jpg); border:0; height:30px; width:80px; background-repeat:no-repeat; background-color:#201f20"/>                              <input name="limpiar" type="reset" class="boton" id="Limpiar" value="" style="margin:10px 0 0 1px; width:75px; background-image:url(img/btn_borrar.jpg); border:0; height:30px; width:80px; background-repeat:no-repeat; background-color:#201f20;"/>
                           </td>
               		  </tr>
                  </form>
            </table>
    </div>

	<div style="clear:both"></div>
</div>

</body>
</html>
