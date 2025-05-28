<?php
include "../db.php";
if (isset($_GET['usuario'])) {
    $usuario = $_GET['usuario'];
    $sql = "SELECT * FROM usuario WHERE usuario = '$usuario'";
    $resultado = mysqli_query($conn, $sql);
    $usuarios = mysqli_fetch_assoc($resultado);
} else {
    header("Location: usuario_listar.php");
    exit();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $contraseña = !empty($_POST['contraseña']) ? password_hash($_POST['contraseña'], PASSWORD_DEFAULT) : null;
    if ($contraseña === null) {
        $sql = "UPDATE usuario SET nombre = '$nombre' WHERE usuario = '$usuario'";
    } else {
        $sql = "UPDATE usuario SET nombre = '$nombre', password = '$contraseña' WHERE usuario = '$usuario'";
    }
    
    if (mysqli_query($conn, $sql)) {
        header("Location: usuario_listar.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar usuario</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>
<body>
    <div class="container mt-5">
        <h2>Modificar usuario</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label for="usuario">usuario</label>
                <input type="text" class="form-control" id="usuario" name="usuario" value="<?php echo $usuarios['usuario']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $usuarios['nombre']; ?>" required>
            </div>
            <div class="form-group">
                <label for="contraseña">Nueva Contraseña</label>
                <input type="password" class="form-control" id="contraseña" name="contraseña" value="">
            </div>
            <button type="submit" class="btn btn-primary">Modificar</button>
            <a href="fabricante_listar.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
    
</body>
<script>
    do
</script>