<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<script src='js/InputsVariables.js'></script>
		<title>Sube fotos mascota</title>
	</head>
	<body>
	   <?php Basic::header();
	    Basic::nav();?>
	   <form method="post" enctype="multipart/form-data" action="/mascota/storeFotos/$_GET['p']">
			<label>Foto Mascota</label>
			<input type="file" name="imagen"><br>
			<label>Ubicación: </label>
			<input type="text" name="ubicacion"><br>
			 
<!-- 			<input type="button" id="mas" onclick="addInput();" value="+">
            <input type="button" id="menos" onclick="removeInput();" value="-" disabled="disabled"> -->
            <input type="submit" name="enviar" value="Enviar">
       </form> 
       <?php Basic::footer();?>     
	</body>
</html>