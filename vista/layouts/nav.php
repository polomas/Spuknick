
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="../img/jim2.png" type="image/png">
<link rel="stylesheet" href="../css/animate.min.css">
<link rel="stylesheet" href="../css/datatables.css">
<link rel="stylesheet" href="../css/compra.css">
<link rel="stylesheet" href="../css/main.css">
<link rel="stylesheet" href="../css/select2.min.css">
<!-- Select2 -->
<link rel="stylesheet" href="../css/css/all.min.css">
<!-- sweeralert2 -->
<link rel="stylesheet" href="../css/sweetalert2.css">
<!-- Theme style -->
<link rel="stylesheet" href="../css/adminlte.min.css">
<style>
  @font-face {
    font-family: capacitor;
    src: url(../flac/capacitor.ttf);
  }

  @font-face {
    font-family: avengero;
    src: url(../flac/avengero.ttf);
  }

  @font-face {
    font-family: Planetnv2;
    src: url(../flac/Planetnv2.ttf);
  }

  @font-face {
    font-family: KellySlab-Regular;
    src: url(../flac/KellySlab-Regular.ttf);
  }

  #colorido {
    font-family: 'Planetnv2';
  }

  #kalma {
    font-family: 'Planetnv2';
  }

  #mejor {
    font-family: 'Planetnv2';
    font-size: 12px;
  }

  #habil {
    font-family: 'Planetnv2';
    text-transform: lowercase;
    font-size: 10px;

  }
</style>

</head>

<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a id="mejor" href="../../index3.html" class="nav-link">Casa</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a id="mejor" href="#" class="nav-link">Contacto</a>
        </li>
        <li class="nav-item dropdown" id="cat-carrito" style="display: none;">
          <img src="../img/comprar.png" class="imagen-carrito nav-link dropdown-toggle" href="#" id="navbarDropdown"
            role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span id="contador" class="contador badge badge-danger"></span>
          </img>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <table class="carro table table-hover text-nowrap p-0">
              <thead class="table-success">
                <tr>
                  <th>Codigo</th>
                  <th>Nombre</th>
                  <th>Concentración</th>
                  <th>Adicional</th>
                  <th>Precio</th>
                  <th>Eliminar</th>
                </tr>
              </thead>
              <tbody id="lista">
              </tbody>
            </table>
            <a href="#" id="procesar-pedido" class="btn btn-danger btn-block btn-sm">Procesar Compra</a>
            <a href="#" id="vaciar-carrito" class="btn btn-primary btn-block btn-sm">Vaciar Carrito</a>
          </div>
        </li>
      </ul>
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <a id="mejor" href="../controlador/Logout.php">Cerrar Sesion</a>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="adm_catalogo.php" class="brand-link">
        <img src="../img/cudo4.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span id="colorido" class="brand-text font-weight-light">FARMACIA</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img id="cromoCuatro" src="../img/scudo5.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">
              <?php
          echo $_SESSION['nombre_us'];
          ?>
            </a>
          </div>
        </div>

        <!-- SidebarSearch Form -->
       

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li id="kalma" class="nav-header">Usuario</li>
            <li class="nav-item">
              <a href="editar_datos_personales.php" class="nav-link">
                <i class="nav-icon fas fa-user-cog"></i>
                <p id="habil">
                  Datos personales
                </p>
              </a>
            </li>
            <li id="gestion_usuario" class="nav-item">
              <a href="adm_usuario.php" class="nav-link">
                <i class="nav-icon fas fa-user-users"></i>
                <p id="habil">
                  Gestion Usuario
                </p>
              </a>
            </li>
            <li id="gestion_usuario" class="nav-item">
              <a href="adm_cliente.php" class="nav-link">
                <i class="nav-icon fas fa-user-users-friends"></i>
                <p id="habil">
                  Gestion Cliente
                </p>
              </a>
            </li>
            <li id="mejor" class="nav-header">Ventas</li>
            <li class="nav-item">
              <a href="adm_venta.php" class="nav-link">
                <i class="nav-icon fas fa-notes-medical"></i>
                <p id="mejor">
                  Listar Ventas
                </p>
              </a>
            </li>
            <li id="mejor" class="nav-header">Almacen</li>
            <li id="gestion_producto" class="nav-item">
              <a href="adm_producto.php" class="nav-link">
                <i class="nav-icon fas fa-pills"></i>
                <p id="mejor">
                  Gestion Producto
                </p>
              </a>
            </li>
            <li id="gestion_atributo" class="nav-item">
              <a href="adm_atributo.php" class="nav-link">
                <i class="nav-icon fas fa-vials"></i>
                <p id="mejor">
                  Gestion Atributo
                </p>
              </a>
            </li>
            <li id="gestion_lote" class="nav-item">
              <a href="adm_lote.php" class="nav-link">
                <i class="nav-icon fas fa-cubes"></i>
                <p id="mejor">
                  Gestion Lote
                </p>
              </a>
            </li>
            <li id="mejor" class="nav-header">Compras</li>
            <li id="gestion_proveedor" class="nav-item">
              <a href="adm_proveedor.php" class="nav-link">
                <i class="nav-icon fas fa-truck"></i>
                <p id="mejor">
                  Gestion Proveedor
                </p>
              </a>
            </li>
            <li id="gestion_compra" class="nav-item">
              <a href="adm_buy.php" class="nav-link">
                <i class="nav-icon fas fa-people-carry"></i>
                <p id="mejor">
                  Gestion Compras
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>