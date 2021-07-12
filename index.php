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
    <link href="css/background.css" rel="stylesheet" type="text/css">
    <link href="css/inicio.css" rel="stylesheet" type="text/css">

</head>

<body>
    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a href="index.php" class="nav-link">Inicio</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" data-toggle="dropdown" data-target="desplegable"
                            href="#">Componentes</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="tarjetaMadre.php">Tarjetas madre</a>
                            <a class="dropdown-item" href="tarjetaVideo.php">Tarjetas de video</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" data-toggle="dropdown" data-target="desplegable"
                            href="#">Perifericos</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Tarjetas madre</a>
                            <a class="dropdown-item" href="#">Tarjetas de video</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" data-toggle="dropdown" data-target="desplegable"
                            href="#">Accesorios</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Tarjetas madre</a>
                            <a class="dropdown-item" href="#">Tarjetas de video</a>
                        </div>
                    </li>
                    <form class="form-inline">
                        <input class="form-control mr-sm-2" placeholder="Buscar..." aria-label="Search...">
                        <button class="btn btn-outline-dark">Buscar</button>
                    </form>
                </ul>
            </div>
        </nav>
    </div>

    <div class="cuadroGiratorio">
        <div class="cuadro"></div>
        <div class="cuadro"></div>
        <div class="cuadro"></div>
        <div class="cuadro"></div>
        <div class="cuadro"></div>
        <div class="cuadro"></div>
        <div class="cuadro"></div>
        <div class="cuadro"></div>
        <div class="cuadro"></div>
        <div class="cuadro"></div>
    </div>

    <div class="cuadroGiratorio2">
        <div class="cuadro2"></div>
        <div class="cuadro2"></div>
        <div class="cuadro2"></div>
        <div class="cuadro2"></div>
        <div class="cuadro2"></div>
        <div class="cuadro2"></div>
        <div class="cuadro2"></div>
        <div class="cuadro2"></div>
        <div class="cuadro2"></div>
        <div class="cuadro2"></div>
    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
</body>

</html>