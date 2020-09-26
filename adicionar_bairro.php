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

       
            <form class="form-horizontal" method="POST" action="CRUD/createBairro.php">
                        <fieldset>

                            <!-- Form Name -->
                            <legend>Cadastrar Novo Bairro</legend>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="txtcodigo_produto_id">Nome : </label>
                                <div class="col-md-8">
                                    <input name="nome" type="text" placeholder="" class="form-control input-md">

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
                                <label class="col-md-4 control-label" for="txtcodigo_produto_id" >Valor de Entrega R$ : </label>
                                <div class="col-md-8">
              
                                    <input name="valor" type="text" placeholder="" class="form-control input-md" onKeyPress="return(moeda(this,'.',',',event))">

                                </div>
                            </div>
                           

                          
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="btnsalvar"></label>
                                <div class="col-md-8">
                                    <button id="btnsalvar" type="submit" name="btnsalvar" class="btn btn-primary">Salvar
                                    </button>
                                     <a id="btncancelar" onclick="location.href='bairro.php'"
                                        name="btncancelar" class="btn btn-danger" style="color: white">Cancelar
                                    </a>
                                </div>
                            </div>
                         
                            
                        </fieldset>
                    </form>
        
        

        

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

</body>

</html>