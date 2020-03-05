<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<script src='../InputsVariables.js'></script>
		<link rel="stylesheet" type="text/css" href="../../css/estilo.css" />
		<title>Sube fotos mascota</title>
	</head>
	<body>
	   <?php Basic::header();
	    Basic::nav();

	    ?>
	   <form method="post" enctype="multipart/form-data" action="/mascota/storeFotos">
			<label>Foto Mascota</label>
			<input type="file" name="imagen"><br>
			<label>Ubicación: </label>
			<input type="text" name="ubicacion"><br>
			<input type="hidden" name="idmascota" value="<?= $mascota->id?>"><br>
			 
 <!-- 			<input type="button" id="mas" onclick="addInput();" value="+">
            <input type="button" id="menos" onclick="removeInput();" value="-" disabled="disabled"> --> 
            <input type="submit" name="enviar" value="Enviar">
       </form> 
       <?php Basic::footer();?>     
	</body>
</html>