<!DOCTYPE html>
<html>
	<head>
		<meta charset="${encoding}">
		<title>Nueva mascota</title>
	</head>
	<body>
		<h2>Nueva mascota</h2>
		
		<form method="post" action="/mascota/store" enctype="multipart/form-data"> 
			<label>Nombre</label>
			<input type="text" name="nombre"><br>
			<label>Sexo</label>
			<input type="text" name="sexo"><br>
			<label>Biografia</label>
			<input type="text" name="biografia"><br>
			<label>fechaNacimiento</label>
			<input type="text" name="fechaNacimiento"><br>
			<label>fechaFallecimiento</label>
			<input type="text" name="fechaFallecimineto"><br>
			<label>idUsuario</label>
			<input type="text" name="idUsuario"><br>
			<label>idRaza</label>
			
			<select name="raza">
				<?php var_dump($razas);
				    foreach ($razas as $raza)
				        echo "<option value='$raza->id'> $raza->tipo $raza->raza </option>";
				?>
			</select><br>
			<label>Foto Mascota</label>
			<input type="file" name="imagen"><br>
			
			<input type="submit" name="guardar" value="Guardar">
		</form>
		
		<a href="/mascota/list">Volver el listado</a>
	</body>
</html>