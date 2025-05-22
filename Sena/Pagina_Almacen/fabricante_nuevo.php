<?php
include "db.php";
if (isset($_POST['nombre'])) {
    $nombre = $_POST['nombre'];
    $sql = "INSERT INTO fabricante (nombre) VALUES ('$nombre')";
    if (mysqli_query($conn, $sql)) {
        header("Location: fabricante_listar.php");
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
    <title>Nuevo Fabricante</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow-sm p-4" style="max-width: 400px; width: 100%;">
        <h2 class="text-center mb-4">Nuevo Fabricante</h2>
        <form method="POST" action="">
            <div class="mb-3">
                <input type="text" name="nombre" class="form-control" placeholder="Nombre del fabricante" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Guardar</button>
        </form>
        <div class="text-center mt-3">
            <a href="fabricante_listar.php" class="text-decoration-none">Volver a la lista</a>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
