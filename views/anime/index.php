<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Catálogo de Anime</title>
    <style>
        body {
            /* Fondo de inicio */
            background-image: url('/renta_anime/public/img/2.png');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            font-family: Arial, sans-serif;
        }
        table {
            background-color: rgba(255, 255, 255, 0.85);
            border-collapse: collapse;
            width: 90%;
            margin-top: 20px;
        }
        th, td { padding: 10px; text-align: center; }
        .btn-accion { text-decoration: none; display: inline-block; margin: 0 10px; color: #004a99; font-weight: bold;}
        .barra-superior {
            display: flex;
            align-items: center;
            gap: 20px;
            background: rgba(255, 255, 255, 0.9);
            padding: 10px 20px;
            border-radius: 8px;
            display: inline-flex;
        }
    </style>
</head>
<body>
    <h2 style="color: white; text-shadow: 2px 2px 4px #000;">Animes Disponibles para Renta</h2>
    
    <div class="barra-superior">
        <a href="/renta_anime/anime/crear" style="background: #28a745; color: white; padding: 10px 15px; border-radius: 5px; text-decoration: none; font-weight: bold;">
            <img src="/renta_anime/public/img/crear.png" width="20" style="vertical-align: middle;"> Registrar Nuevo Anime
        </a>

        <form action="/renta_anime/" method="GET" style="margin: 0;">
            <label for="orden_por"><b>Ordenar por:</b></label>
            <select name="orden_por" id="orden_por" onchange="this.form.submit()" style="padding: 5px;">
                <option value="id" <?php echo (isset($_GET['orden_por']) && $_GET['orden_por'] == 'id') ? 'selected' : ''; ?>>ID</option>
                <option value="titulo" <?php echo (isset($_GET['orden_por']) && $_GET['orden_por'] == 'titulo') ? 'selected' : ''; ?>>Título</option>
                <option value="episodios" <?php echo (isset($_GET['orden_por']) && $_GET['orden_por'] == 'episodios') ? 'selected' : ''; ?>>Episodios</option>
            </select>
            
            &nbsp;&nbsp;
            <label>
                <input type="radio" name="direccion" value="ASC" onchange="this.form.submit()" <?php echo (!isset($_GET['direccion']) || $_GET['direccion'] == 'ASC') ? 'checked' : ''; ?>> Ascendente
            </label>
            <label>
                <input type="radio" name="direccion" value="DESC" onchange="this.form.submit()" <?php echo (isset($_GET['direccion']) && $_GET['direccion'] == 'DESC') ? 'checked' : ''; ?>> Descendente
            </label>
        </form>
    </div>
    
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Portada</th>
            <th>Título</th>
            <th>Episodios</th>
            <th>Acciones</th>
        </tr>
        <?php foreach($listaAnimes as $anime): ?>
        <tr>
            <td><?php echo $anime['id']; ?></td>
            <td>
                <img src="/renta_anime/<?php echo $anime['portada']; ?>" alt="Portada" width="60" height="80" style="object-fit: cover;">
            </td>
            <td><?php echo $anime['titulo']; ?></td>
            <td><?php echo $anime['episodios']; ?></td>
            <td>
                <a href="/renta_anime/anime/editar/<?php echo $anime['id']; ?>" class="btn-accion">
                    <img src="/renta_anime/public/img/editar.png" width="24" alt="Editar"><br>Editar
                </a> 
                |
                <a href="/renta_anime/anime/eliminar/<?php echo $anime['id']; ?>" class="btn-accion" style="color: red;" onclick="return confirm('¿Seguro que querés borrar este anime?');">
                    <img src="/renta_anime/public/img/eliminar.png" width="24" alt="Borrar"><br>Borrar
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>