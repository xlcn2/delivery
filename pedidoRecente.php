<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Lanche du Gambá</title>

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
    <ul class="navbar-nav sidebar sidebar-dark accordion" style="background-color: yellow" id="accordionSidebar">

      <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="painelInicial.php">
    <img class="img-responsive" width="100%" style="margin-top: 70px" src="img/Logo.png">
</a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active" style="margin-top: 70px">
        <a class="nav-link" href="painelInicial.php">
          <i class="fas fa-hamburger" style="color: black"></i>
          <span style="color: black">Inicio</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading" style="color: darkslategrey">
        Gerenciadores
      </div>
         <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
         <i class="fas fa-hamburger" style="color: black"></i>
          <span  style="color: black">Movimentação</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Adicionar:</h6>
            <a class="collapse-item" href="pedido.php">Pedidos</a>
          </div>
        </div>
      </li>
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-plus"  style="color: black"></i> 
          <span  style="color: black">Cadastro</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Cadastrar:</h6>
              <a class="collapse-item" href="atendente.php">Atendentes</a>
            <a class="collapse-item" href="cliente.php">Clientes</a>
            <a class="collapse-item" href="produto.php">Produtos</a>
            <a class="collapse-item" href="categoria.php">Categorias</a>
            <a class="collapse-item" href="bairro.php">Bairros</a>
          </div>
        </div>
      </li>

     

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading" style="color: darkslategrey">
        Diário
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
 

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="relatorio.php">
          <i class="fas fa-fw fa-chart-area"  style="color: black"></i>
          <span  style="color: black">Relatório</span></a>
      </li>

    

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
              <div class="card shadow mb-4">
              
            <div class="card-header py-3">
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Pedidos Recentes</h1>
           
          </div>

         
 <!-- DataTales Example -->
          <div class="card shadow mb-4">
              
              
             <div class="card-body">
                  <div class="mb-1 big">Etapa 1/2</div>
                  <div class="progress mb-4">
                    <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  
                 
                </div>
              <?php 
                    include_once 'CRUD/banco.php';
              
                   $pdo = Banco::conectar();
                   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                   $sql = "SELECT dataPedido FROM dataPedidos ORDER BY dataPedido DESC LIMIT 1";
                   $q = $pdo->prepare($sql);
                   $q->execute();
                   $data = $q->fetch(PDO::FETCH_ASSOC);
                   Banco::desconectar();
                   $expediente = $data['dataPedido'];
                   $pdo = Banco::conectar();
              
              
                   $sql = 'SELECT * FROM ordem_pedido where data_pedido like "'.$expediente.'" ';
                          $qtDiaria = 0; 
                        foreach($pdo->query($sql)as $row)
                        {   $qtDiaria += 1;
                            
                        }
              
              
              
              
                     $pdo = Banco::conectar();
                       $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                       $sql = "SELECT * FROM expediente";
                       $q = $pdo->prepare($sql);
                       $q->execute();
                       $exp = $q->fetch(PDO::FETCH_ASSOC);
                       Banco::desconectar();
              ?>
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Selecione o Cliente Para a Entrega</h6>
             <button type="button" class="btn btn-success" onclick="location.href='adicionarClientePedido.php'" style="height:30px; font-size: 13px; width:150px; margin: 15px;">Adicionar Cliente <i class="fas fa-plus"></i></button>
               <button type="button" class="btn btn-success" onclick="location.href='pedido.php'" style="height:30px; font-size: 13px; width:150px; margin: 15px;">Novo Pedido <i class="fas fa-plus"></i></button>
                
                <div class="btn " style="height:30px; font-size: 13px; margin: 15px; float: right;  font-size: 20px">   <?php if($exp['status']=="Finalizado"){ ?> <b>Expediente Finalizado - </b>  <?php }?><b>Pedidos Efetuados: <?= $qtDiaria?></b> </div>
            </div>
            <div class="card-body" style="padding: 0">
              <div class="table-responsive">
                <table class="table table-striped" width="100%" cellspacing="0">
                  <thead  class="thead-dark">
                    <tr>
                      
                      <th>n°</th>
                      <th>Telefone</th>
                      <th>Cliente</th>
                      <th>Pedido</th>
                        <th>Dia</th>
                        <th>Horário</th>
                        <th>Total</th>
                    
                      
                      <th style="width: 210px;">Ações</th>
                    </tr>
                  </thead>
                 
                  <tbody>
                       <?php
                       
                        include_once 'CRUD/banco.php';
                        $pdo = Banco::conectar();
                        $sql = 'SELECT * FROM ordem_pedido ORDER BY codigo DESC';
                        Banco::desconectar();
                        foreach($pdo->query($sql)as $row){ 
                      ?>
                      <tr>
                      <?php 
                            
                           $idCliente = $row['idCliente'];
                           $pdo = Banco::conectar();
                           $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                           $sql = "SELECT * FROM cliente where id = ?";
                           $q = $pdo->prepare($sql);
                           $q->execute(array($idCliente));
                           $data = $q->fetch(PDO::FETCH_ASSOC);
                           Banco::desconectar();

                         ?>
                      <td><?=$row['codigo']?></td>  
                      <td><?=$data['telefone']?></td>
                      <td><?=$data['nome']?></td>
                    <td>  
                       <?php
                        
                        include_once 'CRUD/banco.php';
                        $pdo = Banco::conectar();
                        $sql = 'SELECT * FROM pedidoRecente where id = '.$row['id_pedido'].'';
                        Banco::desconectar();
                        foreach($pdo->query($sql)as $row2){
                         
                     
                        
                      ?>
                          <?=$row2['detalhes']?><br>
                    <?php } ?>
                      </td>
                         <td>
                              <?php 
                         $dt = $row['data_pedido'];
                        $dataRelatorio = date("d/m/Y", strtotime($dt));
                            echo $dataRelatorio;   ?> </td>
                          <td> <?=$row['hora']?></td>
                          <td style="width: 120px;">R$ <?php echo number_format($row['valor_pedido'],2,",","");?> </td>
                    
                            <th  style="width: 250px;">
                     
                    
              <?php if($exp['status']=="Finalizado"){
                                
                            }else{?>
                                
                            
                     <a placeholder="excluir"  href="pedidoAnterior.php?id=<?=$data['id']?>&idPed=<?=$row['id_pedido']?>"  class="btn btn-secondary" style="height:30px; font-size: 13px; margin: 1px; width: 100px; float: left; ">Alterar <i class="fas fa-edit"></i></a>
                    <button data-toggle="modal" data-target="#cancelarModal<?=$row['id']?>"   class="btn btn-warning" style="height:30px; font-size: 13px; margin: 1px; width: 95px; float: left; color: #4F4F4F; "> Cancelar <i class="fas fa-minus-circle"></i> </button>
                                <div class="modal fade" id="cancelarModal<?=$row['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Cancelar Pedido?</h5>
                                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                  </button>
                                </div>
                                <div class="modal-body">Ao prosseguir os dados desse pedido serão excluidos do sistema e do relatório dário.</div>
                                <div class="modal-footer">
                                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                                  <a class="btn btn-warning" href="CRUD/cancelar_all.php?id=<?=$row['id_pedido']?>&idPed=<?=$row['id_pedido']?>" style="color: #4F4F4F"> Prosseguir</a>
                                </div>
                              </div>
                            </div>
                          </div>
                                 
                        <?php }?>   
                      
                          </th>
               
                <?php
 


                          
	
                   }
                        
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

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
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
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a class="btn btn-primary" href="index.php">Ok</a>
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
    </div>
    </body>

</html>