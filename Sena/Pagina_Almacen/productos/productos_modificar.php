<?php
include "../db.php";

if (isset($_GET['codigo'])) {
    $codigo = $_GET['codigo'];
    $resultado = mysqli_query($conn, "SELECT * FROM producto WHERE codigo = '$codigo'");
    $producto = mysqli_fetch_assoc($resultado);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nombre = $_POST['nombre'];
        $codigo = $_POST['codigo'];
        $precio = $_POST['precio'];
        $codigo_fabricante = $_POST['codigo_fabricante'];
        $sql = "UPDATE producto SET nombre = '$nombre', precio = '$precio', codigo_fabricante = '$codigo_fabricante' WHERE codigo = '$codigo'";
        if (mysqli_query($conn, $sql)) {
            HEADER("Location:  productos_listar.php");
            exit();
        } else {
            echo "Error al modificar el producto: " . mysqli_error($conn);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Producto</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>
<body>
    <div class="container mt-5">
        <h2>Modificar Producto</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label for="codigo">Código</label>
                <input type="text" class="form-control" id="codigo" name="codigo" value="<?php echo $producto['codigo']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $producto['nombre']; ?>" required>
            </div>
            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="text" class="form-control" id="precio" name="precio" value="<?php echo $producto['precio']; ?>" required>
            </div>
            <div class="form-group">
                <label for="codigo_fabricante">Código Fabricante</label>
                <select name="codigo_fabricante" id="codigo_fabricante" class="form-control" required>
                    <option value="">Seleccione un fabricante</option>
                    <?php
                    $resultado_fab = mysqli_query($conn, "SELECT * FROM fabricante");
                    while ($row = mysqli_fetch_assoc($resultado_fab)) {
                        $selected = ($row['codigo'] == $producto['codigo_fabricante']) ? 'selected' : '';
                        echo "<option value='{$row['codigo']}' $selected>{$row['nombre']}</option>";
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Modificar</button>
            <a href="fabricante_listar.php" class="btn btn-secondary">Cancelar</a>

        </form>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
