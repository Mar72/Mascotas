<?php
class Mascota {
    
    // PROPIEDADES
    public $id = 0, $nombre = '', $sexo = 'M', $biografia = '', $fechaNacimiento = '', 
    $fechaFallecimiento = '', $idUsuario=0, $idRaza = 0;
    
    // MÉTODOS DEL CRUD
    // recuperar todas las mascotas
    public static function get(): array {
        $consulta = "SELECT * FROM mascotas"; // preparar la consulta
        return DB::selectAll($consulta, self::class);
    }
    
    // recuperar una mascota concreta por id
    public static function getMascota(int $id): ?Mascota  {
        $consulta = "SELECT * FROM mascotas WHERE id=$id"; // preprara la consulta
        return DB::select($consulta, self::class); // ejecutar y retornar el resultado
    }
    public static function getFotos($idm):array{
        $consulta= "SELECT m.*, f.id, f.fichero, f.ubicacion 
                    FROM mascotas m LEFT JOIN fotos f
                    WHERE m.id=f.idmascota";
       return DB::selectAll($consulta, self::class);
    }
    public static function getUser($idu):array{
        $consulta= "SELECT u.nombre, u.apellido1, u.apellido2, m.* 
                    FROM usuarios u LEFT JOIN mascotas m
                    WHERE u.id=m.idUsuario";
       return DB::selectAll($consulta, self::class);
    }

    public function guardar()
    { // insertar una nueva mascota
        $consulta = "INSERT INTO mascota (nombre,sexo,biografía,
                     fechaNacimiento, fechaFallecimiento, idUsuario, idRaza)
                   VALUES('$this->nombre','$this->sexo',$this->biografia,
                           '$this->fechaNacimiento', $this->idUsuario, $this->idRaza)";
        return DB::insert($consulta, self::class);
    }

    public static function borrar(int $id)
    { // borrar una mascota por id
      // prerparar consulta
        $consulta = "DELETE FROM mascotas WHERE id=$id";
        // ejecutar consulta
        return DB::delete($consulta);
    }

    public function actualizar()
    { // actualizar una mascota
      // preparar consulta
        $consulta = "UPDATE mascotas SET
                      nombre='$this->nombre',
                      sexo='$this->sexo',
                      biografia='$this->biografia',
                      fechaNacimiento='$this->fechaNacimiento',
                      fechaFallecimiento='$this->fechaFallecimiento',
                      idUsuario=$this->idUsuario
                   WHERE id=$this->id";

        return DB::update($consulta);
    }
    
}
