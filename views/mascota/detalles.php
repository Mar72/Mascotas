<!DOCTYPE html>
<html>
	<head>
		<meta charset="${encoding}">
		<link rel="stylesheet" type="text/css" href="../../css/estilo.css">
		<title>Detalles de una mascota</title>
	</head>
	<body>
	    <?php 
	        (TEMPLATE)::header("Mascotas");
	        (TEMPLATE)::nav();
	        (TEMPLATE)::login();
	        ?>
       	<h2>Detalles de mascota</h2>
        <h3><?=$mascota->nombre?></h3>
        
        <p><b>Sexo:</b> <?=$mascota->sexo ?></p>
        <p><b>Biografia:</b> <?=$mascota->biografia?></p>
        <p><b>FechaNacimiento:</b> <?=$mascota->fechaNacimiento?></p>
        <p><b>FecahFallecimiento:</b> <?=$mascota->fechaFallecimiento?></p>
        <p><b>Usuario:</b> <?=$mascota->nUsuario?></p> 
        <p><b>Raza:</b> <?=$mascota->nRaza?></p> 
        <p><b>Tipo:</b> <?=$mascota->nTipo?></p> 

<?php  
    if(sizeof($fotos)>0) {?> 
            <p><b>idmascota:</b><?=$fotos[0]->idmascota?></p> 
            <div class="flex-container">
            <?php foreach($fotos as $foto){?>  
                <figure class="flex1">
	             <?php echo "<img height='200' width='200' src='/$foto->fichero' alt='foto'>";
	                   if ((Login::get() && Login::get()->id=$mascota->idUsuario) ||
	                       Login::hasPrivilege(500))
	                           echo "<a href='/foto/delete/$foto->id'>Borrar</a>";
	                   
                 ?>   
                 <figcaption><?=$foto->ubicacion?></figcaption> 
	           </figure>                     
                       
        <?php  }?>  
           </div> 
    <?php } else echo "Sin fotos";
    if (Login::get() && Login::get()->id=$mascota->idUsuario) {?>  
        <a href="/foto/createFotos/<?=$mascota->id?>">Subir fotos</a>
     <?php }?>   
    <?php if ((Login::get() && Login::get()->id=$mascota->idUsuario) ||
         Login::hasPrivilege(500)){?>     
        <a href="/mascota/edit/<?=$mascota->id?>">Editar mascota</a> - 
        <a href="/mascota/delete/<?=$mascota->id?>">Borrar mascota</a> -
    <?php }?>     
   
        <a href="/mascota/list">Lista de mascotas</a>
        <?php 
            (TEMPLATE)::footer();?>
	</body>
</html>