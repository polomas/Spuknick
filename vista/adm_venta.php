<?php
session_start();
if($_SESSION['us_tipo']==3||$_SESSION['us_tipo']==1||$_SESSION['us_tipo']==2){
    include_once 'layouts/header.php'
?>

<title>Adm | Gestion Venta</title>
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

  #verla {
    font-family: 'Planetnv2';
    text-transform: lowercase;
    font-size: 10px;
  }

  #gala {
    font-family: 'Planetnv2';
    text-transform: lowercase;
    font-size: 14px;
  }

  .gala {
    font-family: 'Planetnv2';
    text-transform: lowercase;
    font-size: 10px;
  }
</style>
<!-- Modal --> 
<div class="modal fade animate__animated animate__fadeInDown" id="vista_venta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="card card-success">
        <div class="card-header">
          <h3 id="verla" class="card-title">Registros de venta</h3>
          <button class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="card-body">
          <div class="form-group">
          <label for="codigo_venta">Codigo Venta: </label>
          <span id="codigo_venta"></span>
          </div>
          <div class="form-group">
          <label for="fecha">Fecha: </label>
          <span id="fecha"></span>
          </div>
          <div class="form-group">
          <label for="cliente">Cliente: </label>
          <span id="cliente"></span>
          </div>
          <div class="form-group">
          <label for="dni">CI: </label>
          <span id="dni"></span>
          </div>
          <div class="form-group">
          <label for="vendedor">Vendedor:</label>
          <span id="vendedor"></span>
          </div>
          <table class="animate__animated animate__fadeInDown table table-hover text-nowrap">
          <thead class="table-success">
          <tr>
          <th>Cantidad</th>
          <th>Precio</th>
          <th>Productos</th>
          <th>Concentración</th>
          <th>Adicional</th>
          <th>Laboratorios</th>
          <th>Presentación</th>
          <th>Tipo</th>
          <th>Subtotal</th>
          </tr>
          </thead>
          <tbody class="table-warning" id="registros">

          </tbody>
          </table>
          <div class="float-right input-group-append">
          <h3 class="m-3">Total:</h3> 
          <h3 class="m-3" id="total"></h3>
          </div>
        </div>
        <div class="card-footer">
           <button type="button" data-dismiss="modal" class="btn btn-outline-secondary float-right m-1">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 id="gala">Gestion Ventas</h1>
        </div>
        <div class="col-sm-6">
          <ul class="breadcrumb float-sm-right">
            <li id="verla" class="breadcrumb-item"><a href="adm_catalogo.php">Home</a></li>
            <li id="verla" class="breadcrumb-item active">Gestion ventas</li>
          </ul>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  </section>
  <section>
    <div class="container-fluid">
      <div class="card card-success">
        <div class="card-header">
          <h3 id="verla" class="card-title">Consultas</h3>
        </div>
        <div class="card-body">
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3 id="venta_dia_vendedor">0</h3>

                <p>Venta del dia Vendedor</p>
              </div>
              <div class="icon">
                <i class="fas fa-user"></i>
              </div>
              <a href="adm_mas_consultas.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3 id="venta_diaria">0</h3>

                <p>Venta Diaria</p>
              </div>
              <div class="icon">
                <i class="fas fa-shopping-bag"></i>
              </div>
              <a href="adm_mas_consultas.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3 id="venta_mensual">0</h3>

                <p>Venta Mensual</p>
              </div>
              <div class="icon">
                <i class="fas fa-calendar-alt"></i>
              </div>
              <a href="adm_mas_consultas.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3 id="venta_anual">0</h3>

                <p>Venta Anual</p>
              </div>
              <div class="icon">
                <i class="fas fa-signal"></i>
              </div>
              <a href="adm_mas_consultas.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
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
          <h3 id="verla" class="card-title">Buscar Ventas</h3>
        </div>
        <div class="card-body">
        <table id="tabla_venta" class="display table table-hover text-nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Fecha</th>
                <th>Cliete</th>
                <th>DNI.</th>
                <th>Total</th>
                <th>Vendedor</th>
                <th>Accion</th> 
            </tr>
        </thead>
        <tbody>
        
        
        </tbody>
    </table>
        </div>
        <div class="card-footer">

        </div>
      </div>
    </div>
  </section>
</div>
<!-- /.content-wrapper -->
<?php
 include_once 'layouts/footer.php';  
}
else{ 
    header('Location: ../index.php');
}
?>

<script src="../js/Venta.js"></script>