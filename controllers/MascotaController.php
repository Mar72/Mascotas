<?php
// CONTROLADOR mascotaController
class MascotaController{
    
    //operación por defecto
    public function index(){
        $this->list(); // redirige a la lista de mascotas
    }
    
    // operacion para listar todas  las mascotas
    public function list(){
        // recuperar la lista de mascotas
        $mascotas = Mascota::get();
    
    
    //cargar la vista que muesta el listado
    include 'views/mascota/lista.php';
    
    }
    
    // operacion para listar todas  las mascotas
    public function listUser($idu){
        $usuario = Login::get();
  echo $usuario->id;
  echo $idu;
        if(!empty($usuario)&&($usuario->id!=$idu))
            throw new Exception ('No estas registrado para ver tus mascotas');
        // recuperar la lista de mascotas
        $mascotas = Mascota::getUser();
        
        
        //cargar la vista que muesta el listado
        include 'views/mascota/listaUser.php';
        
    }
    // método para mostrar los detalles de una mascota
    public function show(int $id=0){
        // comprobar que recibimos el id de mascota por parámetro 
        if(!$id)
            throw new Exception("No se indicó la mascta.");
        // recuperar la mascota con dicho código
        $mascota = Mascota::getMascota($id);
        
        // comprobar que la mascota se haya recuperado correctamente de la BDD
        if(!$mascota)
            throw new Exception("No se ha encontrado la mascota $id.");
        
       // cargar la vista de detalles
       include 'views/mascota/detalles.php';
    }
    //GUARDAR SE HACE EN DOS PASOS
    
    //PASO 1: muestra el formulario de nuevo libro
    public function create(){
        include 'views/mascota/nuevo.php';
    }
}
    