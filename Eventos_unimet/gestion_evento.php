<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: Gestióna tu Evento ::</title>
<link href = "css/styles.css" rel="stylesheet" type="text/css"/>
<script src="js/jquery-3.1.0.min.js" type="text/javascript"></script>

 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">

<script>
function mostrarInterno_div(){
	$("#login").fadeIn(300);
}

function mostrarExterno_div(){
	$("#formulario_Externo").fadeIn(300);
}

function ocultarInterno(){
	$("#login").fadeOut(1);
}

function ocultarExterno(){
	$("#formulario_Externo").fadeOut(1);
}
</script>
  
</head>
<body>

<div class="bloque_principal">
    	<?php include("header.php");?>
 		
        <div class="contenedor_interno">
                    <a href="#" onclick="ocultarExterno(); mostrarInterno_div();"> <div class="evento_interno">
                        Evento Interno
                    </div></a>
                    
                    <a href="#"  onclick="ocultarInterno(); mostrarExterno_div(); "><div class="evento_externo">
                        Evento Externo
                    </div></a>
                    <div class="espacio"></div>
                    
                  <div id="login">
                 		<div class="autenticar">
                        	Ingrese su correo y cedula
                            <span id="error" style="font-family: Verdana, Arial, 
       Helvetica, sans-serif; font-size: 12pt;color: #CC3300;
      position:relative;visibility:hidden;">
    usuario Ocupado ¡¡¡
    </span>
                            <form method="post" action="clases/login.php">
                            	<table width="400">
                          			<tr>
                                    	<td width="150">Correo electronico:</td>
                            			<td ><input name="usuario" type="text" style="width:200px"   /></td>
                         			</tr>
                                    <tr>
                                    	<td width="150">Cedula de identidad:</td>
                            			<td ><input name="password" type="password" style="width:200px"  /></td>
                         			</tr>
                                </table>
                                    
                                <input name="enviar" value="Aceptar" type="submit" class="botom" id="enviar" />
                            </form>
                        </div>
                  </div>
                  
                  <div id="formulario_Externo">
                 		<div class="autenticar">
                        	Ingrese su correo y su Rif
                                <span id="error" style="font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12pt;color: #CC3300; position:relative;visibility:hidden;">
        usuario Ocupado ¡¡¡
        </span>
                            <form method="post" action="clases/login_externo.php">
                            	<table width="400">
                          			<tr>
                                    	<td width="150">Correo electronico:</td>
                            			<td ><input name="usuario" type="text" style="width:200px"   /></td>
                         			</tr>
                                    <tr>
                                    	<td width="150">Rif:</td>
                            			<td ><input name="password" type="password" style="width:200px"  /></td>
                         			</tr>
                                </table>
                                    
                                <input name="enviar" value="Aceptar" type="submit" class="botom" id="enviar" />
                            </form>
                            
                            <a href="registrar_usuario_externo.php">Registrate aqui</a>
                        </div>
                  </div>
                    
        </div>
        
       <a href="index.php"><div class="boton_volver">Volver</div></a>
       <div class="espacio"></div>
       <div style="clear:both">
        
        
</div>
<div style="clear:both">
</body>
</html>
