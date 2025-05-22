<?php
include "db.php";
$resultado = mysqli_query($conn, "SELECT * FROM fabricante");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Fabricantes</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="mb-4">Lista de Fabricantes</h2>
        <a href="fabricante_nuevo.php" class="btn btn-primary mb-3">Nuevo Fabricante</a>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Código</th>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($resultado)) { ?>
                    <tr>
                        <td><?= $row['codigo'] ?></td>
                        <td><?= $row['nombre'] ?></td>
                        <td>
                            <a href="fabricante_modificar.php?codigo=<?= $row['codigo'] ?>" class="btn btn-sm btn-warning">Editar</a>
                            <a href="fabricante_eliminar.php?codigo=<?= $row['codigo'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Estas seguro de querer eliminar <?= $row['nombre'] ?>')">Eliminar</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
</html>
