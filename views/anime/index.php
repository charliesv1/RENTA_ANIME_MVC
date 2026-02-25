<h2>Animes Disponibles para Renta</h2>
    
    <a href="/renta_anime/anime/crear">➕ Registrar Nuevo Anime</a>
    <br><br>
    
    <table border="1">
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
                <a href="/renta_anime/anime/editar/<?php echo $anime['id']; ?>">Editar</a> | 
                <a href="/renta_anime/anime/eliminar/<?php echo $anime['id']; ?>" 
                   onclick="return confirm('¿Seguro que querés borrar este anime?');">Borrar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>