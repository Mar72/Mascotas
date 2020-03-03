<?php
class Mascota {
    
    // PROPIEDADES
    public $id = 0, $nombre = '', $sexo = 'M', $biografia = '', $fechaNacimiento = '', 
    $fechaFallecimiento = '', $idUsuario=0, $idRaza = 0;
    
    // MÉTODOS DEL CRUD
    // recuperar todas las mascotas
    public static function get(): array
    {
        $consulta = "SELECT * FROM mascotas"; // preparar la consulta
        return DB::selectAll($consulta, self::class);
    }
    
    // recuperar una mascota concreta por id
    public static function getMascota(int $id): ?Mascota  
    {
        $consulta = "SELECT * FROM mascotas WHERE id=$id"; // preprara la consulta
        return DB::select($consulta, self::class); // ejecutar y retornar el resultado
    }
    public static function getUser($idUser):array{
        $consulta= "SELECT m.*, f.id, f.fichero, f.ubicacion 
                    FROM mascotas m LEFT JOIN fotos f
                    WHERE m.id=f.idmascota";
    }
    
}