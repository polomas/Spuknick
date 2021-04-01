<?php
session_start();
if($_SESSION['us_tipo']==3){
    include_once 'layouts/header.php'
?>

<title>Adm | Mas consultas</title>
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
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 id="gala">Mas consultas</h1>
        </div>
        <div class="col-sm-6">
          <ul class="breadcrumb float-sm-right">
            <li id="verla" class="breadcrumb-item"><a href="adm_catalogo.php">Home</a></li>
            <li id="verla" class="breadcrumb-item active">Mas consultas</li>
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
          <h3 id="verla" class="card-title">Consultas generales</h3>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <h2>Ventas por mes del año actual</h2>
              <div class="chart-responsive">
                <canvas id='Grafico1'
                  style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
            </div>
            <div class="col-md-12">
              <h2>Top 3 vendedor del mes</h2>
              <div class="chart-responsive">
                <canvas id='Grafico2'
                  style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
            </div>
            <div class="col-md-12">
              <h2>Comparativa de meses con el año anterior</h2>
              <div class="chart-responsive">
                <canvas id='Grafico3'
                  style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
            </div>
            <div class="col-md-12">
              <h2>Los cinco productos más vendidos del mes</h2>
              <div class="chart-responsive">
                <canvas id='Grafico4'
                  style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
            </div>
            <div class="col-md-12">
              <h2>Top 3 cliente del mes</h2>
              <div class="chart-responsive">
                <canvas id='Grafico5'
                  style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
            </div>
          </div>
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
<script src="../js/Chart.min.js"></script>
<script src="../js/Mas_consultas.js"></script>