<!DOCTYPE html>
<html>
	<head>
		<meta charset="${encoding}">
		<title>Insert title here</title>
	</head>
	<body>
       	<h2>Detalles de mascota</h2>
        <h3><?=$mascota->nombre?></h3>
        
        <p><b>Sexo:</b> <?=$mascota->sexo ?></p>
        <p><b>Biografia:</b> <?=$mascota->biografia?></p>
        <p><b>FechaNacimiento:</b> <?=$mascota->fechaNacimiento?></p>
        <p><b>FecahFallecimiento:</b> <?=$mascota->fechaFallecimiento?></p>
        <p><b>idUsuario:</b> <?=$mascota->idUsuario?></p>
        <p><b>idRaza:</b> <?=$mascota->idRaza?></p>

<?php  var_dump($fotos);
    if(sizeof($fotos)>0) {
            foreach($fotos as $foto){?> 
              <p><b>Fichero:</b> <?=$foto->fichero?><p>  
              <p><b>Ubicacion:</b><?=$foto->ubicacion?></p> 
              <p><b>idmascota:</b><?=$foto->idmascota?></p>          
        <?php }
    }?>
        
        <a href="/mascota/edit<?=$mascota->id?>">Editar mascota</a> -
        <a href="/mascota/delete<?=$mascota->id?>">Borrar mascota</a> -
        <a href="/mascota/list">Lista de mascotas</a>
	</body>
</html>