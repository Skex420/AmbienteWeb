<?php
    $idTipo = $_GET['q'];
    $idProducto = $_GET['r'];
    include 'ConnBD.php';
    $ConnBD = AbrirBD();

    $queryBD = "call Consultar_Producto_Especifico($idTipo,$idProducto);";
    $resultado = $ConnBD -> query($queryBD);
    $productoEncontrado=mysqli_fetch_array($resultado);
    CerrarBD($ConnBD);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Descripción</title>
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/simple-sidebar.css" rel="stylesheet">
        <link href="css/background.css" rel="stylesheet">
        <link href="css/inicio.css" rel="stylesheet" type="text/css">
    </head>
<?php
    include 'header.php'
?>
<body>
    <div class="container-fluid">
        <div class="column-md-12">
            <?php
                echo "<h1 class='display-4'>".$productoEncontrado["PRODUCTO"]."</h1>";
            ?>
        </div>
    </div>
    <div class="container">
        <form action="" method="post">
            <div class="row">
                
            </div>
        <div class="row align-items-center">
            <div class="col-6">
                <?php
                    echo "<p class='h6'>Descripción: <br/>".str_replace('/','<br/><br/>',$productoEncontrado["DESCRIPCION"])."</p>";
                    echo "<p class='h4'><br/>Precio:<br/>₡".$productoEncontrado["VALOR"]."</p>";
                ?>
            </div>
            <div class="col-6">
                <?php
                    echo "<img class='img' src='" . $productoEncontrado["IMAGEN"] . "' height='100%'>";
                ?>
            </div>
        </div>
        <div class="row">
            <div class="column-md-auto">
                <input type="submit" class="btn btn-dark border border-light" id="btnAgregarCarrito" name="btnAgregarCarrito" value="Agregar al carrito">
            </div>

        </div>

        </form>
    </div>
</body>


</html>