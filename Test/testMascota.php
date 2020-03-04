
<?php
include '../config/config.php';
include '../libraries/DB.php';
include '../models/Mascota.php';

// comprobación del método guardar()
echo "<h2>guardar()</h2>";

$mascota = new Mascota();
$mascota->nombre = 'Pirata';
$mascota->sexo = 'M';
$mascota->biografia = 'Me encantan los huesos';
$mascota->fechaNacimiento = '2019/10/7';
$mascota->fechaFallecimiento='';
$mascota->idUsuario = 3;
$mascota->idRaza=1;
echo $mascota->guardar() ? 'Éxito' : 'Error';

// comprobación del método get()
echo "<h2>get()</h2>";
echo "<pre>";
var_dump(Mascota::get());
echo "</pre>";

// comprobación del método getMascota($id)
echo "<h2>getMascota</h2>";
echo "<pre>";
var_dump(Mascota::getMascota(4));
echo "</pre>";

echo "<h2>getUSer</h2>";
echo "<pre>";
var_dump(Mascota::getUser(3));
echo "</pre>";

// comprobación del método getFiltered()
echo "<h2>getFiltered</h2>";
echo "<pre>";
var_dump(Mascota::getFiltered('nombre', 'Pirata'));
echo "</pre>";

// comprobación del método actualizar()
echo "<h2>actualizar()</h2>";
$mascotas = Mascota::getFiltered('nombre', 'Pirata');
$mascotas[0]->biografia = 'mi afición es perseguir lindos gatitos';
echo $mascotas[0]->actualizar() ? 'Éxito' : 'Error';

echo "<pre>";
var_dump(Mascota::getFiltered('nombre', 'Pirata', 'biografia', 'ASC'));
echo "</pre>";

// comprobación del método getUser($idu)
echo "<h2>getUser()</h2>";
echo "<pre>";
var_dump(Mascota::getUser(3));
echo "</pre>";

//comprobación del método getFotos($idm)
echo "<h2>getFotos($idm)</h2>";
echo "<pre>";
var_dump(Mascota::getFotos(1));
echo "<pre>";

// comprobación del método borrar()
//echo "<h2>borrar()</h2>";
//$mascotas = Mascota::getFiltered('nombre', 'Pirata');
//echo Mascota::borrar($anuncios[0]->id) ? 'Éxito' : 'Error'; 

