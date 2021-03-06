<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="../../css/estilo.css">
		<title>Actualizar</title>
	</head>
	<body>
	<?php 
	       (TEMPLATE)::header("Mascotas");
	       (TEMPLATE)::nav();
	       (TEMPLATE)::login();?>
	    
		<h2>Formulario de actualización mascotas</h2>
		
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
    		
    		<input type="hidden" name="idUsuario" value="<?=$mascota->idUsuario?>"><br> 
    		
    		<input type="hidden" name="idRaza" value="<?=$mascota->idRaza?>"><br>  
    		<input type="submit" name="actualizar" value="Actualizar">
		</form>
		
		<a href="/mascota/show/<?=$mascota->id?>">Detalles</a> - 
		<a href="/mascota">Volver al listado</a>
		
	<?php 
	       (TEMPLATE)::footer();?>
	</body>
</html>