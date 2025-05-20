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
<h2>Nuevo Fabricante</h2>
<form method="POST" action="">
    nombre: <input type="text" name="nombre" required>
    <input type="submit" value="Guardar">
    <a href="index.php">Cancelar</a>
</form>