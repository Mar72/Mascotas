<!DOCTYPE html>
<html>
	<head>
		<meta charset="${encoding}">
		<title>Nueva mascota</title>
	</head>
	<body>
	    <?php 
	    Basic::header();
	    Basic::nav();?> 
		<h2>Nueva mascota</h2>
		
		<form method="post" action="/mascota/store" enctype="multipart/form-data">
		    <label>Nombre</label>
			<input type="text" name="nombre"><br>
			<label>Sexo</label>
			<input type="text" name="sexo"><br>
			<label>Biografia</label>
			<input type="text" name="biografia"><br>
			<label>fecha nacimiento</label>
			<input type="text" name="fechaNacimiento"><br>
			<label>fecha fallecimiento</label>
			<input type="text" name="fechaFallecimineto"><br>
			<?php if (Login::hasPrivilege(500)) {?> 
  				<label>idUsuario</label>
				<input type="text" name="idUsuario"><br>
			<?php }?>	
			<select name="razaTipo">
				<?php 
				    foreach ($razas as $raza)
				        echo "<option value='$raza->id' >$raza->id $raza->tipo $raza->raza </option>";
				?>
			</select><br>
			<label>Foto Mascota</label>
			<input type="file" name="imagen"><br>
			<label>Ubicación: </label>
			<input type="text" name="ubicacion"><br>
			 
			<input type="submit" name="guardar" value="Guardar">
		</form>
		
		<a href="/mascota/list">Volver el listado</a>
		<?php Basic::footer();?> 
	</body>
</html>