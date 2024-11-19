<?php
session_start();

if (isset($_POST['sesion'])) {
  require 'conexion.php';

  $email = $_POST['email'];
  $password = $_POST['password'];

  $query = $cnnPDO->prepare('SELECT * FROM usuarios WHERE email=:email AND password=:password');

  $query->bindParam(':email', $email);
  $query->bindParam(':password', $password);

  $query->execute();

  $count = $query->rowCount();

  if ($count) {
    $campo = $query->fetch();
    $_SESSION['nombre'] = $campo['nombre'];
    $_SESSION['email'] = $campo['email'];
    $_SESSION['password'] = $campo['password'];
    header("location: crud.php");
    exit;
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>EasyStock Login</title>
  <meta charset="utf-8">
  <meta name="description" content="Implementando el complemento Accordion de MDBoostrap">
  <meta name="keywords" content="sitio web, pagina web, navegador, buscador"> 
  <meta name="copyright" content="Todos los Derechos Exclusivos del Autor">

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
  <!-- MDB -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.1.0/mdb.min.css" rel="stylesheet"/>  
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.1.0/mdb.min.js"></script>

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
		<!-- NavBar -->
		<nav class="navbar navbar-light text-white" style="background-color: #003566;">
	  <div class="container-fluid" >
	 <a class="navbar-brand me-2 mb-1 d-flex align-items-center" href="crud.php">
       <img
          src="photos/logo.png"
          height="90"
          loading="lazy"
          style="margin-top: 1px;"/>
		  <span class="navbar-text text-white ms-3">
        EasyStock
         </span>
      </a>      
	<td>

				<!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-0 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link text-white" href="registro.php"><i class="fa-solid fa-arrow-right-to-bracket text-white"></i>&nbsp;&nbsp;Registrar</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </nav>    

  <div style="width: 40%; margin: 0 auto; margin-top: 50px; margin-bottom: 50px;">
    <div class="card border border-black text-center">
      <div class="card-header">
        <b><font color="#5B5B5B">Log in</font></b>
      </div>
      <div class="card-body">
        <h6 class="card-title"><font color="#B5B5B5"><i><strong>Inicia sesión con los datos correspondientes</strong></i></font></h6>
        <br>
        <img src="photos/a3.png" height="150" loading="lazy" style="margin-top: 1px;"/>
        <br><br>
        <form id="form" method="post" style="color: #757575;">
          <br>
          <input type="text" name="email" id="email" class="form-control" placeholder="Correo Electrónico">
          <br>
          <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña">
          <br>
          <button class="btn btn-outline-primary btn-rounded btn-block z-depth-0 my-4 waves-effect" id="sesion" name="sesion" type="submit">Iniciar Sesión</button>
        </form>
      </div>
      <div class="card-footer text-muted">
        © 2024 Copyright: EasyStack
      </div>
    </div>
  </div>  
</body>
</html>
