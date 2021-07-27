<?php
    session_start();
    if ($_SESSION['RolUsuario']!=1){
        header("Location: index.php");
    }
    $idTipo = $_GET['r'];
    $idProducto = $_GET['q'];
    include 'ConnBD.php';
    $ConBD = AbrirBD();

    if(isset($_POST['btnEliminar']))
    {
        $queryEliminar = "call Eliminar_Producto($idProducto, $idTipo)"; 
        $ConBD -> query($queryEliminar);
        header('Location: Lista.php?p='.$idTipo);
    }

    if(isset($_POST['btnActualizar']))
    {
        $producto= $_POST['txtProducto'];
        $precio= $_POST['txtValor'];
        $descripcion= $_POST['txtDescripcion'];
        $imagen = $_POST['txtImagen'];
        $queryActualizar = "call Actualizar_Producto($idProducto,'$producto', $precio, '$descripcion', $idTipo, '$imagen')"; 
        $ConBD -> query($queryActualizar);
        header('Location: Lista.php?p='.$idTipo);
    }

    $queryProducto = "call Consultar_Producto_Especifico($idTipo,$idProducto);";
    $resultadoProducto = $ConBD -> query($queryProducto);
    $ConBD -> next_result();

    $queryTipo = "call Consultar_Tipos()";
    $resultadoTipo = $ConBD -> query($queryTipo);
    $ConBD -> next_result();

    $productoEncontrado= mysqli_fetch_array($resultadoProducto);
    CerrarBD($ConBD);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Actualizar</title>
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
            <div class="row">
                <div class="col-2">

                    Producto
                    <input type="text" id="txtProducto" name="txtProducto" class="form-control"
                        placeholder='Ingrese el producto' value="<?php echo $productoEncontrado['PRODUCTO']; ?>"
                        required oninvalid="this.setCustomValidity('El producto es requerido')"
                        oninput="setCustomValidity('')" />

                </div>
                <div class="col-2">

                    Precio
                    <input type="text" id="txtValor" name="txtValor" class="form-control"
                        placeholder='Ingrese el precio' value="<?php echo $productoEncontrado['VALOR']; ?>" required
                        oninvalid="this.setCustomValidity('El precio es requerido')" oninput="setCustomValidity('')" />

                </div>
                <div class="col-4">

                    Descripción
                    <input type="text" id="txtDescripcion" name="txtDescripcion" class="form-control"
                        placeholder='Ingrese la descripción' value="<?php echo $productoEncontrado['DESCRIPCION']; ?>"
                        required oninvalid="this.setCustomValidity('La descripción es requerida')"
                        oninput="setCustomValidity('')" />

                </div>
                <div class="col-2">

                    Tipo
                    <input type="text" id="txtTipo" name="txtTipo" class="form-control"
                    readonly value="
                    <?php 
                    echo $productoEncontrado['TIPO'];
                    ?>
                    "/>

                </div>
                <div class="col-2">

                    Imagen
                    <input type="text" id="txtImagen" name="txtImagen" class="form-control"
                        placeholder='Ingrese el link de la imagen' value="<?php echo $productoEncontrado['IMAGEN']; ?>"
                        required oninvalid="this.setCustomValidity('El link de la imagen es requerido')"
                        oninput="setCustomValidity('')" />

                    <br />
                    <input type="submit" id="btnActualizar" name="btnActualizar" class="btn btn-info"
                        value="Actualizar Producto" style="width:100%">
                    <br /><br />

                    <input type="submit" id="btnEliminar" name="btnEliminar" class="btn btn-danger"
                        value="Eliminar Producto" style="width:100%">
                    <br /><br />

                    <a href="Lista.php?p='<?php echo $idTipo?>'" class="btn btn-dark btn-block" style="width:100%">Regresar</a>

                </div>
            </div>
        </div>
    </form>
</body>


</html>