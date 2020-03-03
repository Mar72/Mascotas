<?php

    // Fichero config.php
    
    // PARA EL AUTOLOAD
    $classmap=['controllers','models','libraries','templates']; // directorios donde buscar clases

    // TEMPLATE A USAR EN LAS VISTAS
    define('TEMPLATE','Basic');
    
    // PARAMETROS DE CONFIGURACION BDD 
    define('DB_HOST','83.247.137.2');    // host
    define('DB_USER','alumne');       // usuario
    define('DB_PASS','');             // password
    define('DB_NAME','ej_mascotas');   // base de datos
    define('DB_CHARSET','utf8');      // codificación
    
    // conector que debe usar PDO,solamente si hemos visto PDO además de mysqli 
    // (dependerá del curso)
    define('SGDB','mysql'); 
    
    // CONTROLADOR Y METODO POR DEFECTO
    define('DEFAULT_CONTROLLER', 'Welcome');
    define('DEFAULT_METHOD', 'index');
    
    // PARA EL ENVIO DE MAIL DE CONTACTO
    define('CONTACT_EMAIL', 'robertsallent@gmail.com');
    
    
    
    
    
    