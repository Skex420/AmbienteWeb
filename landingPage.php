<?php
    session_start();
    if ($_SESSION['RolUsuario']==NULL){
        header("Location: index.php");
    }
    include 'ConnBD.php';

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Admin</title>
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
        <h2>Bienvenido</h2>
    </div>
</body>


</html>