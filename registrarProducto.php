<?php
    session_start();
    if ($_SESSION['RolUsuario']!=1 || $_SESSION['RolUsuario']==NULL){
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
        
        echo '<script>location.replace("ajustes.php");</script>';
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
                <div class="col-1">

                    Producto
                    <input type="text" id="txtIdProducto" name="txtIdProducto" class="form-control" value=""
                        placeholder='Ingrese el id del producto' required
                        oninvalid="this.setCustomValidity('El id del producto es requerido')"
                        oninput="setCustomValidity('')" />

                </div>

                <div class="col-2">

                    Producto
                    <input type="text" id="txtProducto" name="txtProducto" class="form-control" value=""
                        placeholder='Ingrese el producto' required
                        oninvalid="this.setCustomValidity('El producto es requerido' )"
                        oninput="setCustomValidity('')" />

                </div>
                <div class="col-2">

                    Precio
                    <input type="text" id="txtValor" name="txtValor" class="form-control" value=""
                        placeholder='Ingrese el precio' required
                        oninvalid="this.setCustomValidity('El precio es requerido')" oninput="setCustomValidity('')" />

                </div>
                <div class="col-3">

                    Descripción
                    <input type="text" id="txtDescripcion" name="txtDescripcion" class="form-control" value=""
                        placeholder='Ingrese la descripción' required
                        oninvalid="this.setCustomValidity('La descripción es requerida')"
                        oninput="setCustomValidity('')" />

                </div>
                <div class="col-2">

                    Tipo
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

                    Imagen
                    <input type="text" id="txtImagen" name="txtImagen" class="form-control" value=""
                        placeholder='Ingrese el link de la imagen' required
                        oninvalid="this.setCustomValidity('El link de la imagen es requerido')"
                        oninput="setCustomValidity('')" />

                    <br />
                    <input type="submit" id="btnRegistrar" name="btnRegistrar" class="btn btn-success"
                        value="Registrar Producto" style="width:100%">
                    <br /><br />

                    <a href="ajustes.php" class="btn btn-dark btn-block" style="width:100%">Regresar</a>
                    

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


            if (producto == "" || precio == "" || descripcion == "" || imagen == "") {
                alert("Debes ingresar valores validos");
                return false;
            } else {
                return true;
            }
onsubmit="return ValidarCampos();" se coloca en el primer div donde esta el container
        }
        */
        </script>
    </form>
</body>


</html>