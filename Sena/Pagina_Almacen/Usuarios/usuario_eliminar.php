<?php
include "../db.php";
if (isset($_GET['usuario'])){
    $usuario = $_GET['usuario'];
    $sql = "DELETE FROM usuario WHERE usuario = '$usuario'";
    if (mysqli_query($conn, $sql)) {
        HEADER("Location: usuario_listar.php");
        exit();
    } else {
            echo "Error al eliminar el fabricante: " . mysqli_error($conn);
    }
}
?>