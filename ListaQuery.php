<?php
    session_start();
    if ($_SESSION['RolUsuario']==NULL){
        header("Location: index.php");
    }
    include 'ConnBD.php';
    $queryBusqueda = $_GET['p'];

    $ConnBD = AbrirBD();
    $queryBD = "call Busqueda_Query('$queryBusqueda');";
    $resultado = $ConnBD -> query($queryBD);
    $ConnBD -> next_result();
   
    CerrarBD($ConnBD);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Lista de productos</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <link href="css/background.css" rel="stylesheet">
    <link href="css/inicio.css" rel="stylesheet" type="text/css">
</head>

<?php
        include 'header.php'
    ?>

<body>
    <div class="card-deck">
        <?php
                While($fila = mysqli_fetch_array($resultado)){
                    echo "<div class='col-3'>";
                    echo "<div class='card text-white bg-dark mb-3'>";
                    echo "<img class='card-img-top img-thumbnail' src='" . $fila["IMAGEN"] . "'>";
                    echo "<h6 class='card-title'>" . $fila["PRODUCTO"] . "</h6>";
                    echo "<p class='card-text'>₡ " . $fila["VALOR"] . "</p>";
                    echo "<a href='descripcionProducto.php?q=".$fila['ID_TIPO']."&r=".$fila['ID_PRODUCTO']."' class='btn btn-light btn-lg btn-block'>Ver detalles</a>";    
                    if ($_SESSION['RolUsuario']==1){
                        echo"<a href='mantenimiento.php?q=".$fila['ID_PRODUCTO']."&r=".$fila['ID_TIPO']."' class='btn btn-success btn-lg btn-block'>Actualizar Producto</a>";
                    }
                    echo "</div>";
                    echo "</div>";
                }
            ?>
    </div>
</body>

</html>