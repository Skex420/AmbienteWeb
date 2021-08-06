<?php
    session_start();
    if (isset($_POST['btnLogin'])){
        $username=$_POST['txtUser'];
        $pass=$_POST['txtPassword'];
        include 'ConnBD.php';
        $con=abrirBD();
        $queryConsultarUsuarioRol="call Verificacion_Login_Permisos('$username','$pass');";
        $resultadoRol=$con->query($queryConsultarUsuarioRol);
        if (mysqli_num_rows($resultadoRol)==1){
            $rol=mysqli_fetch_assoc($resultadoRol);
            $_SESSION['RolUsuario']=$rol['ID_ROL'];
            header("Location: landingPage.php");
        }else{
            header("Location: invalidLogin.php");
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
        <title>Le Tech</title>
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/simple-sidebar.css" rel="stylesheet">
        <link href="css/background.css" rel="stylesheet">
        <link href="css/inicio.css" rel="stylesheet" type="text/css">
    </head>
    <body class="text-center">
    <h6 class="text-danger">Usuario no encontrado</h6>
    </div>
        <?php
            include 'loginBox.php';
        ?>
    </body>
