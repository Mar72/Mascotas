<!DOCTYPE html>
<html>
	<head>
		<meta charset="${encoding}">
		<link rel="stylesheet" type="text/css" href="../../css/estilo.css">
		<title>Lista de mascotas</title>
	</head>
	<body>
	    <?php 
	    (TEMPLATE)::header("Mascota");
	    (TEMPLATE)::nav();
	    (TEMPLATE)::login();
	    ?>
		<h2>Lista de mascotas</h2>

		<table border="1">
			<tr>
				<th>Nombre</th>
				<th>sexo</th>
				<th>Biografia</th>
				<th>FechaNacimiento</th>
				<th>fechaFallecimiento</th>
				<th>idUsuario</th>
				<th>idRaza</th>
				<th>Operaciones</th>
    		</tr>
    		
    		<?php foreach($mascotas as $mascota){
                 echo "<tr>";
                 echo "<td>$mascota->nombre</td>";  
                 echo "<td>$mascota->sexo</td>";
                 echo "<td>$mascota->biografia</td>";
                 echo "<td>$mascota->fechaNacimiento</td>";
                 echo "<td>$mascota->fechaFallecimiento</td>";
                 echo "<td>$mascota->idUsuario</td>";
                 echo "<td>$mascota->idRaza</td>";
                 echo "<td>";
                 echo " <a href='/mascota/show/$mascota->id'>Ver</a>";
            
                  
             
                  if (Login::hasPrivilege(500) || Login::get() && $mascota->idUsuario == Login::get()->id ) {               
                
                    echo "- <a href='/mascota/edit/$mascota->id'>Actualizar</a>";
                    echo "- <a href='/mascota/delete/$mascota->id'>Borrar</a>";
                  }
                     
                 
            echo "</td>";
            echo "</tr>";
               
    }?>
</table>
      <?php (TEMPLATE)::footer();?>
</body>
</html>