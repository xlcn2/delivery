<?php
session_start();
 
require '../login/init.php';
if (!isLoggedIn())
{
    header('Location: ../index.php');
}

require 'banco.php';

		$id = $_REQUEST['id'];
       

       $pdo = Banco::conectar();
       $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       $sql = "SELECT * FROM cliente where id = ?";
       $q = $pdo->prepare($sql);
       $q->execute(array($id));
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
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">

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

    
                    <form class="form-horizontal" method="POST" >
                        <fieldset>

                            <!-- Form Name -->
                            <legend>Atualizar Cliente</legend>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="txtcodigo_produto_id">Nome : </label>
                                <div class="col-md-8">
                                    <input name="nome" value="<?=$data['nome']?>" type="text" placeholder="" class="form-control input-md">

                                </div>
                            </div>
                             

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="txtcodigo_produto_id">Telefone : </label>
                                <div class="col-md-8">
                                    <input name="telefone" value="<?=$data['telefone']?>" type="text" placeholder="" class="form-control input-md telefone">

                                </div>
                            </div>
                           

                            
                            
                           
                            <div class="form-group row">
                                <div class="col-sm-8">
                                    <label class="control-label " for="rua">  Endereco : </label>
                                    <input id="logradouro" name="endereco" value="<?=$data['endereco']?>" type="text" placeholder=""
                                        class="form-control input-md">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label class="col-md-7 control-label" for="complemento"> 
                                        Complemento : </label>
                                    <input id="complemento" name="complemento"  value="<?=$data['complemento']?>" type="text"  placeholder=""
                                        class="form-control input-md">
                                </div>
                            </div>
                         <div class="form-group row">
                        <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label class="col-md-7 control-label" for="complemento"> 
                                       Ponto de Referência : </label>
                                    <input id="complemento" name="referencia" value="<?=$data['referencia']?>" type="text"  placeholder=""
                                        class="form-control input-md">
                             </div>
                            </div>
                             <hr>
                            <legend>Selecione o Bairro</legend>
                            <hr>
                         <div class="form-group  col-md-8">
                            <label for="exampleFormControlSelect1">Bairros Cadastrados</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="bairro">
                                  <?php
                       
                        include_once 'CRUD/banco.php';
                        
                        $pdo = Banco::conectar();
                        $sql = 'SELECT * FROM bairro';
                        
                        foreach($pdo->query($sql)as $row)
                            if($row['nome']==$data['bairro']){ ?>
                              <option value="<?=$row['id']?>" selected><?=$row['nome']?></option>  
                          <?php  }
                        else{ ?>
                                <option value="<?=$row['id']?>"><?=$row['nome']?></option>
                              
                  <?php }
                        Banco::desconectar();  ?>
                            </select>
                          </div>
                            
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="btnsalvar"></label>
                                <div class="col-md-8">
                                    <button id="btnsalvar" type="submit" name="btnsalvar" class="btn btn-primary">Salvar
                                    </button>
                                    <a id="btncancelar" href="../cliente.php"
                                        name="btncancelar" class="btn btn-danger">Cancelar
                                    </a>
                                </div>
                            </div>
                        </fieldset>
                        
            </form>  
                   
        
        

                     <?php
            	if ($_POST)
            {

                    

                   $idBairro = $_POST['bairro'];
                   $pdo = Banco::conectar();
                   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                   $sql = "SELECT * FROM bairro where id = ?";
                   $q = $pdo->prepare($sql);
                   $q->execute(array($idBairro));
                   $data = $q->fetch(PDO::FETCH_ASSOC); 
                    Banco::desconectar();
                    $nomeBairro = $data['nome'];
                    $valorEntrega = $data['valorEntrega'];
		            $nome= $_POST['nome'];
                    $telefone= $_POST['telefone'];
                    $endereco = $_POST['endereco'];
                    $complemento = $_POST['complemento'];
		            $referencia = $_POST['referencia'];
		
		

		            // update data
		   
                    $pdo = Banco::conectar();
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "UPDATE cliente  set  nome= ?, telefone=?, endereco=?, valorEntrega=?, bairro=?, Complemento=?, referencia=?  WHERE id = ?";
                    $q = $pdo->prepare($sql);
                    $q->execute(array($nome, $telefone, $endereco, $valorEntrega, $nomeBairro, $complemento, $referencia, $id));
                    Banco::desconectar();
                    echo"<script>  alert('Cliente Atualizado.');
                    window.location.replace('../cliente.php');</script>";
		
	}
            ?>

        

        </div>
        <!-- /.container-fluid -->

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
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a class="btn btn-primary" href="../login/logout.php">Ok</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../js/demo/chart-area-demo.js"></script>
  <script src="../js/demo/chart-pie-demo.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
                                <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>

                                 <script>
                                     jQuery("input.telefone")
                                        .mask("(99) 9999-9999?9")
                                        .focusout(function (event) {  
                                            var target, phone, element;  
                                            target = (event.currentTarget) ? event.currentTarget : event.srcElement;  
                                            phone = target.value.replace(/\D/g, '');
                                            element = $(target);  
                                            element.unmask();  
                                            if(phone.length > 10) {  
                                                element.mask("(99) 99999-999?9");  
                                            } else {  
                                                element.mask("(99) 9999-9999?9");  
                                            }  
                                     });</script> 
</body>

</html>