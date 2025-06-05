<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../login.php");
    exit();
}

include "../db.php";
if (isset($_POST['nombre'])) {
    $usuario = $_POST['usuario'];
    $nombre = $_POST['nombre'];
    $contraseña = password_hash($_POST['contraseña'], PASSWORD_DEFAULT);
    $sql = "INSERT INTO usuario (usuario,nombre,password) VALUES ('$usuario','$nombre','$contraseña')";
    if (mysqli_query($conn, $sql)) {
        header("Location: usuario_listar.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow-sm p-4" style="max-width: 400px; width: 100%;">
        <h2 class="text-center mb-4">Nuevo Usuario</h2>
        <form method="POST" action="">
            <div class="mb-3">
                <input type="text" name="nombre" class="form-control" placeholder="Nombre del Usuario" required>
                <input type="text" name="usuario" class="form-control mt-2" placeholder="Usuario" required>
                <input type="password" name="contraseña" class="form-control mt-2" placeholder="Contraseña" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Guardar</button>
        </form>
        <div class="text-center mt-3">
            <a href="usuario_listar.php" class="text-decoration-none">Volver a la lista</a>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
