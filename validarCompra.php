<?php
    session_start();
    if ($_SESSION['RolUsuario']==NULL){
        header("Location: index.php");
    }
    $idTipo = $_GET['q'];
    $idProducto = $_GET['r'];
    include 'ConnBD.php';
    
    if(isset($_POST['btnComprar']))
    {
        $ConBD = AbrirBD();
        $usuario= $_POST['txtUsuario'];
        $pass= $_POST['txtPass'];
        $queryValidar = "call Validar_Usuario('$usuario', '$pass');";
        $resultadoValidar = $ConBD -> query($queryValidar);
        $ConBD -> next_result();
        $validar=mysqli_fetch_array($resultadoValidar);
        $cantidad= $_POST['txtCantidad'];
       
        if($validar==NULL) {
            CerrarBD($ConBD);
            echo "<script>alert('El usuario o la contraseña son incorrectas')</script>";
            header('refresh:0; validarCompra.php?q='.$idTipo.'&r='. $idProducto);
        }elseif($cantidad<=0){
            CerrarBD($ConBD);
            echo "<script>alert('La cantidad de productos no puede ser menor o igual a 0')</script>";
            header('refresh:0; validarCompra.php?q='.$idTipo.'&r='. $idProducto);
            }else{
                $idUsuario=$validar['ID_USUARIO'];
                $total= $_POST['txtPrecioTotal'];
                $queryCompra = "call Comprar_Producto($idProducto, $idTipo, $idUsuario, $total, $cantidad)"; 
                $ConBD -> query($queryCompra);
                CerrarBD($ConBD);
                echo "<script>alert('Muchas gracias por su compra, su factura se envió a su correo.')</script>";
                header('refresh:0; descripcionProducto.php?q='.$idTipo.'&r='. $idProducto);
            }

        }
    
    $ConBD = AbrirBD();
    $queryBD = "call Consultar_Producto_Especifico($idTipo,$idProducto);";
    $resultado = $ConBD -> query($queryBD);
    $ConBD -> next_result();

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
    <title>Validar Compra</title>
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
            <h2>Validar Compra</h2>
            <br />
            <div class="row">
                <div class="col-3">
                    <label for="txtUsuario">Usuario</label>
                    <input type="text" id="txtUsuario" name="txtUsuario" class="form-control" value=""
                        placeholder=" Ingrese el usuario " required
                        oninvalid="this.setCustomValidity('El usario es requerido')" oninput="setCustomValidity('')" />
                </div>
                <div class="col-3">
                    <label for="txtPass">Contraseña</label>
                    <input type="password" id="txtPass" name="txtPass" class="form-control"
                        placeholder=" Ingrese la contraseña " value="" required
                        oninvalid="this.setCustomValidity('La contraseña es requerida')"
                        oninput="setCustomValidity('')" />
                </div>
            </div>
            <br />
            <div class="row">
                <div class="col-2">

                    <label for="txtProducto">Producto</label>
                    <input type="text" id="txtProducto" name="txtProducto" class="form-control"
                        value="<?php echo $productoEncontrado['PRODUCTO']; ?>" readonly />

                </div>
                <div class="col-2">

                    <label for="txtValor">Precio</label>
                    <input type="number" id="txtValor" name="txtValor" class="form-control"
                        value="<?php echo $productoEncontrado['VALOR']; ?>" readonly />

                </div>
                <div class="col-2">

                    <label for="txtCantidad">Cantidad de Productos</label>
                    <input type="number" id="txtCantidad" name="txtCantidad" class="form-control"
                        placeholder='Ingrese la cantidad de productos' value="" required
                        oninvalid="this.setCustomValidity('La cantidad de productos es requerida')"
                        oninput="setCustomValidity('')" onblur="CalcularPrecioTotal()" ; />

                </div>
                <div class="col-2">

                    <label for="txtTipo">Tipo</label>
                    <input type="text" id="txtTipo" name="txtTipo" class="form-control" readonly value="
                    <?php 
                    echo $productoEncontrado['TIPO'];
                    ?>
                    " />
                    </select>

                </div>
                <div class="col-2">

                    <label for="txtPrecioTotal">Precio total</label>
                    <input type="number" id="txtPrecioTotal" name="txtPrecioTotal" class="form-control" value=""
                        readonly />
                </div>
                <div class="col-2">
                    <input type="submit" id="btnComprar" name="btnComprar" class="btn btn-success"
                        value="Comprar Producto" style="width:100%">
                    <br /><br />
                    <?php
                    echo "<a href='descripcionProducto.php?q=".$idTipo."&r=".$idProducto."' class='btn btn-dark border border-light' style='width:100%'>Regresar</a>"; 
                    ?>
                </div>
            </div>
        </div>

        <script>
        function CalcularPrecioTotal() {
            var valor = $('#txtValor').val();
            var cantidad = $('#txtCantidad').val();

            $('#txtPrecioTotal').val(valor * cantidad);
        }
        </script>

    </form>
</body>


</html>