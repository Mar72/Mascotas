<?php 
class Tipo{
  //PROPIEDADES
  public $id=0, $nombre='',$descripcion='';
  
  //recuperar un tipo por su id
  public static function get(int $id=0){
     $consulta = "SELECT * FROM tipos WHERE id=$id";
     return DB::select($consulta, self::class);
  }
  
  //recupera el tipo asociado a la raza
  public function getTipo():?Raza{
	$consulta = "SELECT * FROM razas WHERE idTipo=$this->id";
	return DB::select($consulta,'Raza');  
  }
  //nueva foto
  public function guardar(){
     $consulta="INSERT INTO tipos (id, nombre, descripcion)
                VALUES ($this->id,$this->nombre,$this->descripcion)";
     return DB::insert($consulta);           
  }
  //borrar tipo
  public static function borrar(int $id){
	$consulta="DELETE FROM tipos WHERE id=$id"; 
	return DB::delete($consulta); 
  }
  
  //toString
  public function __toString():string{
		return "$this->id: $this->nombre $this->descripcion";
  }
}
