<?php
include "../db.php";
if (isset($_GET['codigo'])){
    $codigo = $_GET['codigo'];
    $sql = "DELETE FROM producto WHERE codigo = '$codigo'";
        if (mysqli_query($conn, $sql)) {
            HEADER("Location: productos_listar.php");
            exit();
        } else {
            echo "Error al eliminar el Producto: " . mysqli_error($conn);
        }
}

?>