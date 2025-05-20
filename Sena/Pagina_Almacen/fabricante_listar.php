<?php
include "db.php";
$resultado = mysqli_query($conn, "SELECT * FROM fabricante");
?>
<h2>Lista de Fabricantes</h2>
<a href="fabricante_nuevo.php">Nuevo</a>
<table border="1">
    <tr>
        <th>Codigo</th>
        <th>Nombre</th>
        <th>Acciones</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($resultado)) { ?>
    <tr>
        <td><?= $row['codigo'] ?></td>
        <td><?= $row['nombre'] ?></td>
        <td>
            <a href="fabricante_editar.php?codigo=<?= $row['codigo'] ?>">Editar</a>
            <a href="fabricante_eliminar.php?codigo=<?= $row['codigo'] ?>" onclick="return confirm('Eliminar?')">Eliminar</a>
        </td>
    </tr>
    <?php } ?>
</table>
