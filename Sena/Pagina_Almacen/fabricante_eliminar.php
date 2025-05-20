<?php
include "db.php";
if (isset($_GET['codigo'])) {
    $codigo = $_GET['codigo'];
    $sql = "Delete from fabricante where codigo='$codigo'";
    if (mysqli_query($conn, $sql)) {
        header("Location: fabricante_listar.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>