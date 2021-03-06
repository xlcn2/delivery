<?php
session_start();
 
require 'login/init.php';
if (!isLoggedIn())
{
    header('Location: index.php');
}

require 'CRUD/banco.php';

        
?>
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
<style>
    .pedidos{
        
            padding: 10px;
            border: 1px solid lightgrey;
         
            margin-bottom: 20px;
            background-color: white; 
            border-radius: 23px;
            box-shadow: 10px 10px 10px rgba(0, 0, 0, 0.5);
    }
    </style>
    
        
    <script>
    
    $('#my_form').keydown(function() {
var key = e.which;
if (key == 13) {
// As ASCII code for ENTER key is "13"
$('#my_form').submit(); // Submit form code
}
});
    </script>
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
            <a class="collapse-item" href="pedido.php">Pedido</a>
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

            
             <div class="card-body">
                  <div class="mb-1 big">3/3</div>
                  <div class="progress mb-4">
                    <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <legend>Confirmar Pedido</legend>
                 
                </div>
                   <div  class= "pedidos">     <!-- Content Row -->
                    <form class="form-horizontal" method="POST" id="myForm"  action="gerarPedido.php">
                        <fieldset>
                            <!-- Form Name -->
                            <legend>Dados do Cliente</legend>
'                           <hr>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="nome">Nome : </label>
                                <div class="col-md-8">
                                    <input name="nome" value="<?=$_POST['nome']?>" type="text" placeholder="" class="form-control input-md" readonly>

                                </div>
                            </div>
                              <input name="idCliente" hidden value="<?=$_POST['idCliente']?>" type="text" placeholder="" class="form-control input-md telefone">

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="telefone">Telefone : </label>
                                <div class="col-md-8">
                                    <input name="telefone" value="<?=$_POST['telefone']?>" type="text" placeholder="" class="form-control input-md telefone" readonly>

                                </div>
                            </div>
                           

                            
                            
                           
                            <div class="form-group">
                                <div class="col-sm-8">
                                    <label class="control-label " for="endereco">  Endereço : </label>
                                    <input id="logradouro" name="endereco" type="text" placeholder=""
                                        class="form-control input-md" value="<?=$_POST['endereco']?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-8">
                                    <label class="control-label " for="complemento">  Complemento : </label>
                                    <input id="complemento" name="complemento" type="text" placeholder=""
                                        class="form-control input-md" value="<?=$_POST['complemento']?>" readonly>
                                </div>
                            </div>
                          <div class="form-group">
                                <div class="col-sm-8">
                                    <label class="control-label " for="endereco">  Bairro : </label>
                                    <input id="logradouro" name="bairro" type="text" placeholder=""
                                        class="form-control input-md" value="<?=$_POST['bairro']?>"  readonly>
                                </div>
                            </div>
                            
                         <div class="form-group">
                                <div class="col-sm-8">
                                    <label class="control-label " for="valor">  Valor da Entrega : </label>
                                    <input id="logradouro" name="valor" type="hidden" placeholder=""
                                        class="form-control input-md" value="<?=$_POST['valor']?>" readonly>
                                </div>
                            </div>
                          
                        
                        <div style=" ">
                           <legend>Pedido</legend>
                             <div class="table-responsive">           
                                <table  id="tabela" class="table table-striped" width="100%" style="background-collor: black">
                                    <tr>
                                    </tr>
                                                             
                                 <?php     
                                     $tot_itens = 0;           
                                    $id = $_POST['lanche'];
                                    $quantidade = $_POST['QTD'];
                                    $obs = $_POST['observacao'];
          

             
                                              
                                    for($i = 0; $i < count($id); $i++) { ?>
                
                                <tr>
                                    <td>
                                        <label>Nome:</label>
                                    </td>
                                    <td>
                                        <?php $idLanche = $id[$i];
                                           $pdo = Banco::conectar();
                                           $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                           $sql = "SELECT * FROM lanche where id = ?";
                                           $q = $pdo->prepare($sql);
                                           $q->execute(array($idLanche));
                                           $data = $q->fetch(PDO::FETCH_ASSOC);
                                           Banco::desconectar(); ?>
                                        
                                        <input name="lanche[]" type="hidden" value="<?=$id[$i]?>" style="width: 60px"placeholder="" class="form-control input-md "> 
                                        <input name="" required type="text" value="<?=$data['nome']?> - <?=$data['valor']?> R$" style="width: 460px"placeholder="" class="form-control input-md " readonly> 
                                        
                                    </td>
                                   
                                    <td>
                                        <label>Qtd:</label>
                                    </td>
                                    <td>
                                       <input name="QTD[]" required type="number"  value="<?=$quantidade[$i]?>"  style="width: 60px"placeholder="" class="form-control input-md " readonly> 
                                    </td>

                                     <td>
                                        <label>Obs:</label>
                                    </td>
                                    <td>
                                        
                                       <input name="observacao[]" style="width: 170px"  value="<?=$obs[$i]?>"  type="text" placeholder="" class="form-control input-md" readonly > 
                                    </td>

                                
                                    </tr>
                                  <?php }  ?>
                                </table>
                                </div>

                            
                            
                                          <?php     
                                             $tot_itens = 0;           
                                            $id = $_POST['lanche'];
                                        $quantidade = $_POST['QTD'];




                                        for($i = 0; $i < count($id); $i++) {

                                           $idLanche = $id[$i];
                                           $pdo = Banco::conectar();
                                           $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                           $sql = "SELECT * FROM lanche where id = ?";
                                           $q = $pdo->prepare($sql);
                                           $q->execute(array($idLanche));
                                           $data = $q->fetch(PDO::FETCH_ASSOC);
                                           Banco::desconectar();
                                           $tot_itens += $data['valor']*$quantidade[$i];


                                        }
                                                        ?>
                          
                              
                              <br><br>
                            <div class="table-responsive">  
                            <table  class="table table-striped" width="100%">
                            <td><legend>Valores:</legend> </td><td>
                             <div class="form-group row">
                                       
                                        <div class="col-sm-9">
                                              <input type="text" disabled="disabled" value="Sub-total: <?=$tot_itens?> R$ ⠀⠀⠀  Entrega: <?=$_POST['valor']?> R$⠀⠀⠀  Total: <?= $tot_itens+$_POST['valor']?> R$" id="result" class="form-control input-md" >   
                                       </div>
                                       </div>  </td>  
                                  <hr>
                                
                            </table>
                            </div>
                            <legend>Atendimento</legend>
                            
                            
                            </div>
                              <div class="form-group">
                                <div class="col-sm-3">
                                    <label class="control-label " for="endereco"> Nome do Atendente : </label>
                                    <select  class="form-control" name="atendente"  id="exampleFormControlSelect1" placeholder="Pequisar" required>
                                    <option value="">Selecionar Lanche...</option>
                                   <?php
                       
                        include_once 'CRUD/banco.php';
                        $pdo = Banco::conectar();
                        $sql = 'SELECT * FROM atendente';
                        
                        foreach($pdo->query($sql)as $row)
                        { ?>
                                <option value="<?=$row['nome']?>"><?=$row['nome']?></option>
                              
                  <?php }
                        Banco::desconectar();  ?>
                        </select>
                                </div>
                            </div>
                             <script language="javascript">   
                            function moeda(a, e, r, t) {
                                let n = ""
                                  , h = j = 0
                                  , u = tamanho2 = 0
                                  , l = ajd2 = ""
                                  , o = window.Event ? t.which : t.keyCode;
                                if (13 == o || 8 == o)
                                    return !0;
                                if (n = String.fromCharCode(o),
                                -1 == "0123456789".indexOf(n))
                                    return !1;
                                for (u = a.value.length,
                                h = 0; h < u && ("0" == a.value.charAt(h) || a.value.charAt(h) == r); h++)
                                    ;
                                for (l = ""; h < u; h++)
                                    -1 != "0123456789".indexOf(a.value.charAt(h)) && (l += a.value.charAt(h));
                                if (l += n,
                                0 == (u = l.length) && (a.value = ""),
                                1 == u && (a.value = "0" + r + "0" + l),
                                2 == u && (a.value = "0" + r + l),
                                u > 2) {
                                    for (ajd2 = "",
                                    j = 0,
                                    h = u - 3; h >= 0; h--)
                                        3 == j && (ajd2 += e,
                                        j = 0),
                                        ajd2 += l.charAt(h),
                                        j++;
                                    for (a.value = "",
                                    tamanho2 = ajd2.length,
                                    h = tamanho2 - 1; h >= 0; h--)
                                        a.value += ajd2.charAt(h);
                                    a.value += r + l.substr(u - 2, u)
                                }
                                return !1
                            }
                             </script> 
                         <div class="form-group">
                                <div class="col-sm-3">
                                    <label class="control-label " for="valor">  Valor a receber : </label>
                                    <input  name="troco" type="text" 
                                        class="form-control input-md" placeholder="R$"  onKeyPress="return(moeda(this,'.',',',event))">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="btnsalvar"></label>
                                <div class="col-md-8">
                                    <button id="btnsalvar" type="submit" name="btnsalvar" class="btn btn-success" >Registrar Pedido e Baixar
                                    <i class="fas fa-print"></i></button>
                                    <a id="btncancelar" href="pedidoRecente.php"
                                        name="btncancelar" class="btn btn-secondary">Finalizar
                                    </a>
                                    
                                </div>
                            </div>

                  
                            
                </fieldset>            
</form>  
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
    
    

  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />

    <script>
     $(document).ready(function () {
      $('select').selectize({
          sortField: 'text'
      });
  });
    </script>
    
  
    
<script>
    $('#myForm').submit(function(){
    $(this).find(':input[type=submit]').prop('disabled', true);
});    
</script>

</body>

</html>