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
       $sql = "SELECT * FROM expediente";
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

  <title><?=$_SESSION['nome']?></title>

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
<?php require_once "sidebar.php" ?>
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
            <h1 class="h3 mb-0 text-gray-800">Home</h1>
           
          </div>

          <!-- Content Row -->
            <div class="row">
                    <button type="button" class="btn bg-gray-800 text-gray-100 btMenu "  onclick="location.href='painel_balcao.php'"><i class="fas fa-concierge-bell"></i> Balcão</button>
                  <button type="button" class="btn bg-gray-800 text-gray-100 btMenu "  onclick="location.href='painel_delivery.php'"><i class="fas fa-hotdog"></i> Delivery</button>
                   <button type="button" class="btn bg-gray-800 text-gray-100 btMenu "  onclick="location.href='painel_motoboy.php'"><i class="fas fa-clock"></i> Controle de Entrega </button>
                   
                </div>
                        <div class="row">⠀⠀⠀⠀⠀⠀⠀⠀</div>
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Gerenciar</h1>   
            </div>
            
            <div class="row">
            
                     <button type="button" class="btn bg-gray-800 text-gray-100 btMenu "  onclick="location.href='cliente.php'">Clientes <i class="fas fa-users"></i></button>
                    <button type="button" class="btn bg-gray-800 text-gray-100 btMenu "  onclick="location.href='produto.php'"> Produtos <i class="fas fa-hotdog"></i></button>
                    <button type="button" class="btn bg-gray-800 text-gray-100 btMenu "  onclick="location.href='categoria.php'">Categorias <i class="fas fa-list-alt"></i></button>
                    <button type="button" class="btn bg-gray-800 text-gray-100 btMenu "  onclick="location.href='bairro.php'">Bairros <i class="fas fa-city"></i></button>
                  <button type="button" class="btn bg-gray-800 text-gray-100 btMenu "  onclick="location.href='motoboy.php'"><i class="fas fa-motorcycle"></i> Motoboys </button>
                <button type="button" class="btn bg-gray-800 text-gray-100 btMenu "  onclick="location.href='atendente_balcao.php'"><i class="fas fa-users"></i> Atendentes Balcão</button>
                <button type="button" class="btn bg-gray-800 text-gray-100 btMenu "  onclick="location.href='atendente.php'"><i class="fas fa-users"></i> Atendentes Delivery </button>
           

        

        </div>
                    <div class="row">⠀⠀⠀⠀⠀⠀⠀⠀</div>
        
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Rotina Diaria</h1>
           
          </div>
            
        <div class="row">
              <button type="button" class="btn bg-gray-800 text-gray-100 btMenu"  onclick="location.href='relatorio.php'">Relatórios <i class="fas fa-chart-line"></i></button>
           <?php if($data['status']=="Finalizado"){ ?>
             <a class="btn bg-gray-800 text-gray-100 btMenu" href="#" data-toggle="modal" data-target="#reiniciarModal">
                  Iniciar Expediente <i class="fas fa-clock"></i>
                </a>
            <?php }
                else{
            ?>
            
             <a style=" witdh: 400px" class="btn bg-gray-800 text-gray-100 btMenu" href="#" data-toggle="modal" data-target="#finalizarModal">
                  Finalizar Expediente <i class="fas fa-clock"></i>
                </a>
            <?php } ?>
            
            </div>
            

        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

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
      
 <div class="modal fade" id="reiniciarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Iniciar Expediente?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Os pedidos recentes do ultimo expediente serão excluidos.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a class="btn btn-primary" href="reiniciar.php">Reiniciar</a>
        </div>
      </div>
    </div>
  </div>
      
      
 <div class="modal fade" id="finalizarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Finalizar Expediente?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">O expediente será finalizado e será gerado um relatório.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a class="btn btn-primary" href="finalizar.php">Finalizar</a>
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
