<?php
session_start();
 
require 'login/init.php';
if (isLoggedIn())
{
    header('Location: painelInicial.php');
}
?>

<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SCOOBY LANCHES</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body style="background-color: yellow">
<header>
<nav class="navbar navbar-light bg-light">
  <a class="navbar-brand" href="https://www.playersites.com.br/">
    Desenvolvido por <img src="img/logo-player.png" width="100" height="65" alt="Player Sites">
  </a>
    </nav>
</header>
  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0" style=" box-shadow: 10px 10px 10px rgba(0, 0, 0, 0.5) !important;">
            <!-- Nested Row within Card Body -->
            <div class="row" style="">
              <div class="col-lg-6 d-none d-lg-block" style="background-color: yellow"><img src="img/Logo.png" style="width: 100%"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Faça o Login</h1>
                  </div>
                  <form class="user"  method="get" action="login/validar.php">
                    <div class="form-group">
                      <input type="text" name="login" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Login">
                    </div>
                    <div class="form-group">
                      <input type="password" name="senha" class="form-control form-control-user" id="exampleInputPassword" placeholder="Senha">
                    </div>
                    <div class="form-group">
                     
                    </div>
                   
                     <button type="submit" class="btn btn-primary btn-user btn-block">
                      Login
                    </button>
                 
                  </form>
                 
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
 <footer class="sticky-footer bg-white" style="margin-top: 53px !important; 
    position: fixed;
    height: 50px;
    background-color: red;
    bottom: 0px;
    left: 0px;
    right: 0px;
    margin-bottom: 0px;

">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; <a href="https://www.playersites.com.br/">Player Sites 2020</a></span>
          </div>
        </div>
      </footer>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
