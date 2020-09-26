    <ul class="navbar-nav sidebar sidebar-dark accordion" style="background-color: yellow" id="accordionSidebar">

      <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="painel_inicial.php">
    <img class="img-responsive" width="100%" style="margin-top: 70px" src="img/Logo.png">
</a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active" style="margin-top: 70px">
        <a class="nav-link" href="painel_inicial.php">
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
            <a class="collapse-item" href="painel_delivery.php">Pedido Delivery</a>
            <a class="collapse-item" href="painel_balcao.php">Pedido Balcão</a>
              <a class="collapse-item" href="painel_motoboy.php">Controle de Entregas</a>
          </div>
        </div>
      </li>
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-plus"  style="color: black"></i> 
          <span  style="color: black">Gerenciar</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Cadastrar:</h6>
              <a class="collapse-item" href="atendente.php">Atendentes Delivery</a>
              <a class="collapse-item" href="atendente_balcao.php">Atendentes Balcão</a>
            <a class="collapse-item" href="cliente.php">Clientes</a>
            <a class="collapse-item" href="produto.php">Produtos</a>
            <a class="collapse-item" href="categoria.php">Categorias</a>
            <a class="collapse-item" href="bairro.php">Bairros</a>
            <a class="collapse-item" href="motoboy.php">Motoboy</a>
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