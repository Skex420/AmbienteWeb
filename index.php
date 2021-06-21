<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Progra Web</title>
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/simple-sidebar.css" rel="stylesheet">

</head>

<body>

  <div class="d-flex" id="wrapper">

    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">Template</div>
      <div class="list-group list-group-flush">
        <a href="index.php" class="list-group-item list-group-item-action bg-light">Semana 1 y 2</a>
      </div>
    </div>

    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-primary" id="menu-toggle">Menu</button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="#">Inicio<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Algo</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Algo más luego del divisor</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>

      <div class="container-fluid">
        <div class="row">
          <div class="col-md">
            <p id=pSaludo>Skrr</p>
          </div>
          <div class="col-md">
            <input type="text" id="txtSaludo" name="txtSaludo">
          </div>
          <div class="col-md">
            <input type="password" id="txtSaludoPrivado" name="txtSaludoPrivado">
          </div>
          <div class="col-md">
            <input type="radio" id="rbSaludo" name="rbSaludo">
          </div>
          <div class="col-md">
              <input type="checkbox" id="ckSaludo" name="ckSaludo">
            <select id="selectSaludo" name="SelectSaludo">
              <option value="1">A</option>
              <option value="2">B</option>
              <option value="3">C</option>
            </select>
          </div>
          <div class="col-md">
            <button onclick="funcionSaludo()">Prueba</button>
          </div>
        </div>
        <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
          <table class="table table-hover table-bordered table-striped">
            <thead class="thead-dark">
              <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Calificación</th>
            </thead>
            <tbody>
              <tr>
                <td>A1</td>
                <td>Persona 1</td>
                <td>50</td>
              </tr>
              <tr>
                <td>A2</td>
                <td>Persona 2</td>
                <td>70</td>
              </tr>
              <tr>
                <td>A3</td>
                <td>Persona 3</td>
                <td>95.7</td>
              </tr>
              <tr>
                <td>A4</td>
                <td>Persona 4</td>
                <td>68.9</td>
              </tr>
            </tbody>
          </div>
            <div class="col-md-3">

            </div>
          <div clas="row">
          <button onclick="traerTipoCambio()">Tipo de cambio USD</button>
          </div>
        </div>
      </div>
    </div>

  </div>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
    
    window.onload = Inicio();

    function Inicio(){
      document.getElementById("pSaludo").innerHTML="Hasta luego";
      $("#txtSaludo").val("Prueba Piola en JQuery");
      //document.getElementById("txtSaludo").value="Prueba piola";
      document.getElementById("txtSaludoPrivado").value="asd123";

    }
    function funcionSaludo(){
      alert("Mensaje de ejemplo");  
    }
    function traerTipoCambio(){
      var request=new XMLHttpRequest();
      request.open('GET','https://api.hacienda.go.cr/indicadores/tc/dolar',true);
      request.send();
      request.onload=function(){
        if(request.status>=200&&request.status<400){
          //respuesta correcta
          var respuestaSolicitud=JSON.parse(this.response);
          alert(respuestaSolicitud.venta.valor);
        }
        else{
          //respuesta incorrecta
          alert("Error");
        }
      }
    }
  </script>

</body>

</html>
