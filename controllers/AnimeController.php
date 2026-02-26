<?php
require_once 'models/Anime.php';

class AnimeController {
    
    // Muestra el formulario
    public function crear() {
        require_once 'views/anime/crear.php'; // Envío a vistas
    }

    // Procesa el formulario
    // Procesa el formulario y sube la imagen
    public function guardar() {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $titulo = $_POST['titulo'];
            $episodios = $_POST['episodios'];
            $rutaImagen = "";

            // Lógica para subir la imagen
            if(isset($_FILES['portada']) && $_FILES['portada']['error'] == 0) {
                $nombreArchivo = time() . "_" . basename($_FILES['portada']['name']);
                $rutaDestino = "public/img/" . $nombreArchivo;
                
                // Movemos el archivo temporal a nuestra carpeta
                if(move_uploaded_file($_FILES['portada']['tmp_name'], $rutaDestino)){
                    $rutaImagen = $rutaDestino;
                }
            }

            $modelo = new Anime();
            // Ahorita el modelo no hace nada con estos datos porque es simulado, pero ya se los enviamos
            $resultado = $modelo->guardar($titulo, $episodios, $rutaImagen); 

            if($resultado){
                $mensaje = "¡Anime y portada registrados con éxito!";
                require_once 'views/anime/crear.php'; 
            }
        }
    }

    // Nuevo método para borrar
    public function eliminar($id) {
        $modelo = new Anime();
        $modelo->eliminar($id); // Llamamos al modelo para borrar
        
        // Redirigimos de vuelta a la lista principal
        header("Location: /renta_anime/"); 
    }
    // Muestra la lista de todos los animes
    public function index() {
        $modelo = new Anime();
        
        // Capturamos los datos de ordenamiento si existen en la URL
        $orden_por = isset($_GET['orden_por']) ? $_GET['orden_por'] : 'id';
        $direccion = isset($_GET['direccion']) ? $_GET['direccion'] : 'ASC';

        $listaAnimes = $modelo->listarTodos($orden_por, $direccion); 
        require_once 'views/anime/index.php';  
    }
    //Muestra el formulario para editar
    public function editar($id){
        $modelo=new Anime();
        $anime=$modelo->obtenerPorId($id);//Busca los datos
        if ($anime!=null){
            require_once 'views/anime/editar.php';
        } else{
            echo "El anime no existe.";
        }
    }

    // Procesa el formulario de edición
    public function actualizar() {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $_POST['id'];
            $titulo = $_POST['titulo'];
            $episodios = $_POST['episodios'];
            $rutaImagen = "";

            // Verificamos si el usuario seleccionó una NUEVA imagen
            if(isset($_FILES['portada']) && $_FILES['portada']['error'] == 0) {
                $nombreArchivo = time() . "_" . basename($_FILES['portada']['name']);
                $rutaDestino = "public/img/" . $nombreArchivo;
                
                if(move_uploaded_file($_FILES['portada']['tmp_name'], $rutaDestino)){
                    $rutaImagen = $rutaDestino;
                }
            }

            $modelo = new Anime();
            // Enviamos los datos al modelo para que los actualice
            // (Ahorita simulado, luego a la BD)
            $modelo->actualizar($id, $titulo, $episodios, $rutaImagen); 

            // Redirigimos a la tabla principal
            header("Location: /renta_anime/"); 
        }
    }
}
?>