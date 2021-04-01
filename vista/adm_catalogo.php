<?php
session_start();
if($_SESSION['us_tipo']==1||$_SESSION['us_tipo']==3||$_SESSION['us_tipo']==2){
    include_once 'layouts/header.php'
?>

<title>Adm | Catalogo</title>
<!-- Content Wrapper. Contains page content -->
<?php
  include_once 'layouts/nav.php';
  ?>
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

  #claro {
    font-family: 'Planetnv2';
  }

  #casa {
    font-family: 'Planetnv2';
    text-transform: lowercase;
    font-size: 1em;

  }
</style>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="animate__animated animate__shakeY" id="casa">Catalogo</h1>
        </div>
        <div class="col-sm-6">
          <ul class="breadcrumb float-sm-right">
            <li id="claro" class="breadcrumb-item"><a href="#">Home</a></li>
            <li id="claro" class="breadcrumb-item active">Catalogo</li>
          </ul>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section>
    <div class="container-fluid">
      <div class="card card-danger">
        <div class="card-header">
          <h3 id="verla" class="card-title">Lotes en riesgo</h3>

        </div>
        <div class="card-body p-0 table-responsive">
          <table id="lotes" class="animate__animated animate__fadeIn table table-hover text-nowrap">
            <thead class="table-danger">
              <tr>
                <th>Cod</th>  
                <th>Producto</th>
                <th>Stock</th>
                <th>Estado</th>
                <th>Laboratorio</th>
                <th>Presentación</th>
                <th>Proveedor</th>
                <th>Mes</th>
                <th>Dia</th>
              </tr>
            </thead>
            <tbody class="table-active">

            </tbody>

          </table>
        </div>
        <div class="card-footer">

        </div>
      </div>
    </div>
  </section>
  <section>
    <div class="container-fluid">
      <div class="card card-success">
        <div class="card-header">
          <h3 id="verla" class="card-title">Buscar Producto</h3>
          <div class="input-group">
            <input id="buscar-producto" type="text" class="form-control float-left"
              placeholder="Ingrese nombre de producto">
            <div class="input-group-append">
              <button class="btn btn-default">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div id="productos" class="row d-flex align-items-stretch">

          </div>
        </div>
        <div class="card-footer">

        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
 include_once 'layouts/footer.php';  
}
else{
    header('Location: ../index.php');
}
?>
<script src="../js/Catalogo.js"></script>
<script src="../js/Carrito.js"></script>