class Foto{
  //PROPIEDADES
  public $id=0, $fichero='',$ubicacion='',$idmascota=0;
  
  //recuperar una foto por su id
  public static function get(int $id=0)?Foto{
     $consulta = "SELECT * FROM fotos WHERE id=$id";
     return DB::select($consulta, self::class);
  }
  
  //recupera la mascota a la que pertenece la foto
  public function getMascota():?Mascota{
	$consulta = "SELECT * FROM mascotas WHERE id=$this->idMascota";
	return DB::select($consulta,'Mascota');  
  }
  //nueva foto
  public function guardar(){
     $consulta="INSERT INTO fotos (id, fichero, ubicacion,idmascota)
                VALUES ($this->id,$this->fichero,$this->ubicacion,$this->idmascota)";
     return DB::insert($consulta);           
  }
  //borrar foto
  public static function borrar(int $id){
	$consulta="DELETE FROM fotos WHERE id=$id"; 
	return DB::delete($consulta); 
  }
  
  //toString
  public function __toString():string{
		return "$this->id: $this->fichero $this->ubicacion de $this->idmascota";
  }
}
