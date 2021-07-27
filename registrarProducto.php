<?php
    session_start();

    $idTipoRegreso=$_GET['q'];

    if ($_SESSION['RolUsuario']!=1){
        header("Location: index.php");
    }
    include 'ConnBD.php';
    $ConBD = AbrirBD();

    if(isset($_POST['btnRegistrar']))
    {
        $idProducto= $_POST['txtIdProducto'];
        $producto= $_POST['txtProducto'];
        $precio= $_POST['txtValor'];
        $descripcion= $_POST['txtDescripcion'];
        $idTipo= $_POST['cboTipo'];
        $imagen = $_POST['txtImagen'];

        $queryRegistrar = "call Registrar_Producto('$idProducto', '$producto', '$precio', '$descripcion', $idTipo, '$imagen')"; 
        $ConBD -> query($queryRegistrar);
        
        header('Location: Lista.php?p='.$idTipo);
    }
    
    $queryTipo = "call Consultar_Tipos()";
    $resultadoTipo = $ConBD -> query($queryTipo);
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
    <title>Registrar Producto</title>
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

                    <label for="txtIdProducto">ID Producto</label>
                    <input type="text" id="txtIdProducto" name="txtIdProducto" class="form-control" value=""
                        placeholder='Ingrese el ID del producto' required
                        oninvalid="this.setCustomValidity('El id del producto es requerido')"
                        oninput="setCustomValidity('')" />

                </div>

                <div class="col-2">

                    <label for="txtProducto">Producto</label>
                    <input type="text" id="txtProducto" name="txtProducto" class="form-control" value=""
                        placeholder='Ingrese el producto' required
                        oninvalid="this.setCustomValidity('El producto es requerido')"
                        oninput="setCustomValidity('')" />

                </div>
                <div class="col-2">

                    <label for="txtValor">Precio</label>
                    <input type="text" id="txtValor" name="txtValor" class="form-control" value=""
                        placeholder='Ingrese el precio' required
                        oninvalid="this.setCustomValidity('El precio es requerido')" oninput="setCustomValidity('')" />

                </div>
                <div class="col-2">

                    <label for="txtDescripcion">Descripción</label>
                    <textarea rows="6" id="txtDescripcion" name="txtDescripcion" class="form-control" value=""
                     required oninvalid="this.setCustomValidity('La descripción es requerida')" placeholder="Ingrese una descripción, cada / cuenta como salto de línea" oninput="setCustomValidity('')">
                     </textarea>
                </div>
                <div class="col-2">

                    <label for="cboTipo">Tipo</label>
                    <select id="cboTipo" name="cboTipo" class="form-control">
                        <?php
                            While($fila = mysqli_fetch_array($resultadoTipo))
                            {
                                    echo "<option value=" . $fila["ID_TIPO"] . ">" . $fila["TIPO"] . "</option>";                              
                            }
                            ?>
                    </select>

                </div>
                <div class="col-2">

                    <label for="txtProducto">Imagen</label>
                    <input type="text" id="txtImagen" name="txtImagen" class="form-control" value=""
                        placeholder='Ingrese el link de la imagen' required
                        oninvalid="this.setCustomValidity('El link de la imagen es requerido')"
                        oninput="setCustomValidity('')" />

                    <br />
                    <input type="submit" id="btnRegistrar" name="btnRegistrar" class="btn btn-success"
                        value="Registrar Producto" style="width:100%">
                    <br /><br />

                    <a href="Lista.php?p='<?php echo $idTipoRegreso?>'" class="btn btn-dark btn-block" style="width:100%">Regresar</a>
                </div>
            </div>
        </div>
    </form>
</body>


</html>