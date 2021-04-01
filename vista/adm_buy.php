<?php
session_start();
if($_SESSION['us_tipo']==3){
    include_once 'layouts/header.php'
?>

<title>Adm | Gestion Compras</title>
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

<div class="modal fade animate__animated animate__fadeInDown" id="cambiarEstado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="card card-success">
        <div class="card-header">
          <h3 id="verla" class="card-title">Cambiar Estado</h3>
          <button class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="card-body">
          <div class="alert alert-danger text-center" id="noedit" style="display:none">
            <span><i class="fas fa-times m-1"></i>no se pudo editar</span>
          </div>
          <div class="alert alert-success text-center" id="edit" style="display:none">
            <span><i class="fas fa-check m-1"></i>se cambio el estado</span>
          </div>

          <form class="zapato" id="form-editar">
            <div class="form-group">
              <label for="estado_compra">Estado</label>
              <select id="estado_compra" class="form-control select2" style="width: 100%;"></select>
              <input type="hidden" id="id_compra">
            </div>  
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
<div class="modal fade animate__animated animate__fadeInDown" id="vista_compra" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="card card-success">
        <div class="card-header">
          <h3 id="verla" class="card-title">Detalle Compra</h3>
          <button class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="card-body">
          <div class="form-group">
          <label for="codigo_compra">Codigo Compra: </label>
          <span id="codigo_compra"></span>
          </div>
          <div class="form-group">
          <label for="fecha_compra">Fecha de compra: </label>
          <span id="fecha_compra"></span>
          </div>
          <div class="form-group">
          <label for="fecha_entrega">Fecha de Entrega: </label>
          <span id="fecha_entrega"></span>
          </div>
          <div class="form-group">
          <label for="estado">Estado: </label>
          <span id="estado"></span>
          </div>
          <div class="form-group">
          <label for="proveedor">Preveedor: </label>
          <span id="proveedor"></span>
          </div>
          <table class="animate__animated animate__fadeInDown table table-hover text-nowrap table-responsive">
          <thead class="table-success">
          <tr>
          <th>#</th>
          <th>Codigo</th>
          <th>Cantidad</th>
          <th>Vencimiento</th>
          <th>Precio Compra</th>
          <th>Productos</th>
          <th>Laboratorio</th>
          <th>Presentación</th>
          <th>Tipo</th>
          </tr>
          </thead>
          <tbody class="table-warning" id="detalles">

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
          <h1 id="gala">Gestion Compras <a href="adm_ingresar_compra.php" class="btn bg-gradient-primary ml-2">Crear Compra</a></h1>
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
          <table id="compras" class="table table-dark table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>ID | Codigo</th>
                <th>Fecha de compra</th>
                <th>Fecha de entrega</th>
                <th>Total</th>
                <th>Estado</th>
                <th>Proveedro</th>
                <th>Operaciones</th>
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
<script src="../js/Compras.js"></script>