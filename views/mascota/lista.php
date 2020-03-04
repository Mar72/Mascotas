<h2>Lista de mascotas</h2>

<table border="1">
	<tr>
		<th>Nombre</th>
		<th>sexo</th>
		<th>Biografia</th>
		<th>FechaNacimiento</th>
    </tr>
    <?php $usuario = Login::get();?>
    <?php foreach($mascotas as $mascota){
            echo "<tr>";
            echo "<td>$mascota->nombre</td>";  
            echo "<td>$mascota->sexo</td>";
            echo "<td>$mascota->editorial</td>";
            echo "td>";
            echo " <a href='/mascota/show/$mascota->id'>Ver</a>";
            if(!empty($usuario)){
                if  (($mascota->idUsuario == $usuario->id) || Login::hasprivile(500)){
             
                    echo   "- <a href='/mascota/edit/$mascota->id'>Actualizar</a>";
                    echo "- <a href='/mascota/delete/$mascota->'id>Borrar</a>";
                }
            }
            echo "</td>";
            echo "</tr>";
               
    }?>
</table>