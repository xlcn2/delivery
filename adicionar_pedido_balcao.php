<?php
session_start();
 
require 'login/init.php';
if (!isLoggedIn())
{
    header('Location: index.php');
}

require 'CRUD/banco.php';

		$id = $_REQUEST['id'];
       

       $pdo = Banco::conectar();
       $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       $sql = "SELECT * FROM atendente where id = ?";
       $q = $pdo->prepare($sql);
       $q->execute(array($id));
       $data = $q->fetch(PDO::FETCH_ASSOC);
       Banco::desconectar();
      
      
                            
        
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
            border-radius: 3px;
            box-shadow: 10px 10px 10px rgba(0, 0, 0, 0.2);
    }
    #valores{
        background-color: whitesmoke;
        border: 1px solid lightgrey;
             border-radius: 13px;
            box-shadow: 10px 10px 10px rgba(0, 0, 0, 0.01);
           width: 100%;
        padding: 10px;
       font-family: sans-serif;
           
    }
    
    #order-total { font-weight: bold; font-size: 21px; width: 110px; }
    #order-table td .total-box, .total-box, #frete { border-radius: 6px; font-weight: bold; border: 2px solid green; width: 70px; padding: 3px; margin: 5px 0 5px 0; text-align: center; font-size: 14px; }

    
    
  

.span_pseudo, .chiller_cb span:before, .chiller_cb span:after {
  content: "";
  display: inline-block;
  background: #fff;
  width: 0;
  height: 0.2rem;
  position: absolute;
  transform-origin: 0% 0%;
}

.chiller_cb {
  position: relative;
  height: 2rem;
  display: flex;
  align-items: center;
}
.chiller_cb input {
  display: none;
}
.chiller_cb input:checked ~ span {
  background: lawngreen;
  border-color: lawngreen;
}
.chiller_cb input:checked ~ span:before {
  width: 1rem;
  height: 0.15rem;
  transition: width 0.1s;
  transition-delay: 0.3s;
}
.chiller_cb input:checked ~ span:after {
  width: 0.4rem;
  height: 0.15rem;
  transition: width 0.1s;
  transition-delay: 0.2s;
}
.chiller_cb input:disabled ~ span {
  background: #ececec;
  border-color: #dcdcdc;
}
.chiller_cb input:disabled ~ label {
  color: #dcdcdc;
}
.chiller_cb input:disabled ~ label:hover {
  cursor: default;
}
.chiller_cb label {
  padding-left: 2rem;
  position: relative;
  z-index: 2;
  cursor: pointer;
  margin-bottom:0;
}
.chiller_cb span {
  display: inline-block;
  width: 1.2rem;
  height: 1.2rem;
  border: 2px solid #ccc;
  position: absolute;
  left: 0;
  transition: all 0.2s;
  z-index: 1;
  box-sizing: content-box;
}
.chiller_cb span:before {
  transform: rotate(-55deg);
  top: 1rem;
  left: 0.37rem;
}
.chiller_cb span:after {
  transform: rotate(35deg);
  bottom: 0.35rem;
  left: 0.2rem;
}

    </style>
    
        

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
                  <div class="mb-1 big">2/2</div>
                  <div class="progress mb-4">
                    <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  
                 
                </div>
            <div class="row"></div>
              
 <!-- Painel de adicionar pedidos  /////////////////////////-->         
          <div class= "pedidos" style=" ">
              
                  <form method="post" class="form-horizontal" style="margin: 10px;" action="CRUD/create_pedido_balcao.php">
                <legend>Escolher lanche:</legend>
                
                   <input name="idCliente" hidden value="<?=$id?>" type="text" placeholder="" class="form-control input-md telefone">
                
                 <div style="float: left; margin-right: 15px;">
                    <input name="qtd" placeholder="Qtd" type="text" class="num-pallets-input form-control input-md" style="width: 60px" id="turface-pro-league-num-pallets" required>
                </div>
                          
                 <div style="float: left; margin-right: 15px;"> <input placeholder="Código" name="codigo" style="width: 170px" type="text" placeholder="" class="form-control input-md"> </div>
                
                
               <div style="float: left; margin-right: 15px;" class="lead"> ou  </div>
                
                
                    <div style="float: left; margin-right: 15px;">
                        
                        <select class="form-control lanche" style="width: 300px" name="lanche" id="exampleFormControlSelect1" placeholder="Pequisar" type="text">
                                             <option value="">Selecionar Lanche...</option>
                                            <?php
    
                                            include_once 'CRUD/banco.php';
                                            $pdo = Banco::conectar();
                                            $sql = 'SELECT * FROM lanche ORDER BY nome ASC';

                                            foreach($pdo->query($sql)as $row){ ?>
                                                <option value="<?=$row['id']?>"> <?=$row['id']?> - <?=$row['nome']?>  -  R$ <?=number_format($row['valor'],2,",","") ?> </option>
                                                 <?php }
                                            Banco::desconectar();  ?>
                        </select>
                </div>
                
                
                            
                
                                        
                                        
                <div style="float: left; margin-right: 15px;">
                    <input name="observacao"  maxlength="38" placeholder="Observação" style="width: 170px" type="text" placeholder="" class="form-control input-md">
                </div>
                                        

                
                <div style="float: left; margin-right: 15px;">
                    <button  class="btn btn-success"  id="enviaDados">Adicionar</button>
                </div>
                </form>
              
              <div  style="width: 100%">⠀</div>
                      <!-- Content Row -->
                    <form class="form-horizontal" id="my_form" method="POST" style="with:100%; margin-top:50px" action="gerar_pedido_balcao.php"  style="">
                        <fieldset>
                        
                       
                             <div class="form-group col-md-5">
                           
                          </div>
                             <div class="table-responsive" style="height: 400px"> 
                                 
                                 
                                                       
              
<!-- Tabela de Pedidos /////////////////////////-->      
                                    
                                 <table  id="tabela" class="table  table-striped" width="100%">
                                   
                                     <thead class="thead-dark">
                                     <tr>
                                         
                                         <th style="text-align: center">Lanche</th>
                                            <th  style="text-align: center"> Valor</th>
                                          <th style="text-align: center"></th>
                                         <th style="text-align: center">Quantidade</th>
                                          <th style="text-align: center"></th>
                                         <th  style="text-align: center">Total</th>
                                         <th colspan="2" style="text-align: center">Observação</th>
                                         
                                
                                        
                                         </tr> 
                                     </thead>
                                     
                                     <?php
                                           include_once 'CRUD/banco.php';
                                            $pdo = Banco::conectar();
                                            $sql = 'SELECT * FROM pedido_balcao';
                                             $subtotal = 0;
                                            foreach($pdo->query($sql) as $row1){ 
                                            if($row1['idCliente']==$id && empty($row1['id_ped'])){ ?>
                                    
                                     <tr>
                                         
                                    
                                         <td class="product-title">
                                           <?=$row1['detalhes']?>
                                            <input name="lanche[]" hidden value="<?=$row1['idLanche']?>" type="text"  > 
                                        </td>
                                        
                                     
                                         <td class="price-per-pallet">R$ <span><?=$row1['valorPedido']?></span> </td>
                                   
                                        <td class="times">X</td>
                                        <td class="num-pallets">
                                        <input name="QTD[]" placeholder="Qtd" value="<?=$row1['qtd']?>" type="text" class="num-pallets-input form-control input-md" style="width: 60px" id="turface-pro-league-num-pallets" required readonly> 
                                         </td>
                                           <?php 
                                         $valor = (float)$row1['valorPedido'];
                                         $quant = $row1['qtd'];
                                         
                                         $totalItem = $valor * $quant;
                                         $subtotal = $subtotal + $totalItem;
                                         ?>
                                         <td class="equals">=</td>
                                         <td class="row-total"><input type="text"  value="<?=$totalItem?>" style="width: 80px" class="row-total-input form-control input-md"  disabled="disabled"> </td>
                                        
                                         <td>
                                           <input name="observacao[]"  maxlength="38" value="<?=$row1['observacaoLanche']?>"style="width: 170px" type="text" placeholder="" class="form-control input-md" readonly> 
                                         </td>
                                           <td>
                                               <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#editar<?=$row1['id_individual']?>" style="height:30px; font-size: 13px; margin: 1px;  float: left; "><i class="fas fa-edit"></i></button>
                                               
                                               <a href="CRUD/delete_pedido_balcao.php?id=<?=$row1['id_individual']?>&idCliente=<?=$id?>"  class="btn btn-danger"><i class="fas fa-times"></i></a></td>
                                </tr>
                                    

                                           
                                   <?php
                                            } }  Banco::desconectar();  
                                    ?>
                                   
                            </table>
                            </div>
                             <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.23/angular.min.js"></script>
                                           <div id="valores" style="text-align: right;" style="width: 80px">
                                           
                                       <?php
                                               $total = $subtotal;
                                               ?>
                                               <span style="font-weight: bold;">TOTAL: </span> 
                                               <input type="text" class="total-box"  value="R$ <?=number_format($total,2,",","") ?>" id="order-total" disabled="disabled">

                                             </div>

                            <br>
                            
 <!-- Dados do cliente e Atendimento  /////////////////////////-->     
                            
                     
                             <input name="idCliente" hidden value="<?=$data['id']?>" type="text" placeholder="" class="form-control input-md telefone">
                            <input name="nome_atendente" hidden value="<?=$data['nome']?>" type="text" placeholder="" class="form-control input-md telefone">
                            <br>
                            
                            <br>
                            <h5>Atendimento</h5>
                            <div class="form-row">
                               <div class="col">
                                <div class="col-md-7">
                                <div class="col-md-7">
                                    <label class="control-label " for="nome_cliente">  Cliente: </label> <input  name="nome_cliente"  type="text" class="form-control input-md" required > </div>
                                   </div>
                                </div>
                            </div>
                           <div class="form-row">
                               
                        <div class="col">
                                <div class="col-md-10">
                                    <label class="control-label " for="endereco">Consumo : </label>
                                    <select  class="form-control" name="consumo"  id="exampleFormControlSelect1" placeholder="Pequisar" required>
                                            <option value="">Selecionar...</option>
                                            <option value="Consumo no Local" >Consumir no Local</option>
                                            <option value="Levar" >Levar</option>
                                    </select>
                                </div>
                               </div>
                         <div class="col">
                                <div class="col-md-10">
                                    <label class="control-label " for="valor">Atendente: </label>
                                    <input name="atendente" type="text" placeholder=""
                                        class="form-control input-md" value="<?=$data['nome']?>" >
                                </div>
                            </div>  
                            
               
                                <div class="col">  
                                                      
                                <div class="col-md-10">
                                    <label class="control-label " for="valor">  Desconto : </label> <input placeholder="R$" name="desconto" style="width: 170px" type="text" placeholder="" class="form-control input-md" onKeyPress="return(moeda(this,'.',',',event))"> </div>
                               </div>
                              
                         <div class="rol">
                                <div class="col-md-10">
                                    <label class="control-label " for="valor">  Troco para : </label>
                                    <input id="troco"  name="troco" type="text" 
                                        class="form-control input-md" placeholder="R$"  onKeyPress="return(moeda(this,'.',',',event))">
                                </div>
                            </div>
                              <div class="rol">    
                             <div  class="col-md-10">
                                 <br>
                                <div class="chiller_cb">
                                <input id="myCheckbox" name="cartao" type="checkbox" >
                                <label for="myCheckbox" >Cartão de Crédito</label>
                                <span></span>
                              </div>
                                  </div>
                               </div>
                              
                            </div>
                            <br>
                            <div class="form-group">
                                <label class="col-md-10 control-label" for="btnsalvar"></label>
                                <div class="col-md-10">
                                    <button id="btnsalvar" type="submit" name="btnsalvar" class="btn btn-success" >Registrar Pedido e Baixar
                                    <i class="fas fa-print"></i></button>
                                    <a id="btncancelar" href="pedido_recente_balcao.php"
                                        name="btncancelar" class="btn btn-secondary">Finalizar
                                    </a>
                                    
                                </div>
                            </div>          
                            
                </fieldset>            
              </form>  
 
              
   <!-- Modais para editar a observação do lanche  /////////////////////////-->      
              
                </div>       
                 <?php
                    include_once 'CRUD/banco.php';
                    $pdo = Banco::conectar();
                    $sql = 'SELECT * FROM pedido_balcao';                                
                    foreach($pdo->query($sql) as $row1){ 
                        if($row1['idCliente']==$id){ ?>

                    
             <div class="modal fade" id="editar<?=$row1['id_individual']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Atualizar Lanche - <?=$row1['detalhes']?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="CRUD/update_pedido_balcao.php" method="post">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Quantidade:</label>
            <input style="width: 60px"  name="qtd" value="<?=$row1['qtd']?>" type="number" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Observação:</label>
            <input  name="obs" value="<?=$row1['observacaoLanche']?>"  class="form-control" id="recipient-name">
          </div>
         <input  name="id" value="<?=$row1['id_individual']?>" type="hidden">
        <input  name="id_cliente" value="<?=$id?>" type="hidden">
            
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar </button>
        <input type="submit" value="Atualizar" class="btn btn-success"/>
     
          </form>
      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>
    
    
    <?php }}?>
    
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



  
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>


    

    <script>
    // funcao remove uma linha da tabela
            function removeLinha(linha) {
              var i=linha.parentNode.parentNode.rowIndex;
              document.getElementById('tabela').deleteRow(i);
            }     </script>
  
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
    
    $('#my_form').keydown(function() {
var key = e.which;
if (key == 13) {
// As ASCII code for ENTER key is "13"
$('#my_form').submit(); // Submit form code
}
});
    </script>
    
    
<script>
    $('#my_form').submit(function(){
    $(this).find(':input[type=submit]').prop('disabled', true);
});    
</script>
    
    <script type="text/javascript">
        $(document).on('change', '.lanche', function () {
            var value = $(this).val();
            $('.close').trigger('click');
            <?php?>
            $('.valor').val(value);
        });
</script>
<script>
   function Soma(){
    var soma = 0;
    var ipts = document.querySelectorAll('input[onchange="Soma()"]');
    for(var x=0; x<ipts.length; x++){
       var valorItem = parseFloat(ipts[x].value);
       !isNaN(valorItem) ? soma += parseFloat(valorItem) : null;
    }
    document.querySelector('#total').value = soma.toFixed(2);
}
    
    </script>
      <script type='text/javascript' src='js/order.js'></script>
    
    <script>
   
        
    $(function () {
        $("#myCheckbox").click(function () {
            if ($(this).is(":checked")) {
                  $("#troco").attr("readonly", "readonly");
            } else {    
                $("#troco").removeAttr("readonly");
                $("#troco").focus();
            }
        });
    });

    </script>
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
                                            h = 0; h < u && ("0" == a.value.charAt(h) || a.value.charAt(h) == r); h++);
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
                              
</body>

</html>