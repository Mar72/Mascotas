<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Borrar foto de mascota</title>
	</head>
	<body>
		<h2>Confirmar borrado</h2>
		
		<p>Estás a punto de borrar la boto <?=$foto->id?> 
		   de la mascota <?=$mascota->nombre;?>.</p> 
		<form method="post" action="/foto/destroy">
		    <label>Por favor, confirma el borrado; </label>
		    <input type="hidden" name="id" value=<?=$foto->id?>"> 
		    
		    <input type ="submit" name="borrar" value="Borrar">
		</form> 
		<br> 
		<a href="/mascota/show/<?=$mascota->id?>">Volver a detalles de la mascota</a>      	
	</body>
</html>