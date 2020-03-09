<?php
class Mascota {
    
    // PROPIEDADES
    public $id = 0, $nombre = '', $sexo = 'M', $biografia = '', $fechaNacimiento = '', 
    $fechaFallecimiento = NULL, $idUsuario=0, $idRaza = 0;
    
    // MÉTODOS DEL CRUD
    // recuperar todas las mascotas
    public static function get(): array {
        $consulta = "SELECT * FROM mascotas"; // preparar la consulta
        return DB::selectAll($consulta, self::class);
    }
    
    // recuperar una mascota concreta por id
    public static function getMascota(int $id): ?Mascota  {
        $consulta = "SELECT m.*,u.nombre as nUsuario, 
                     r.nombre as nRaza, t.nombre as nTipo  
                     FROM mascotas m INNER JOIN usuarios u 
                     INNER JOIN razas r INNER JOIN tipos t 
                     WHERE m.id=$id AND m.idusuario=u.id 
                     AND m.idRaza=r.id AND r.idTipo=t.id"; // preprara la consulta
        return DB::select($consulta, self::class); // ejecutar y retornar el resultado
    }
    public static function getFotos($idm):array{
        $consulta= "SELECT m.*, f.id, f.fichero, f.ubicacion, f.idmascota 
                    FROM mascotas m INNER JOIN fotos f
                    WHERE m.id=f.idmascota AND m.id=$idm";
       return DB::selectAll($consulta, self::class);
    }
    public static function getUser($idu):array{
        $consulta= "SELECT u.nombre, u.apellido1, u.apellido2, m.* 
                    FROM usuarios u INNER JOIN mascotas m
                    WHERE u.id=m.idUsuario AND u.id=$idu";
       return DB::selectAll($consulta, self::class);
    }

    public static function getMascotasUSer($idu):?array{
        $consulta="SELECT u.nombre, u.apellido1,u.apellido2,
                   m.*,f.id, f.fichero,f.ubicacion, f.idmascota
                   FROM usuarios u INNER JOIN mascotas m 
                   INNER JOIN fotos f
                   WHERE u.id=$idu AND u.id=m.idUsuario AND m.id=f.idmascota";
        return DB::selectAll($consulta, self::class); 
    }
    public function guardar()
    { // insertar una nueva mascota
        if (empty($this->fechaFallecimiento)) {
           $consulta = "INSERT INTO mascotas (nombre,sexo,biografia,
                        fechaNacimiento, fechaFallecimiento, idUsuario, idRaza)
                        VALUES('$this->nombre','$this->sexo','$this->biografia',
                               '$this->fechaNacimiento', NULL,      
                                $this->idUsuario, $this->idRaza)";
        }
        else {
            $consulta = "INSERT INTO mascotas (nombre,sexo,biografia,
                        fechaNacimiento, fechaFallecimiento, idUsuario, idRaza)
                        VALUES('$this->nombre','$this->sexo','$this->biografia',
                               '$this->fechaNacimiento', '$this->fechaFallecimiento', 
                                $this->idUsuario, $this->idRaza)";
        }
    
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
        if (empty($this->fechaFallecimiento)) {
      // preparar consulta
          $consulta = "UPDATE mascotas SET
                       nombre='$this->nombre',
                       sexo='$this->sexo',
                       biografia='$this->biografia',
                       fechaNacimiento='$this->fechaNacimiento',
                       fechaFallecimiento=NULL,
                       idUsuario=$this->idUsuario,
                       idRaza=$this->idRaza
                   WHERE id=$this->id";
        }
        else {
            $consulta = "UPDATE mascotas SET
                      nombre='$this->nombre',
                      sexo='$this->sexo',
                      biografia='$this->biografia',
                      fechaNacimiento='$this->fechaNacimiento',
                      fechaFallecimiento='$this->fechaFallecimiento',
                      idUsuario=$this->idUsuario,
                      idRaza=$this->idRaza
                   WHERE id=$this->id";
        }
        echo $consulta;
        return DB::update($consulta);
        
    }
    
    // recuperar mascotas con un filtro avanzado
    public static function getFiltered(string $campo = 'nombre', string $valor = '', string $orden = 'id', string $sentido = 'ASC'): array 
    {
        $consulta = "SELECT m.*
               FROM mascotas m 
               WHERE $campo LIKE '%$valor%'
               ORDER BY $orden $sentido";
        
        return DB::selectAll($consulta, self::class);
    }
}
