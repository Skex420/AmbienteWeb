<?php
    $idTipo = $_GET['q'];
    $idProducto = $_GET['r'];
    include 'ConnBD.php';
    $ConBD = AbrirBD();

    $queryBD = "call Consultar_Producto_Especifico($idTipo,$idProducto);";
    $resultado = $ConBD -> query($queryBD);
    $productoEncontrado=mysqli_fetch_array($resultado);
    CerrarBD($ConBD);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Le Tech</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <link href="css/fondo.css" rel="stylesheet" type="text/css">

</head>

<body>
    <form action="" method="post">

        <?php
include 'index.php'
    ?>
    <div class="row">
        <div class="column-md-3">
        <?php
            echo "<img class='img-fluid' src='" . $productoEncontrado["IMAGEN"] . "'>";
        ?>
        </div>
        <div class="column-md-9">
        <?php
            echo "<h1 class='display-4'>".$productoEncontrado["PRODUCTO"]."</h1>";
            echo "<p class='h6'>Descripción: ".$productoEncontrado["DESCRIPCION"]."</p>";
            echo "<p class='h6'>Precio: ₡".$productoEncontrado["VALOR"]."</p>";
            echo "<p class='h6'>Tipo: ".$productoEncontrado["TIPO"]."</p>";
        ?>
        </div>
    </div>

    </form>
</body>


</html>