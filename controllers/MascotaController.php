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
            throw new Exception ('No estas registrado para ver tus mascotas');
        // recuperar la lista de mascotas
        $mascotas = Mascota::getUser($idu);        
        
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
        if (empty($usuario) || Login::isAdmin())
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
            else  $mascota->idUsuario = Login::get()->id;
            $mascota->idRaza = intval($_POST['razaTipo']); 
            //$mascota->idRaza=2;
 echo "idrazaTipo<br>"; 
 var_dump($_POST['razaTipo']);                         
                  
            if(!$mascota->guardar()) //gaurda la mascota en BDD
                  throw new Exception("No se pudo guardar $mascota->nombre");
            $mascotaR = Mascota::getFiltered('nombre', DB::escape($_POST['nombre']));
echo 'mascotaR<br>';             
var_dump($mascotaR);
//            if(!empty($_POST['fichero'])){ 
              // $foto = new Foto(); //crea una nueva foto
              // $foto->ubicacion=DB::escape($_POST['ubicacion']);
              // $foto->idmascotas=intval($mascotaR[0]->id);
                       
              //  para subir la imagen
              // if(Upload::llegaFichero('imagen'))
                 //$foto->fichero = Upload::procesar($_FILES['imagen'], 'imagen/mascotas', true, 0, 'image/*');
            
              // if(!$foto->guardar()) //guarda la foto en BDD  
              //  throw new Exception("No se pudo guardar $foto->fichero"); 
                         
//            }
            $mensaje="Guardado de mascota $mascota->nombre.";
            include 'view/exito.php'; // muestra la vista de éxito
    }
}
    