<!DOCTYPE html>
<html>
	<head>
		<meta charset="${encoding}">
		<title>Insert title here</title>
	</head>
	<body>
		<h2>Confirmar borrado</h2>
		
		<form method="post" action="/mascota/destroy">
			
			<p>Confiramr el borrado de la mascota <?=$mascosta->nombre?>.</p>
			
			<input type="hidden" name="id" value="<?=$id?>">
			
			<input type="submit" name="borrar" value="Borrar">
		</form>
		
		<a href="/mascota/list">Volver al listado</a>
	</body>
</html>