<?php include_once("controladores/controladorClientes.php");
      include_once("controladores/enrutador.php");?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Pagina Principal</title>

    <link rel="stylesheet" href="recursos/iconos/fonts/style.css">
    <link rel="stylesheet" href="recursos/css/stilo1.css">
    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/5.0.0/normalize.css">
    <script src=" http://code.jquery.com/jquery-latest.js"></script>
    </head>
  <body>
    <header>
      <div class="titlulo-cabecera">
        <h1> Sistema de Gestion</h1>
      </div>

      <nav>
          <ul class="menu-principal">
            <li><a href="#"><span class="icon-home"></span></a></li>
            <li><a href="#">Clientes</a></li>
            <li><a href="#">Productos</a></li>
            <li><a href="#">Facturas</a></li>
          </ul>

      </nav>
    </header>

    <section class="panel-lateral">
      <h1>menu lateral</h1>
    </section>
    <section class="panel-principal">
      <?php  $enrutador = new enrutador();

          if ($enrutador->validarVariables(isset($_GET['modulo']),isset($_GET['cargar']))) {
					       $enrutador->cargarVista($_GET['cargar'], $_GET['modulo']);
				}


       ?>
    </section>

    <footer>

    </footer>

  </body>
</html>
