<?php
class FotoController {
    
    public function createFotos($idm){
        
        //$usuario= Login::get();
        $mascota = Mascota::getMascota($idm);
        //restricciones de acceso
        if (!Login::get())
            throw new Exception ("Debes registrarte para subir fotos");
        if (Login::get() && ($mascota->idUsuario!=Login::get()->id))
            throw new Exception ("No tienes permiso para subir fotos");
            
            include 'views/mascota/addFotos.php';
    }
    
    public function storeFotos(){   //Sube fotos para mascota id
        $idm = intval($_POST['idmascota']);
        $mascota = Mascota::getMascota($idm);
        $usuario=Login::get();
        
        if ($mascota->idUsuario!=$usuario->id)
            throw new Exception ("No tienes permiso para subir fotos");
        if(!empty($_POST['enviar'])){
                $foto = new Foto(); //crea una nueva foto
                $foto->ubicacion=DB::escape($_POST['ubicacion']);
                $foto->idmascota=$mascota->id;
                
                //  para subir las imagenes 
                foreach($_FILES as $fichero){
                   
                //   if(Upload::llegaFichero($fichero['name'])){
                    
                        $foto->fichero = Upload::procesar($fichero, 'imagen/mascotas', true, 0, 'image/*');
                 
                        if(!$foto->guardar()) //guarda la foto en BDD
                            throw new Exception("No se pudo guardar $foto->fichero");
                    
                 // }
                }
            $mensaje="Guardado de fotos de mascota $mascota->nombre.";
            include 'views/exito.php'; // muestra la vista de éxito
        }
    }
    
    public function delete(int $id =0){
        
        //recupero la foto para mostrar info
        if(!$foto = Foto::get($id))  
            throw new Exception("No se encontró la foto $id.");
        
        //recupero la foto para mostrar info 
        $mascota = $foto->getMascota();
        if (!Login::get() || Login::get()->id!= $mascota->idUsuario)
            throw New Exception("No tienes permisos para borrar foto");
        include 'views/foto/borrar.php';
    }
    //elimina la foto 
    public function destroy(){
        //comprueba que llegue el formulario de confirmación 
        if (empty($_POST['borrar']))
            throw new Exception ('No se recibió confirmación'); 
        
        $id = intval($_POST['id']);  //recupera el identificador vía POST 

        //recupero la foto para poder mostrar info
        if(!$foto = Foto::get($id)) 
            throw new Exception("No se encontró la foto $id."); 
        //recupero la mascota para mostrar la info
        $mascota = $foto->getMAscota(); 
        
        //intenta borrar el ejemplar de la BDD 
        if(Foto::borrar($id)==false) 
            throw new Exception('No se pudo borrar');
        
        unlink($foto->fichero);    
        //redireccionar a MascotaController::show/$id); 
        (new MascotaController())->show($foto->idmascota);
    }
}