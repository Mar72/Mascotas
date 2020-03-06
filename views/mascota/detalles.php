<!DOCTYPE html>
<html>
	<head>
		<meta charset="${encoding}">
		<link rel="stylesheet" type="text/css" href="../../css/estilo.css">
		<title>Detalles de una mascota</title>
	</head>
	<body>
	    <?php 
	    Basic::header();
	    Basic::nav();?>
       	<h2>Detalles de mascota</h2>
        <h3><?=$mascota->nombre?></h3>
        
        <p><b>Sexo:</b> <?=$mascota->sexo ?></p>
        <p><b>Biografia:</b> <?=$mascota->biografia?></p>
        <p><b>FechaNacimiento:</b> <?=$mascota->fechaNacimiento?></p>
        <p><b>FecahFallecimiento:</b> <?=$mascota->fechaFallecimiento?></p>
        <p><b>idUsuario:</b> <?=$mascota->idUsuario?></p>
        <p><b>idRaza:</b> <?=$mascota->idRaza?></p>

<?php  
    if(sizeof($fotos)>0) {
            foreach($fotos as $foto){?>  
                <figure class="portada">
	             <?php echo "<img height='100' src='/$foto->fichero' alt='foto'>";
	                   echo "Foto $foto->fichero <a href='/foto/delete/$foto->id'>Borrar</a>";
	                   
                 ?>   
	           </figure>
               
              <p><b>Ubicacion:</b><?=$foto->ubicacion?></p> 
              <p><b>id mascota:</b><?=$foto->idmascota?></p>          
        <?php  } 
    } else echo "Sin fotos";?>
        
        <a href="/mascota/createFotos/<?=$mascota->id?>">Subir fotos</a>
        <a href="/mascota/edit<?=$mascota->id?>">Editar mascota</a> -
        <a href="/mascota/delete<?=$mascota->id?>">Borrar mascota</a> -
        <a href="/mascota/list">Lista de mascotas</a>
        <?php Basic::footer();?>
	</body>
</html>