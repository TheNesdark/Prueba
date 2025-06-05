<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../login.php");
    exit();
}

include "../db.php";
$resultado = mysqli_query($conn, "SELECT * FROM usuario");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="../index.php">Almacén</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link" href="../productos/productos_listar.php">Productos</a></li>
        <li class="nav-item"><a class="nav-link" href="../Fabricante/fabricante_listar.php">Fabricantes</a></li>
        <li class="nav-item"><a class="nav-link active" href="usuario_listar.php">Usuarios</a></li>
      </ul>
      <span class="navbar-text me-3"><?= htmlspecialchars($_SESSION['usuario']) ?></span>
      <a href="../logout.php" class="btn btn-outline-light btn-sm">Cerrar sesión</a>
    </div>
  </div>
</nav>
    <div class="container mt-5">
        <h2 class="mb-4">Lista de Usuarios</h2>
        <a href="usuario_nuevo.php" class="btn btn-primary mb-3">Nuevo Usuario</a>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr class="text-center">
                        <th class ="col-1">usuario</th>
                        <th class ="col-4">nombre</th>
                        <th class = "col-2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($resultado)) { ?>
                    <tr>
                        <td><?= $row['usuario'] ?></td>
                        <td><?= $row['nombre'] ?></td>
                        <td>
                            <a href="usuario_modificar.php?usuario=<?= $row['usuario'] ?>" class="btn btn-sm btn-warning">Editar</a>
                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarModal<?= $row['usuario'] ?>">
                                Eliminar
                            </button>

                            <div class="modal fade" id="eliminarModal<?= $row['usuario'] ?>" tabindex="-1" aria-labelledby="eliminarModalLabel<?= $row['usuario'] ?>" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="eliminarModalLabel<?= $row['nombre'] ?>">Confirmar Eliminación</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                  </div>
                                  <div class="modal-body">
                                    ¿Estás seguro de querer eliminar <strong><?= htmlspecialchars($row['nombre']) ?></strong>?
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <a href="usuario_eliminar.php?usuario=<?= $row['usuario'] ?>" class="btn btn-danger">Eliminar</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
