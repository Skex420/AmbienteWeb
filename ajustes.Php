<?php
    include 'ConnBD.php';
    $ConBD = AbrirBD();

    $queryBD = "call Consultar_TodosProductos(-1)";
    $resultado = $ConBD -> query($queryBD);
    $ConBD -> next_result();
   
    CerrarBD($ConBD);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Ajustes</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <link href="css/background.css" rel="stylesheet">
    <link href="css/inicio.css" rel="stylesheet" type="text/css">
</head>
<?php
    include 'header.php'
?>

<body>
    <form action="" method="post">
        <div class="container-fluid">
            <h2>Admin</h2>
            <br>
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Tipo</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
            While($fila = mysqli_fetch_array($resultado))
            {
                echo "<tr>";
                echo "<td>" . $fila["PRODUCTO"] . "</td>";
                echo "<td>" . $fila["VALOR"] . "</td>";
                echo "<td>" . $fila["TIPO"] . "</td>";
                echo "<td><a href='mantenimiento.php?q=".$fila['ID_TIPO']."&r=".$fila['ID_PRODUCTO']."' class='btn btn-success'>Actualizar Producto</a></td>";
                echo "</tr>";
            }
        ?>
                </tbody>
            </table>

            <a href="registrarProducto.php" class="btn btn-success">Registrar Producto</a>

        </div>

        </div>
    </form>
</body>


</html>