<?php
class Conexion {
    public static function conectar() {
        $host = 'localhost';
        $db = 'renta_anime_db';
        $user = 'root'; // Usuario por defecto de WAMP
        $password = ''; // Sin contraseña por defecto en WAMP

        try {
            $conexion = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $password);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conexion;
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }
}
?>