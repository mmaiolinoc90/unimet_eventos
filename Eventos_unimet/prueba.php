<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script>
document.formulario_registro.addEventListener('submit', validarFormulario);


function validarFormulario(evObject) {
evObject.preventDefault();
var todoCorrecto = true;

var formulario = document.formulario_registro;
for (var i=0; i<formulario.length; i++) {
                if(formulario[i].type =='text') {
                               if (formulario[i].value == null || formulario[i].value.length == 0 || /^\s*$/.test(formulario[i].value)){
                               alert (formulario[i].name+ ' no puede estar vacío o contener sólo espacios en blanco');
                               todoCorrecto=false;
                               }
                }
                }
if (todoCorrecto ==true) {formulario.submit();}
}
</script>
</head>

<body>

<form name="formulario_registro" method="post" id="registro" action="clases/resgistro.php"  enctype="multipart/form-data">
						  <table width="531"  style="margin-left:200px">
                          <tr>
                            <td width="173">Titulo del Evento:</td>
                            <td width="346" ><input name="titulo" id="titulo" type="text" style="width:300px" /></td>
                          </tr>
                          <tr>
                            <td>Descripción del Evento:</td>
                            <td ><textarea name="descripcion" cols="" rows="" style="width:300px"></textarea></td>
                          </tr>
                          <tr>
                            <td>Cantidad de personas:</td>
                            <td><input name="cantidad" type="text" style="width:300px"/></td>
                          </tr>
                           <tr>
                            <td>Institución Aliada:</td>
                            <td><input name="institucion_aliada" type="text" style="width:300px"/></td>
                          </tr>
                          <tr>
                            <td>Adjunte su poster del evento:</td>
                            <td><input name="foto_evento" type="file" style="width:300px" /></td>
                          </tr>
                        </table>
                        
                         <input name="enviar" value="Aceptar" onclick="validarFormulario()" type="button" class="botom" id="enviar"  />
</form>

</body>
</html>
