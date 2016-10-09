<?
	if(isset($_cookie["gestion_eventoid"]))
	{
		echo("Usted tiene una session iniciada");
		header("location:gestion_evento.php");
	}
	else
	{
		echo("No haz iniciado session");
	}
?>