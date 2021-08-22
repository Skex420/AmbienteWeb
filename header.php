 <?php
 if(isset($_POST['btnBusqueda'])){
     $queryBusqueda=$_POST['txtQuery'];
     header("Location: ListaQuery.php?p=".$queryBusqueda);
    }
 ?>   
    <header>
        <form action="" method="post">
            <div id="page-content-wrapper">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a href="landingPage.php" class="nav-link">Inicio</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle active" data-toggle="dropdown" data-target="desplegable"
                                    href="#">Componentes</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="Lista.php?p=1">Tarjetas de video</a>
                                    <a class="dropdown-item" href="Lista.php?p=2">Tarjetas madre</a>
                                    <a class="dropdown-item" href="Lista.php?p=3">Memoria Ram</a>
                                    <a class="dropdown-item" href="Lista.php?p=4">Procesador</a>
                                    <a class="dropdown-item" href="Lista.php?p=5">Almacenamiento</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle active" data-toggle="dropdown" data-target="desplegable"
                                    href="#">Perifericos</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="Lista.php?p=6">Teclado</a>
                                    <a class="dropdown-item" href="Lista.php?p=7">Mouse</a>
                                    <a class="dropdown-item" href="Lista.php?p=8">Headset</a>
                                </div>
                            </li>
                            <li class="nav-item active">
                                <a href="Lista.php?p=9" class="nav-link">Accesorios</a>
                            </li>
                            <form class="form-inline">
                                <input class="form-control mr-sm-2" placeholder="Buscar..." aria-label="Search..." id="txtQuery" name="txtQuery">
                                <button class="btn btn-outline-dark" id="btnBusqueda" name="btnBusqueda">Buscar</button>
                            </form>
                        </ul>
                        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                                <li class="nav-item active">
                                    <a class="nav-link" href="logout.php">Salir</a>
                                </li>
                            </ul>
                    </div>
                </nav>
            </div>
        </form>
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
    </header>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>