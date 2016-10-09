<?php


include("conexion.php");

	if(isset($_POST['titulo']) && !empty($_POST['titulo']) &&
	 isset($_POST['descp']) && !empty($_POST['descp'])&&
	 isset($_POST['cantidad']) && !empty($_POST['cantidad']) &&
	 isset($_POST['aleada']) && !empty($_POST['aleada'])) 
	 {
		$conexion = mysql_connect($host,$user,$ps)or die("problema al conectar el host");
		 mysql_select_db($bd,$conexion)or die ("problemas al conectar la bd");	 
		 mysql_query("INSERT INTO evento (titulo,descripcion,cantidad_personas,Institucion_aleada) VALUES ('$_POST[titulo]','$_POST[descp]','$_POST[cantidad]','$_POST[aleada]')",$conexion);
		 header('Location: ../gestion_evento.php');	 
	}else {
		echo "problema al insertar en la base de datos";
		}
	

	 

?>