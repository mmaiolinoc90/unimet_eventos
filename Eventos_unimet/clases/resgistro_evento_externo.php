<?php
session_start();
include("conexion.php");

//Aqui trae el valor de los campos que pertenecen a la tabla evento_interno
$_POST['id_usuario'];
$_POST['titulo'];
$_POST['descripcion'];
$_POST['cantidad'];
$_POST['nro_bloque'];
 
//se declaran los formatos permitidos del archivo adjunto
$formato_foto = array('.jpg', '.png', '.JPG', '.PNG');
//traigo el archivo que se adjunto
$nombre_archivo = $_FILES['foto_evento']['name'];
$nombre_tmp_archivo = $_FILES['foto_evento']['tmp_name'];
$extencion = substr($nombre_archivo, strrpos($nombre_archivo,'.'));
//Se mueve el archivo adjunto a la carpeta upload
move_uploaded_file($nombre_tmp_archivo,"../upload/$nombre_archivo");
	
//se asigna valor a status
$status = "NO APROBADO";

//Se configura la hora
date_default_timezone_set('America/La_Paz');
$fechaactual = getdate();

// se asigna el valor de la fecha y hora a la variable $fecha_sistema
$fecha_sistema = "$fechaactual[mday]/$fechaactual[mon]/$fechaactual[year] $fechaactual[hours]:$fechaactual[minutes].$fechaactual[seconds]";

//se hace la conexion a la BD, y se le envia el query para insertar el registro.
$conexion = mysql_connect($host,$user,$ps)or die("problema al conectar el host");
mysql_select_db($bd,$conexion)or die ("problemas al conectar la bd tabla evento");	 
mysql_query("INSERT INTO evento_externo (titulo_evento,des_evento,cant_per, fecha_solicitud, status, evento_img, usuario_externo_id_usuario_externo) VALUES ('$_POST[titulo]','$_POST[descripcion]','$_POST[cantidad]','".$fecha_sistema."','".$status."','".$nombre_archivo."', '$_POST[id_usuario]')",$conexion);

//se le indica a que pagina debe ir, y se le manda la variable $fecha_sistema
echo '<script>window.location="../gestion_evento_externo_bloques.php?query='.$fecha_sistema.'&bloques='.$_POST['nro_bloque'].'"</script>';
		
?>