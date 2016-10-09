<?php
include("clases/modulo.class.php");
$modulos = new modulo();
if($_GET["id"]){
	$id_acc = $_GET["id"];
}else{
	$id_acc = $modulos->listar("","id_modulo DESC",1,0);
	$id_acc = $id_bo[0]["id_modulo"];
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: Administrador ::</title>
<link href = "css/styles.css" rel="stylesheet" type="text/css"/> 
</head>

<body>

<div class="bloque_pagina">
	
    <?php
    	$lista = $modulos->listar();
    	foreach($lista as $key=>$value){
		echo '<div class="bloque_modulo">'.'<div class="bloque_foto_modulo"><img src="'.$value['foto'].'" /></div>'.'<div class="bloque_nombre_modulo">'.$value['nombre'].'</div>'.'</div>';}
	?>

    <div style="clear:both"></div>
</div>

</body>
</html>
