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

        if(!empty($usuario)&&($usuario->id!=$idu))
            throw new Exception ('No estás registrado para ver tus mascotas');
        // recuperar la lista de mascotas
        $mascotas = Mascota::getUser($idu);
        $fotos = Mascota::getMascotasUser($idu);
        
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
        $fotos = Mascota::getFotos($id);  
       // cargar la vista de detalles
       include 'views/mascota/detalles.php';
    }
    //GUARDAR SE HACE EN DOS PASOS
    
    //PASO 1: muestra el formulario de nueva mascota
    public function create(){
        
        $usuario= Login::get();
                          
        if (empty($usuario) || Login::isAdmin() )
            throw new Exception ("No estás registrado para subir una mascota");
        
        $razas = Raza::getRazaTipo();
      
        include 'views/mascota/nuevo.php';
    }
    
    // PASO 2: guarda la nueva mascota
    public function store(){
        
        //comprueba que llegue el formulario con los datos
            if(empty($_POST['guardar']))
                throw new Exception('No se recibieron datos');
        
            $mascota = new Mascota(); // crea una nueva mascota
            
            //recupera los datos del formularoi que llegan por POST
            $mascota->nombre = DB::escape($_POST['nombre']);
            $mascota->sexo = DB::escape($_POST['sexo']);
            $mascota->biografia = DB::escape($_POST['biografia']);
            $mascota->fechaNacimiento = $_POST['fechaNacimiento']; 
            $mascota->fechaFallecimiento = $_POST['fechaFallecimiento'];
            if (Login::hasPrivilege(500)) $mascota=intval($_POST['idUsuario']); 
            else $mascota->idUsuario = Login::get()->id;
            $mascota->idRaza = intval($_POST['razaTipo']);                            
                  
            if(!$mascota->guardar()) //gaurda la mascota en BDD
                  throw new Exception("No se pudo guardar $mascota->nombre");
            
            $mensaje="Guardado de mascota $mascota->nombre correcto.";
            include 'views/exito.php'; // muestra la vista de éxito
            
    
}
    // ACTUALIZAR SE HACE EN DOS PASOS
  // PASO 1: muestra e formulario de edicón de una mascota
  public function edit(int $id=0){
      // comprobar que llega el id de mascota a editar
      if(!$id)
          throw new Exception("No se indicó la mascota.");
      
     // recuperar la mascota con dicho identificador
     $mascota=Mascota::getMascota($id);
  
     //restringue el acceso
     if (!Login::get() || Login::get()->id!= $mascota->idUsuario)
         throw new Exception ("No tienes permitida esta operación.");
     
     // comprueba eue la mascota se pudo recuperar de la BDD
     if(!$mascota)
          throw new Exception("No exite la mascota $id.");
              
     // carga la vistade formulario
     include 'views/mascota/actualizar.php';
  }
  //PASO 2: aplica los cambios a mascota
  public function update(){
      
      //comprueba wue llegue el formulario con los datos
      if(empty($_POST['actualizar']))
          throw new Exception('No se recibieron datos');
      
      // podemos crear una nueva mscota o recuperae la de BDD,
      // ha optado por crear una nueva porque me ahorro una consulta.
      $mascota = new Mascota(); //nuava mascota
      
      $mascota->id = intval($_POST['id']); //recfuperar el id vía POST
      
      //recuperar el resto de campos
      $mascota->nombre = DB::escape($_POST['nombre']); 
      $mascota->sexo = DB::escape($_POST['sexo']);
      $mascota->biografia = DB::escape($_POST['biografia']);
      $mascota->fechaNacimiento = $_POST['fechaNacimiento'];
      $mascota->fechaFallecimiento = $_POST['fechaFallecimiento'];
      $mascota->idUsuario = intval($_POST['idUsuario']);
      $mascota->idRaza = intval($_POST['idRaza']);
      
      // intenta realizar la actualizacion de datos
      if($mascota->actualizar()===false)
          throw new Exception("No se pudo actualizar $mascota->nombre");
      
      // prepara un mensaje 
      $GLOBALS['mensaje'] = "Actualización de mascota $mascota->nombre correcta.";
      
      // repite la operacion edit, así mantendra el usuario en la vista de edicion.
      $this->edit($mascota->id);
    
  }
  //ELIMINAR SE HACE EN DOS PASOS 
  //(si queremos hacerlo con formulario de confirmación) 
  
  //PASO 1: muestra el formulario de confirmación de eliminación 
  public function delete(int $id=0){
      //comprueba que me llega el identificador 
      if(!$id) 
          throw new Exception("No se indicó la mascota a borrar."); 
      
      //recupera la mascota con dicho identificador 
      $mascota = Mascota::getMascota($id); 
      
      //comprueba que la mascota existe 
      if(!$mascota) 
          throw new Exception ("No existe la mascota $id.");
      
      //ir al formulario de confirmación 
      include 'views/mascota/borrar.php';
  }
  //PASO 2: eliminar la mascota 
  public function destroy(){
      //comprueba que llegue el formulario de confirmación 
      if(empty($_POST['borrar'])) 
          throw new Exception("No se recibió confirmación"); 
      
          //recupera el identificador bía POST
          $id = intval($_POST['id']); 
          
          //intenta borrar la mascota de la BDD 
          if(Mascota::borrar($id)==false) 
              throw new Exception("No se pudo borrar"); 
          
          //muestra la vista de éxito 
          $mensaje="Borrado de la mascota $id correcto."; 
          include 'views/exito.php';  //mostrar éxito
  }
  
}
    