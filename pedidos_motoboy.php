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
            <h1 class="h3 mb-0 text-gray-800">Pedidos </h1>
           
          </div>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
              <button type="button" class="btn btn-secondary" onclick="location.href='painel_motoboy.php'" style="height:30px; font-size: 13px; width:110px; margin: 15px;"><i class="fas fa-arrow-left"></i> Voltar</button>
            <div class="card-header py-3">
                
              <h6 class="m-0 font-weight-bold text-primary">Pedidos em espera</h6>
            </div>
            <div class="card-body" style="padding: 0">
              <div class="table-responsive">
                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                  <thead  class="thead-dark">
                    <tr>
                      <th>Descrição</th>
                      <th>Valor Entrega</th>
                      <th>Valor Pedido</th>
                      <th>Cliente</th>
                      <th style="width: 210px;">Ações</th>
                    </tr>
                  </thead>
                  <tfoot  class="thead-dark">
                    <tr>
                      <th>Descrição</th>
                      
                      <th>Valor Entrega</th>
                      <th>Valor Pedido</th>
                      <th>Cliente</th>             
                      <th style="width: 210px;">Ações</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                       
                        include_once 'CRUD/banco.php';
                        $pdo = Banco::conectar();
                        $sql = 'SELECT * FROM ordem_pedido WHERE id_motoboy IS NULL';
                        
                        foreach($pdo->query($sql)as $row)
                       
                        { 
                      
                      ?> 
                        <tr>
			             <td><?php
                        
                     
                        $pdo = Banco::conectar();
                        $sql = 'SELECT * FROM pedidoRecente where id = '.$row['id_pedido'].'';
                        Banco::desconectar();
                        foreach($pdo->query($sql)as $row2){
            
                      ?>
                          <?=$row2['detalhes']?><br>
                    <?php } ?></td>
               
                         
                         <td>
                          
                             R$ <?php $val = $row['valor_entrega'];
                                echo number_format($val,2,",","");?>
                         </td>
                         <td>  
                             R$ <?php echo number_format($row['valor_pedido'],2,",","");?></td>
                        <?php
                                 

                                       
                                           $pdo = Banco::conectar();
                                           $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                           $sql = "SELECT * FROM cliente where id = ".$row['idCliente']."";
                                           $q = $pdo->prepare($sql);
                                           $q->execute();
                                           $data = $q->fetch(PDO::FETCH_ASSOC);
                                           Banco::desconectar();
                                    ?>
                         <td><?=$data['nome']?></td>
                 
                      <th  style="width: 260px;">
                     <button  data-toggle="modal" data-target="#entregue<?=$row['id']?>"  class="btn btn-success" style="height:30px; font-size: 13px; margin: 1px; width: 100px; float: left; ">Entregue <i class="fa fa-check"></i></button>
                            
                      </th>

                          <div class="modal fade" id="entregue<?=$row['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Marcar Pedido de <?=$data['nome']?> como entregue.</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <form action="CRUD/update_pedido_motoboy.php" method="post">
                                <div class="form-group">
                                        <div class="col-md-7">
                                         <select class="form-control"  name="id_motoboy" id="exampleFormControlSelect1" placeholder="Escolher Motoboy" required>
                                             <option value="">Selecionar Motoboy...</option>
                                            <?php

                                            $pdo = Banco::conectar();
                                            $sql = 'SELECT * FROM motoboy';

                                            foreach($pdo->query($sql)as $row3)
                                            { ?>
                                                    <option value="<?=$row3['id']?>">  <?=$row3['nome']?> </option>
                                             <?php }
                                            Banco::desconectar();  ?>
                                        </select>
                                    </div>
                                </div>
                                    <div class="form-group">
                                        <div class="col">
                                    <input  name="id_pedido" value="<?=$row['id']?>" type="hidden">
                                     <input type="submit" value="Ok" class="btn btn-success"/>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar </button>
                                        </div>
                                        </div>

                                      </form>
                                  </div>
                                  <div class="modal-footer">

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
      <!-- End of Main Content -->

      <!-- Footer -->
     
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
