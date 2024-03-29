<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Crud-PetClinic</title>
        
        <meta charset="utf-8" />
        
        <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="assets/css/bootstrap-theme.min.css" />
        <link rel="stylesheet" href="assets/js/jquery-ui/jquery-ui.min.css" />
        <link rel="stylesheet" href="assets/css/style.css" />
        <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>

	</head>
    <body>
        <nav class="navbar navbar-inverse navbar-static-top">
          <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="index.php">PetClinic-Crud</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Entidades <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="persona.php">Personas</a></li>
                    <li><a href="mascota.php">Mascotas</a></li>
                    <li><a href="propietario.php">Propietarios</a></li>
                    <li><a href="historial.php">Historial</a></li>
                  </ul>
                </li>
                <li><a href="./logout.php">Salir</a></li>
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
    <div class="container">