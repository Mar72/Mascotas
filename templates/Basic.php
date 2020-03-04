<?php

    class Basic{        
        // pone el header
        public static function header(string $pagina = ''){?>
               <header>
               		<h1>WebMascotas</h1>
               		<h2><?=$pagina?></h2>
               </header>
        <?php }
        
        // pone el nav
        public static function nav(){?>
           <?php $usuario=Login::get();?>
        	<nav id="menu">
                <ul>
        			<li><a href="/">Inicio</a></li>
        			<li><a href="/contacto">Contactar</a></li>
        	
        			<li><a href="/mascota/list">Ver mascotas</a>
                    <?php if(!empty($usuario) && !Login::isAdmin()) {?>         			
        			  <li><a href="/mascota/listUser/<?=$usuario->id?>">Ver sus mascotas</a>
        			  <li><a href="/mascota/create">Añadir mascota</a>
        			<?php }?>  
        		</ul>
        		
        		<?php if(Login::isAdmin()){?>
              		<ul>
            			<li><a href="/usuario/list">Lista de usuarios</a></li>
            		</ul>
            		
        		<?php }?>
            </nav>
        <?php }
        
        // pone el login/logout
        public static function login(){
            // recupera el usuario identificado mediante el modelo Login
            $identificado = Login::get();

            echo "<div id='login'>";
            
            // el enlace depende de si el usuario está identificado o no
            echo $identificado ?
                "Hola <a href='/usuario/show/$identificado->id'>$identificado->usuario</a>, 
                      <a href='/login/logout'>salir</a>" :
                "<a href='/login'>Identificarse</a> - <a href='/usuario/create'>Registro</a>";
            
            echo "</div>";
        }
        
        // pone el footer
        public static function footer(){?>
            <footer>
            	<p>WebMascotas 2020</p>
            	<p>Mar y Hanane</p>
            </footer>
        <?php }
    }
    
    
    
