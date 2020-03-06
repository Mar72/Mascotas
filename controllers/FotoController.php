<?php
class FotoController {
    public function delete(int $id =0){
        //recupero la foto para mostrar info
        if(!$foto = Foto::get($id))  
            throw new Exception("No se encontró la foto $id.");
        
        //recupero la foto para mostrar info 
        $mascota = $foto->getMascota();

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