<?php 
class Raza{
  //PROPIEDADES
  public $id=0, $nombre='',$descripcion='',$idTipo=0;
  
  //recuperar una raza por su id
  public static function get(int $id=0){
     $consulta = "SELECT * FROM razas WHERE id=$id";
     return DB::select($consulta, self::class);
  }
  
  //recupera la raza a la que pertenece la mascota
  public function getRaza():?Mascota{
	$consulta = "SELECT * FROM mascotas WHERE idRaza=$this->id";
	return DB::select($consulta,'Mascota');  
  }
  
  public function getRazaTipo (){
     $consulta = "SELECT r.id, r.nombre as raza, t.nombre as tipo 
                  FROM razas r INNER JOIN tipos t
                  WHERE r.idTipo=t.id";

     return DB::selectAll($consulta, self::class);
  }
  //nueva foto
  public function guardar(){
     $consulta="INSERT INTO razas (id, nombre, descripcion,idTipo)
                VALUES ($this->id,$this->nombre,$this->descripcion,$this->idTipo)";
     return DB::insert($consulta);           
  }
  //borrar foto
  public static function borrar(int $id){
	$consulta="DELETE FROM razas WHERE id=$id"; 
	return DB::delete($consulta); 
  }
  
  //toString
  public function __toString():string{
		return "$this->id: $this->nombre $this->descripcion $this->idTipo";
  }
}
