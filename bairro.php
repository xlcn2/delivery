<?php
session_start();
 
require 'login/init.php';
if (!isLoggedIn())
{
    header('Location: index.php');
}
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
            <h1 class="h3 mb-0 text-gray-800">Bairros</h1>
           
          </div>

         

        
          <!-- Page Heading -->
          
        

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
              <button type="button" class="btn btn-success" onclick="location.href='adicionar_bairro.php'" style="height:30px; font-size: 13px; width:100px; margin: 15px;">Adicionar <i class="fas fa-plus"></i></button>
            <div class="card-header py-3">
                
              <h6 class="m-0 font-weight-bold text-primary">Informações sobre os servidores cadastrados</h6>
            </div>
            <div class="card-body" style="padding: 0">
              <div class="table-responsive">
                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                  <thead  class="thead-dark">
                    <tr>
                      <th>Codigo</th>
                      <th>Nome</th>
                      <th>Valor de entrega</th>
                      <th style="width: 210px;">Ações</th>
                    </tr>
                  </thead>
                  <tfoot  class="thead-dark">
                    <tr>
                      <th>Codigo</th>
                      <th>Nome</th>
                      <th>Valor de entrega</th>                 
                      <th style="width: 210px;">Ações</th>
                    </tr>
                  </tfoot>
                  <tbody>
   
                    <?php
                       
                        include_once 'CRUD/banco.php';
                        $pdo = Banco::conectar();
                        $sql = 'SELECT * FROM bairro';
                        
                        foreach($pdo->query($sql)as $row)
                        { ?> <tr>
			             <td><?=$row['id']?></td>
                          <td><?=$row['nome']?></td>
                       <td>R$ <?=number_format($row['valorEntrega'],2,",","")?> </td>
                      
                      <th  style="width: 210px;">
                      <a  href="CRUD/updateBairro.php?id=<?=$row['id']?>"  class="btn btn-primary" style="height:30px; font-size: 13px; margin: 1px; width: 80px; float: left; ">Editar <i class="far fa-edit"></i></a>
                            
                      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal<?=$row['id']?>" style="height:30px; font-size: 13px; margin: 1px; width: 80px; float: left; ">Excluir <i class="far fa-trash-alt"></i></button></th>
                         
                         <div class="modal fade" id="exampleModal<?=$row['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Deletar Categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       Deletar Essa Categoria do Sistema?

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <a href="CRUD/deleteBairro.php?id=<?=$row['id']?>"  class="btn btn-danger">Confirmar</a>
      </div>
    </div>
  </div>
</div>
                      </tr>
	
                <?php
 


        
	
                   }
                        Banco::desconectar();
                        ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>




        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

   
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

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
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
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

                <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
                <link rel="stylesheet" href="css/paginacao.css">
                <script type="text/javascript" src="js/paginacao.js"></script>

                <script>
                    $(document).ready(function() {
                        $('#dataTable').dataTable();
                    });
                </script>
    </div>
</body>

</html>