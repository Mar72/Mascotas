<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
        <script src="../../js/InputsVariables.js"></script>		
		<link rel="stylesheet" type="text/css" href="../../../css/estilo.css" />
		<title>Sube fotos mascota</title>
		
	</head>
	<body>
	   <?php (TEMPLATE)::header("Mascotas");
	         (TEMPLATE)::nav();
	         (TEMPLATE)::login();

	    ?>
	   <form method="post" enctype="multipart/form-data" action="/foto/storeFotos">
	      <fieldset id="fotos">
            <legend>Fotos Mascota</legend>
            <label>Ubicación: </label>
			<input type="text" name="ubicacion"><br>
			<input type="file" name="fichero1"><br>			
			<input type="hidden" name="idmascota" value="<?= $mascota->id?>"><br>
		  </fieldset></fieldset>	 
		  
 			<input type="button" id="mas" onclick="addInput();" value="+">
            <input type="button" id="menos" onclick="removeInput();" value="-" disabled="disabled">  
            <input type="submit" name="enviar" value="Enviar">
       </form> 
       <?php (TEMPLATE)::footer();?>     
	</body>
</html>