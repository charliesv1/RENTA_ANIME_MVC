<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Anime</title>
    <style>
        body {
            /* Fondo de crear */
            background-image: url('/renta_anime/public/img/3.png');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            font-family: Arial, sans-serif;
        }
        form {
            background-color: rgba(255, 255, 255, 0.95); /* Fondo blanco semitransparente */
            padding: 25px;
            border-radius: 10px;
            width: 350px;
            margin: 50px auto; /* Centra el formulario en la pantalla */
            box-shadow: 0px 4px 10px rgba(0,0,0,0.3);
        }
        h2 { 
            color: white; 
            text-shadow: 2px 2px 5px #000; 
            text-align: center;
        }
        .btn-regresar {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: white;
            text-shadow: 1px 1px 3px #000;
            text-decoration: none;
            font-weight: bold;
        }
        input[type="text"], input[type="file"] {
            width: 90%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <h2>Registrar Nueva Serie o Película</h2>
    
    <?php if(isset($mensaje)) echo "<p style='color:green; text-align:center; background:white; padding:5px; border-radius:5px;'>$mensaje</p>"; ?>

    <form action="/renta_anime/anime/guardar" method="POST" enctype="multipart/form-data">
        <label for="titulo"><b>Título del Anime:</b></label><br>
        <input type="text" id="titulo" name="titulo" required 
               pattern="^[a-zA-Z0-9\s]{2,50}$" 
               title="Solo letras y números. Entre 2 y 50 caracteres."><br>

        <label for="episodios"><b>Número de Episodios:</b></label><br>
        <input type="text" id="episodios" name="episodios" required 
               pattern="^[0-9]{1,4}$" 
               title="Solo números. Máximo 4 dígitos."><br>

        <label for="portada"><b>Portada del Anime:</b></label><br>
        <input type="file" id="portada" name="portada" accept="image/*" required><br>

        <button type="submit" style="width: 100%; padding: 10px; background-color: #004a99; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 16px; display: flex; align-items: center; justify-content: center; gap: 10px;">
            <img src="/renta_anime/public/img/Guardar.png" width="20" alt="Guardar"> Guardar Anime
        </button>
    </form>

    <a href="/renta_anime/" class="btn-regresar">⬅️ Reg