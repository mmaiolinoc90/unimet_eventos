<?php
include('secureurl.php');
function conect(){

		$servidor = "localhost";
		$usuario = "root";
		$clave = "";
		$bd ="eventos_unimet";

	
   if (!($link=mysql_connect($servidor,$usuario,$clave))){
      echo "Ocurrio un error al intentar conectarse a la base de datos.";
      exit();
   }
   if (!mysql_select_db($bd,$link)){
      echo "Ocurrio un error al intentar seleccionar a la base de datos.";
      exit();
   }
   return $link;
}
?>
