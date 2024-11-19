<?php
require_once 'conexion.php';  // Este archivo define la variable $cnnPDO

if (isset($_POST['registrar'])) {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];

    // Validar que no haya campos vacíos
    if (!empty($nombre) && !empty($email) && !empty($password) && !empty($confirm)) {
        // Verificar que las contraseñas coinciden
        if ($password === $confirm) {
            // Hashear la contraseña para mayor seguridad
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Verificar si el email ya está registrado
            $checkEmail = $cnnPDO->prepare("SELECT * FROM usuarios WHERE email=:email");
            $checkEmail->bindParam(':email', $email);
            $checkEmail->execute();

            if ($checkEmail->rowCount() == 0) {
                // Preparar la consulta para insertar el nuevo usuario
                $sql = $cnnPDO->prepare("INSERT INTO usuarios (nombre, email, password) VALUES (:nombre, :email, :password)");
                $sql->bindParam(':nombre', $nombre);
                $sql->bindParam(':email', $email);
                $sql->bindParam(':password', $hashedPassword);
                $sql->execute();
                echo "Registro exitoso.";
            } else {
                echo "El correo electrónico ya está registrado.";
            }
        } else {
            echo "Las contraseñas no coinciden.";
        }
    } else {
        echo "Por favor, completa todos los campos.";
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
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  
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
         <img src="photos/logo.png"
          height="90"
          loading="lazy"
          style="margin-top: 1px;"/>
		  <span class="navbar-text text-white ms-3">
        EasyStock
         </span>
      </a>      
	<td>
  <nav class="navbar navbar-expand-lg">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-0 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link text-white" href="index.php"><i class="fa-solid fa-arrow-right-to-bracket text-white"></i>&nbsp;&nbsp;Log In</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </nav>    
  </nav>
    <!-- Card Section with margins -->
<div style="width: 40%; margin: 50px auto;">
  <div class="card border border-black text-center">
    <div class="card-header">
      <b><font color="#5B5B5B">Registro</font></b>
    </div>
    <div class="card-body">
      <h6 class="card-title"><font color="#B5B5B5"><i><strong>Para registrarte, necesitamos validar tus datos</strong></i></font></h6>
      <br>
      <img src="photos/r1.png" height="150" loading="lazy" style="margin-top: 1px;"/>
      <br><br>
      <form id="form" method="post" style="color: #757575;">
        <font face="Century Gothic">
          <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre">
          <br>
          <input type="text" name="email" id="email" class="form-control" placeholder="Correo Electronico">
          <br>
          <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña">
          <br>
          <input type="password" name="confirm" id="confirm" class="form-control" placeholder="Confirma contraseña">
        </font>
        <br>
        <button class="btn btn-outline-primary btn-rounded btn-block z-depth-0 my-4 waves-effect" id="registrar" name="registrar" type="submit">Registrar</button>
        <br>
        <!-- reCAPTCHA -->
        <div class="g-recaptcha" data-sitekey="6LdsgYAqAAAAAPVYdFz3ubep_jsgQzxTNAr1k6LI" style="display: flex; justify-content: center; margin-top: 10px;"></div>
      </form>
    </div>
    <div class="card-footer text-muted">
      © 2024 Copyright : EasyStock
    </div>
  </div>
</div>

</body>
</html>

<script type="text/javascript">
    $(document).ready(function() {
        let formatoemail = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;

    $('#registrar').click(function() {
    if ($("#nombre").val() == ""){
             Swal.fire({
                      icon: 'error',
                      title: '¡¡¡Error!!!',
                      text: 'Debe de Ingrese su Nombre..',
                      //position: 'top-end',
                      showConfirmButton: true,
                      ConfirmButtonText: 'Aceptar',
                      timerProgressBar: true,
                      //timer: 1000
                    }).then(function(){
                        window.location="#"
                    });
            return false;
          }

     if ($("#email").val() == ""){
             Swal.fire({
                      icon: 'error',
                      title: 'Ingresa el correo',
                      text: 'Debe de Ingrese su CORREO..',
                      //position: 'top-end',
                      showConfirmButton: true,
                      ConfirmButtonText: 'Aceptar',
                      timerProgressBar: true,
                      //timer: 2500
                      
                    }).then(function(){
                        //window.location="registro.php"
                    });
    
            return false;
          }else if ($("#email").val() == "" || !formatoemail.test($("#email").val())){
            Swal.fire({
                      icon: 'error',
                      title: 'Datos incorrectos',
                      text: 'Debe de Ingrese un correo valido',
                      //position: 'top-end',
                      showConfirmButton: true,
                      ConfirmButtonText: 'Aceptar',
                      timerProgressBar: true,
                      //timer: 2500
            })
            return false
          }

      

          if ($("#password").val() == ""){
             Swal.fire({
                      icon: 'error',
                      title: '¡¡¡Error!!!',
                      text: 'Debe de Ingresar contraseña..',
                      //position: 'top-end',
                      showConfirmButton: trues,
                      ConfirmButtonText: 'Aceptar',
                      timerProgressBar: true,
                      //timer: 2500
                      
                    }).then(function(){
                        //window.location="registro.php"
                    });
            return false;
          }

          else if ($("#confirm").val() !== $("#password").val() || ""){
             Swal.fire({
                      icon: 'error',
                      title: '¡¡¡Error!!!',
                      text: 'Las contraseñas no coinciden..',
                      //position: 'top-end',
                      showConfirmButton: true,
                      ConfirmButtonText: 'Aceptar',
                      timerProgressBar: true,
                      //timer: 2500
                      
                    }).then(function(){
                        //window.location="registro.php"
                    });
            return false;
          }


        
      });
    });
    </script>