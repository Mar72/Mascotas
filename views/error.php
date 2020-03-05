
    <!DOCTYPE html>
    <html>
    	<head>
    		<meta charset="UTF-8">
    		<link rel="stylesheet" type="text/css" href="../css/estilo.css">
    		<title>Error</title>
    	</head>
    	
    	<body>
    		<?php 
    		  (TEMPLATE)::header("Error");
    		  (TEMPLATE)::nav();
    		  (TEMPLATE)::login();
    		?>  
    		
    		<h2>Error en la operación solicitada</h2>
    
    		<p class='error'><?=$mensaje?></p>
    		
    		<?php 
    		  (TEMPLATE)::footer();
    		?>
    	</body>
    	
    </html>

