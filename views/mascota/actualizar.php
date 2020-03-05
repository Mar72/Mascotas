<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Actualizar</title>
	</head>
	<body>
		<h2>Formulario de edición</h2>
		
		<?=empty($GLOBALS['mensaje'])?"": "<p>". $GLOBALS['mensaje']."</p>"?>
		
		<form method="post"action="/mascota/update">
    		<input type="hidden" name="id" value="<?=$mascota->id?>">
    		<label>Nombre</label>
    		<input type="text"  name="nombre" value="<?=$mascota->nombre?>"><br> 
    		<label>Sexo</label>
    		<input type="text" name="sexo" value="<?=$mascota->sexo?>"><br> 
    		<label>Biografia</label>
    		<input type="text" name="biografia" value="<?=$mascota->biografia?>"><br> 
    		<label>fechaNacimiento</label>
    		<input type="text" name="fechaNacimiento" value="<?=$mascota->fechaNacimiento?>"><br> 
    		<label>fechaFallecimiento</label>
    		<input type="text" name="fechaFallecimiento" value="<?=$mascota->fechaFallecimiento?>"><br> 
    		<label>idUsuario</label>
    		<input type="text" name="idUsuario" value="<?=$mascota->idUsuario?>"><br> 
    		<label>idRaza</label>
    		<input type="text" name="idRaza" value="<?=$mascota->idRaza?>"><br> 
    		<input type="submit" name="actualizar" value="Actualizar">
		</form>
		
		<a href="/mascota/show/<?=$mascota->id?>">Detalles</a> - 
		<a href="/mascota">Volvel al listado</a>
	</body>
</html>