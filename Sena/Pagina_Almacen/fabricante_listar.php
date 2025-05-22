<?php
include "db.php";
$resultado = mysqli_query($conn, "SELECT * FROM fabricante");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Fabricantes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
        }
        h2 {
            color: #333;
        }
        .btn-nuevo-fabricante {
            display: inline-block;
            margin-bottom: 15px;
            padding: 10px 15px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn-nuevo-fabricante:hover {
            background-color: #0056b3;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            color: #333;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .acciones a {
            margin-right: 10px;
            color: #007bff;
            text-decoration: none;
        }
        .acciones a:hover {
            text-decoration: underline;
        }
    </style>

</head>
<body>
    <h2>Lista de Fabricantes</h2>
    <a href="fabricante_nuevo.php" class="btn-nuevo-fabricante">Nuevo Fabricante</a>
    <table>
        <tr>
            <th>Código</th>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($resultado)) { ?>
        <tr>
            <td><?= $row['codigo'] ?></td>
            <td><?= $row['nombre'] ?></td>
            <td class="acciones">
                <a href="fabricante_editar.php?codigo=<?= $row['codigo'] ?>">Editar</a>
                <a href="fabricante_eliminar.php?codigo=<?= $row['codigo'] ?>" onclick="return confirm('Estas seguro de querer eliminar <?= $row['nombre'] ?>')">Eliminar</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
