<?php
include "../db.php";
if (isset($_POST['nombre'])) {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $codigo_fabricante = $_POST['codigo_fabricante'];
    $sql = "INSERT INTO producto (nombre,precio,codigo_fabricante) VALUES ('$nombre', '$precio', '$codigo_fabricante')";
    if (mysqli_query($conn, $sql)) {
        header("Location:productos_listar.php");
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
    <title>Nuevo producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow-sm p-4" style="max-width: 400px; width: 100%;">
        <h2 class="text-center mb-4">Nuevo Producto</h2>
        <form method="POST" action="">
                <input type="text" name="nombre" class="form-control mb-3" placeholder="Nombre del Producto" required>
                <input type="number" name="precio" class="form-control mb-3" placeholder="Precio del Producto" required>
                <select name="codigo_fabricante" id="codigo_fabricante" class="form-select mb-3" required>
                    <option value="">Seleccione un fabricante</option>
                    <?php
                    $resultado = mysqli_query($conn, "SELECT * FROM fabricante");
                    while ($row = mysqli_fetch_assoc($resultado)) {
                        echo "<option value='{$row['codigo']}'>{$row['nombre']}</option>";
                    }
                    ?>
                </select>
            <button type="submit" class="btn btn-primary w-100">Guardar</button>
        </form>
        <div class="text-center mt-3">
            <a href="Producto_listar.php" class="text-decoration-none">Volver a la lista</a>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
