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
    <title>Le Tech</title>
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
        <br>
        <div class="row justify-content-center">
            <h1>Bienvenido a LeTech</h1>
        </div>
        <br>
        <div class="d-flex justify-content-center">
            <div id="carouselExampleControls" class="carousel slide w-50" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="imgs/carousel/carousel-1.png" alt="Primera imagen">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="imgs/carousel/carousel-2.png" alt="Segunda imagen">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="imgs/carousel/carousel-3.png" alt="Tercera imagen">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</body>


</html>