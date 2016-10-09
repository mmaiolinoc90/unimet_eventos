
function validation(){
	var nombre_evento = document.getElementById("titulo").value;
	var descripcion = document.getElementById("descripcion").value;
	var cantidad = document.getElementById("cantidad").value;
	var institucion_aliada = document.getElementById("institucion_aliada").value;
	var foto_evento = document.getElementById("foto_evento").value;
	var nro_bloque = document.getElementById("nro_bloque");
	var financiamiento = document.getElementById("financiamiento").value;
	
	if(nombre_evento == "")
	{
		alert("hay campos incompletos");
		return false;
	}
	else if(descripcion == "")
	{
		alert("hay campos incompletos");
		return false;
	}
	else if(cantidad == "")
	{
		alert("hay campos incompletos");
		return false;
	}
	else if(institucion_aliada == "")
	{
		alert("hay campos incompletos");
		return false;
	}
	else if(foto_evento == "")
	{
		alert("hay campos incompletos");
		return false;
	}
	else if(nro_bloque == "")
	{
		alert("hay campos incompletos");
		return false;
	}
	else if(financiamiento == "")
	{
		alert("hay campos incompletos");
		return false;
	}
	else 
	{
		alert("Su mensaje fue enviado exitosamente");
	}
}