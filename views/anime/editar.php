<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Anime</title>
</head>
<body>
    <h2>Editar: <?php echo $anime['titulo']; ?></h2>
    
    <form action="/renta_anime/anime/actualizar" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $anime['id']; ?>">
        
        <label for="titulo">Título del Anime:</label><br>
        <input type="text" id="titulo" name="titulo" required 
               pattern="^[a-zA-Z0-9\s]{2,50}$" 
               value="<?php echo $anime['titulo']; ?>"><br><br>

        <label for="episodios">Número de Episodios:</label><br>
        <input type="text" id="episodios" name="episodios" required 
               pattern="^[0-9]{1,4}$" 
               value="<?php echo $anime['episodios']; ?>"><br><br>

        <label for="portada">Cambiar Portada (opcional):</label><br>
        <input type="file" id="portada" name="portada" accept="image/*"><br><br>

        <button type="submit">Actualizar Cambios</button>
    </form>
</body>
</html>