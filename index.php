<?php
// Obtenemos la URL o cargamos el inicio por defecto
$url = isset($_GET['url']) ? $_GET['url'] : 'anime/index';
$url = explode('/', $url);

$controlador = ucfirst($url[0]) . 'Controller'; // Ej: AnimeController
$metodo = isset($url[1]) ? $url[1] : 'index';   // Ej: index o crear

// Llamamos al controlador si existe
$archivoControlador = "controllers/" . $controlador . ".php";

if(file_exists($archivoControlador)){
    require_once $archivoControlador;
    $controller = new $controlador();
    //Obtener un posible número de parámetro (ID del anime)
    $parametro=isset($url[2])?$url[2]:null;

    if(method_exists($controller, $metodo)){
        if ($parametro!=null){
            $controller->{$metodo}($parametro);//Ejecuta con ID
        }
        else {
            $controller->{$metodo}();//ejecuta normal
        }
    } else {
        echo "Error: Método no encontrado.";
    }
} else {
    echo "Error: Controlador no encontrado.";
}
?>