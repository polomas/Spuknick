<?php
session_start();
if($_SESSION['us_tipo']==3){
    include_once 'layouts/header.php'
?>

<title>Adm | Gestion Lote</title>
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
<div class="modal fade animate__animated animate__fadeInDown" id="editarlote" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="card card-success">
        <div class="card-header">
          <h3 id="verla" class="card-title">Editar Lote</h3>
          <button class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="card-body">
          <div class="alert alert-success text-center" id="edit-lote" style="display:none">
            <span><i class="fas fa-check m-1"></i>se modifico corectamente</span>
          </div>
          <form class="zapato" id="form-editar-lote">
            <div class="form-group">
              <label for="codigo_lote">Codigo lote: </label>
              <label id="codigo_lote">codigo lote</label>

            </div>

            <div class="form-group">
              <label for="stock">Stock</label>
              <input id="stock" type="number" class="form-control" placeholder="Ingrese lote" required>
            </div>
            <input type="hidden" id="id_lote_prod">
        </div>
        <div class="card-footer">
          <button type="submit" class="btn bg-gradient-primary float-right m-1">Guardar</button>
          <button type="button" data-dismiss="modal" class="btn btn-outline-secondary float-right m-1">Close</button>
          </form>
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
          <h1 id="gala">Gestion Lote</h1>
        </div>
        <div class="col-sm-6">
          <ul class="breadcrumb float-sm-right">
            <li id="verla" class="breadcrumb-item"><a href="adm_catalogo.php">Home</a></li>
            <li id="verla" class="breadcrumb-item active">Gestion Lote</li>
          </ul>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <section>
    <div class="container-fluid">
      <div class="card card-success">
        <div class="card-header">
          <h3 id="verla" class="card-title">Buscar Lote</h3>
          <div class="input-group">
            <input id="buscar-lote" type="text" class="form-control float-left"
              placeholder="Ingrese nombre de producto">
            <div class="input-group-append">
              <button class="btn btn-default">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div id="lotes" class="row d-flex align-items-stretch">

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
<script src="../js/Lote.js"></script>