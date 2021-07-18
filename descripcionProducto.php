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
<?php
    include 'index.php'
?>
<body>
<div class="container-fluid">
        <form action="" method="post">
        <div class="row">
            <div class="column-md-10 align-self-center">
            <?php
                    echo "<h1 class='display-4'>".$productoEncontrado["PRODUCTO"]."</h1>";
                ?>
            <?php
                echo "<p class='h6'>Descripción: <br/>".str_replace('/','<br/><br/>',$productoEncontrado["DESCRIPCION"])."</p>";
                echo "<p class='h4'><br/>Precio:<br/>₡".$productoEncontrado["VALOR"]."</p>";
            ?>
            </div>
            <div class="column-md-2">
            <?php
                
                echo "<img class='img' src='" . $productoEncontrado["IMAGEN"] . "' height='100%'>";
            ?>
            </div>
        </div>

        </form>
</div>
</body>


</html>