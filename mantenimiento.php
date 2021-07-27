<?php
    $idTipo = $_GET['q'];
    $idProducto = $_GET['r'];
    include 'ConnBD.php';
    $ConnBD = AbrirBD();

    if(isset($_POST['btnEliminar']))
    {
        $queryEliminar = "call Eliminar_Producto($idProducto, $idTipo)"; 
        $ConBD -> query($queryEliminar);
        header("Location: ajustes.php");
    }

    if(isset($_POST['btnActualizar']))
    {
        $producto= $_POST['txtProducto'];
        $precio= $_POST['txtValor'];
        $descripcion= $_POST['txtDescripcion'];
        $idTipo= $_POST['cboTipo'];
        $imagen = $_POST['txtImagen'];
        $queryActualizar = "call Actualizar_Producto('$producto', $precio, '$descripcion', $idTipo, )"; 
        $ConBD -> query($queryActualizar);
    }

    $queryProducto = "call Consultar_Producto_Especifico($idTipo,$idProducto);";
    $productoEncontrado = $ConBD -> query($queryProducto);
    $ConBD -> next_result();

    $queryTipo = "call Consultar_Tipos()";
    $resultadoTipo = $ConBD -> query($queryTipo);
    $ConBD -> next_result();

    $productoEncontrado= mysqli_fetch_array($productoEncontrado);
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
                        value="<?php echo $$productoEncontrado['PRODUCTO']; ?>" required oninvalid="this.setCustomValidity('El producto es requerido')" oninput="setCustomValidity('')"/>>

                </div>
                <div class="col-2">

                    Precio
                    <input type="text" id="txtValor" name="txtValor" class="form-control"
                        value="<?php echo $$productoEncontrado['VALOR']; ?>"required oninvalid="this.setCustomValidity('El precio es requerido')" oninput="setCustomValidity('')"/>

                </div>
                <div class="col-4">

                    Descripción
                    <input type="text" id="txtDescripcion" name="txtDescripcion" class="form-control"
                        value="<?php echo $$productoEncontrado['DESCRIPCION']; ?>"required oninvalid="this.setCustomValidity('La descripción es requerida')" oninput="setCustomValidity('')"/>

                </div>
                <div class="col-2">

                    Tipo
                    <select id="cboTipo" name="cboTipo" class="form-control">
                        <?php
                            While($fila = mysqli_fetch_array($resultadoTipo))
                            {
                                if($fila["ID_TIPO"] == $$productoEncontrado['ID_TIPO'])
                                {
                                    echo "<option value=" . $fila["ID_TIPO"] . " selected>" . $fila["TIPO"] . "</option>"; 
                                }
                                else
                                {
                                    echo "<option value=" . $fila["ID_TIPO"] . ">" . $fila["TIPO"] . "</option>";
                                }                                    
                            }
                            ?>
                    </select>

                </div>
                <div class="col-2">

                    Imagen
                    <input type="text" id="txtImagen" name="txtImagen" class="form-control"
                        value="<?php echo $$productoEncontrado['IMAGEN']; ?>"required oninvalid="this.setCustomValidity('El link de la imagen es requerido')" oninput="setCustomValidity('')"/>

                    <br />
                    <input type="submit" id="btnActualizar" name="btnActualizar" class="btn btn-info"
                        value="Actualizar Producto" style="width:100%">
                    <br /><br />

                    <input type="submit" id="btnEliminar" name="btnEliminar" class="btn btn-danger"
                        value="Eliminar Producto" style="width:100%">;

                </div>
            </div>
        </div>
        <script>
            /*
        function QuitarEspaciosEnBlanco(elemento) {
            $(elemento).val($(elemento).val().trim());
        }

        function QuitarTodosEspaciosEnBlanco(elemento) {
            $(elemento).val($(elemento).val().replace(/ /g, ''));
        }

        function ValidarCampos() {
            var producto = document.getElementById("txtProducto").value.trim();
            var precio = document.getElementById("txtValor").value.trim();
            var descripcion = document.getElementById("txtDescripcion").value.trim();
            var imagen = document.getElementById("txtImagen").value.trim();


            if (producto == ""|| precio == "" || descripcion == "" || imagen == "") {
                alert("Debes ingresar valores validos");
                return false;
            }

            return true;
        }
        </script>
    </form>
</body>


</html>