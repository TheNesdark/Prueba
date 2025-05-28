<?php
include "../db.php";

if (isset($_GET['codigo'])) {
    $codigo = $_GET['codigo'];
    $resultado = mysqli_query($conn, "SELECT * FROM fabricante WHERE codigo = '$codigo'");
    $fabricante = mysqli_fetch_assoc($resultado);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nombre = $_POST['nombre'];
        $codigo = $_POST['codigo'];
        $sql = "UPDATE fabricante SET nombre = '$nombre' WHERE codigo = '$codigo'";
        if (mysqli_query($conn, $sql)) {
            HEADER("Location: fabricante_listar.php");
            exit();
        } else {
            echo "Error al modificar el fabricante: " . mysqli_error($conn);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Fabricante</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>
<body>
    <div class="container mt-5">
        <h2>Modificar Fabricante</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label for="codigo">Código</label>
                <input type="text" class="form-control" id="codigo" name="codigo" value="<?php echo $fabricante['codigo']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $fabricante['nombre']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Modificar</button>
            <a href="fabricante_listar.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>