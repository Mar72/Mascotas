<!DOCTYPE html>
<html>
	<head>
		<meta charset="${encoding}">
		<link rel="stylesheet" type="text/css" href="../../css/estilo.css">
		<title>Insert title here</title>
	</head>
	<body>
	<?php 
	   (TEMPLATE)::header("Usuarios");
	   (TEMPLATE)::nav();
	   (TEMPLATE)::login();
	   ?>
	   
		<h2>Confirmar borrado</h2>
		
		<form method="post" action="/mascota/destroy">
			
			<p>Confirmar el borrado de la mascota <?=$mascota->nombre?>.</p>
			
			<input type="hidden" name="id" value="<?=$id?>">
			
			<input type="submit" name="borrar" value="Borrar">
		</form>
		
		<a href="/mascota/list">Volver al listado</a>
	<?php 
	   (TEMPLATE)::footer();?>
	</body>
</html>