<?php
session_start();
 
require 'login/init.php';
if (!isLoggedIn())
{
    header('Location: index.php');
}


require 'CRUD/banco.php';

		
       

       $pdo = Banco::conectar();
       $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       $sql = "SELECT * FROM usuarios where nivel = 'opr' ";
       $q = $pdo->prepare($sql);
       $q->execute();
       $data = $q->fetch(PDO::FETCH_ASSOC);
       Banco::desconectar();

?>


<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
<style>
        .btMenu{
            margin: 10px;
            width: 225px;
            height: 100px;
            font-size: 22px;
        }

        .sticky-footer{

        }
    </style>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-dark accordion" style="background-color: yellow" id="accordionSidebar">

      <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="painelAdm.php">
    <img class="img-responsive" width="100%" style="margin-top: 70px" src="img/Logo.png">
</a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active" style="margin-top: 70px">
        <a class="nav-link" href="painelAdm.php">
          <i class="fas fa-hamburger" style="color: black"></i>
          <span style="color: black">Inicio</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

     
      <!-- Nav Item - Pages Collapse Menu -->
 

     
    

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"  style="color: black; background-color: darkslategrey;"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

       

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

           

          

          

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Usuario</span>
                <img class="img-profile rounded-circle" src="https://img.icons8.com/pastel-glyph/2x/person-male.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Sair
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Alterar Senha</h1>
           
          </div>

          
            <div class="row">⠀⠀⠀⠀⠀⠀⠀⠀</div>
            
            
            
             <form class="form-horizontal" method="POST">
                        <fieldset>

                            <!-- Form Name -->
                            <legend>Atualizar Usuario</legend>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="txtcodigo_produto_id">Nome : </label>
                                <div class="col-md-8">
                                    <input name="user" type="text" value="<?=$data['user']?>" placeholder="" class="form-control input-md">

                                </div>
                            </div>
                           <div class="form-group">
                                <label class="col-md-4 control-label" for="txtcodigo_produto_id">Senha : </label>
                                <div class="col-md-8">
                                    <input name="senha" type="text" value="<?=$data['senha']?>" placeholder="" class="form-control input-md">

                                </div>
                            </div>
                           
                          
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="btnsalvar"></label>
                                <div class="col-md-8">
                                    <button id="btnsalvar" type="submit" name="btnsalvar" class="btn btn-primary">Salvar
                                    </button>
                                     <a id="btncancelar" onclick="location.href='painelAdm.php'"
                                        name="btncancelar" class="btn btn-danger" style="color: white">Cancelar
                                    </a>
                                </div>
                               
                            </div>
                            
                        </fieldset>
                    </form>
        
        
            
        <div class="row">⠀⠀⠀⠀⠀⠀⠀⠀</div>
            
        

                     <?php
            	if ($_POST)
            {


		          $user= $_POST['user'];
                  $senha = $_POST['senha'];
		  

		            // update data
		   
                    $pdo = Banco::conectar();
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "UPDATE usuarios  set  user= ?,  senha= ? WHERE nivel = 'opr'";
                    $q = $pdo->prepare($sql);
                    $q->execute(array($user, $senha));
                    Banco::desconectar();
                    echo"<script>  alert('Usuario Atualizado.');
                    window.location.replace('atualizarSenha.php');</script>";
		
	}
            ?>
          
      </div>
      <!-- End of Main Content -->



    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Sair do Sistema?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Selecione "OK" para sair do sistema.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancela</button>
          <a class="btn btn-primary" href="login/logout.php">Ok</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
    </div>
</body>

</html>