<?php
require_once 'config/Conexion.php';

class Anime {
    private $db;

    public function __construct() {
        // Al instanciar la clase, nos conectamos a la BD
        $this->db = Conexion::conectar();
    }

    public function guardar($titulo, $episodios, $portada) {
        if(empty($portada)) {
            $portada = "public/img/default.png";
        }
        $stmt = $this->db->prepare("INSERT INTO animes (titulo, episodios, portada) VALUES (?, ?, ?)");
        return $stmt->execute([$titulo, $episodios, $portada]);
    }

    public function listarTodos() {
        $stmt = $this->db->query("SELECT * FROM animes");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerPorId($id) {
        $stmt = $this->db->prepare("SELECT * FROM animes WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizar($id, $titulo, $episodios, $portada) {
        if(empty($portada)) {
            // Si no subió foto nueva, solo actualizamos el texto
            $stmt = $this->db->prepare("UPDATE animes SET titulo = ?, episodios = ? WHERE id = ?");
            return $stmt->execute([$titulo, $episodios, $id]);
        } else {
            // Si subió foto, actualizamos todo
            $stmt = $this->db->prepare("UPDATE animes SET titulo = ?, episodios = ?, portada = ? WHERE id = ?");
            return $stmt->execute([$titulo, $episodios, $portada, $id]);
        }
    }

    public function eliminar($id) {
        $stmt = $this->db->prepare("DELETE FROM animes WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>