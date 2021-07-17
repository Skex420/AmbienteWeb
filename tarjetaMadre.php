<?php

    include 'ConnBD.php';
    $ConBD = AbrirBD();

    $queryBD = "call Consultar_Producto(2);";
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

        <br>
        <div class="card-columns" style="width=50">
            <?php
                            While($fila = mysqli_fetch_array($resultado))
                            {
                                echo "<div class='card'>";
                                echo "<img class='card-img-top' src='" . $fila["IMAGEN"] . "'>";
                                echo "<h5 class='card-title'>" . $fila["PRODUCTO"] . "</h5>";
                                echo "<p class='card-text'>" . $fila["VALOR"] . "</p>";
                                echo "<a href='descripcionProducto.php?q=".$fila['ID_TIPO']."&r=".$fila['ID_PRODUCTO']."' class='btn btn-primary'>Ver detalles</a>";
                                echo "</div>";
                            }
                        ?>
        </div>
    </form>
</body>

</html>