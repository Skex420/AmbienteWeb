<?php

    if (isset($_POST['btnRegister'])){
        $username=$_POST['txtUsuario'];
        $pass=$_POST['txtPass'];
        include 'ConnBD.php';
        $con=abrirBD();
        $queryBuscarUsuario="call Buscar_Usuario('$username');";
        $resultadoBusqueda=$con->query($queryBuscarUsuario);
        $con -> next_result();
        if (mysqli_num_rows($resultadoBusqueda)==0){
            $queryConsultarUsuarioRol="call Insertar_Usuario('$username','$pass',2);";
            $resultadoRol=$con->query($queryConsultarUsuarioRol);
            $con -> next_result();
            CerrarBD($con);
            header("Location: index.php");
        }else{
            CerrarBD($con);
            header("Location: Registration.php");
        }

    }

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
<header>

</header>

<body class="text-center">
    <form action="" method="post">
        <div class="container align-items-center">
            <div class="row">
                <div class="col-12">
                    <h2>Página de registro</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <label for="txtUsuario">Usuario</label>
                    <input type="text" id="txtUsuario" name="txtUsuario" class="form-control" value=""
                        placeholder='Ingrese el usuario a registrar' required
                        oninvalid="this.setCustomValidity('El usuario es requerido')" oninput="setCustomValidity('')" />
                </div>
            </div>
            <div class="row">
                <div class="col-12">

                    <label for="txtPass">Contraseña</label>
                    <input type="text" id="txtPass" name="txtPass" class="form-control" value=""
                        placeholder='Ingrese la contraseña deseada' required
                        oninvalid="this.setCustomValidity('La contraseña es requerida')"
                        oninput="setCustomValidity('')" />
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <br />
                    <input type="submit" class="btn btn-light btn-outline-dark" name="btnRegister" value="Registrar" />
                </div>
            </div>
        </div>



    </form>
</body>

</html>