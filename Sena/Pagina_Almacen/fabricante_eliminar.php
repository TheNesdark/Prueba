<?php
include "db.php";
if (isset($_GET['codigo'])){
    $codigo = $_GET['codigo'];

    $check = mysqli_query($conn, "SELECT COUNT(*) AS TOTAL FROM producto WHERE codigo_fabricante = '$codigo'");
    $DATOS = mysqli_fetch_assoc($check);

    if ($DATOS['TOTAL'] > 0) {
        echo "<script>
            alert('No se puede eliminar el fabricante porque tiene productos asociados.');
            window.location.href = 'fabricante_listar.php';
        </script>";
        exit();
    } else {
        $sql = "DELETE FROM fabricante WHERE codigo = '$codigo'";
        if (mysqli_query($conn, $sql)) {
            HEADER("Location: fabricante_listar.php");
            exit();
        } else {
            echo "Error al eliminar el fabricante: " . mysqli_error($conn);
        }
    }
}

?>