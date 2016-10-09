<?php
session_start();
include("conexion.php");

//Se Realiza la conexion a la BD
$conexion = mysql_connect($host,$user,$ps)or die("problema al conectar el host");
mysql_select_db($bd,$conexion)or die ("problemas al conectar la bd tabla relacional");
//traigo los valores de Nro. de bloques, el id del evento y el id del usuario
$_POST['nro_bloques'];
$id_evento = $_POST['id_evento'];
$id_usuario = $_POST['id_usuario_interno'];

//Hacemos un ciclo for para insertar todos los bloques.
for($nro_bloques = 1; $nro_bloques <= $_POST['nro_bloques']; $nro_bloques++)
{
	$servicios = $_POST['checkbox'.$nro_bloques.''];
	$fecha_inicial = $_POST['fecha_inicial'.$nro_bloques.''];
	$hora_inicial = $_POST['hora_inicial'.$nro_bloques.''];
	$fecha_final = $_POST['fecha_final'.$nro_bloques.''];
	$hora_final = $_POST['hora_final'.$nro_bloques.''];
	$localidad = $_POST['localidad'.$nro_bloques.''];
	//se transforma el array en un varchar para poder guardarlo en base de datos.
	$cadena = implode(",", $servicios);
	
	//Se hace el query para insertar los registros a la tabla DB_relacional
mysql_query("INSERT INTO agenda_interna (id_usuario_interno, id_evento, fecha_inicio, fecha_fin, hora_inicio, hora_fin, localidad_id_localidad, servicios_id_servicios) VALUES ('$_POST[id_usuario_interno]', '$_POST[id_evento]', '".$fecha_inicial."' , '".$fecha_final."', '".$hora_inicial."', '".$hora_final."', '".$localidad."','".$cadena."')", $conexion);
}

echo '<script> window.location="../comprobante.php?evento='.$id_evento.'"</script>';
?>



