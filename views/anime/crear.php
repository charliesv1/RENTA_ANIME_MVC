<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Anime</title>
</head>
<body>
    <h2>Registrar Nueva Serie o Película</h2>
    
    <?php if(isset($mensaje)) echo "<p style='color:green;'>$mensaje</p>"; ?>

    <form action="/renta_anime/anime/guardar" method="POST" enctype="multipart/form-data">
        <label for="titulo">Título del Anime:</label><br>
        <input type="text" id="titulo" name="titulo" required 
               pattern="^[a-zA-Z0-9\s]{2,50}$" 
               title="Solo letras y números. Entre 2 y 50 caracteres."><br><br>

        <label for="episodios">Número de Episodios:</label><br>
        <input type="text" id="episodios" name="episodios" required 
               pattern="^[0-9]{1,4}$" 
               title="Solo números. Máximo 4 dígitos."><br><br>

               <label for="portada">Portada del anime:</label><br>
                <input type="file" id="portada" name="portada" accept="image/*" required><br><br>

        <button type="submit">Guardar Anime</button>
    </form>
</body>
</html>