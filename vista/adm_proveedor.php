<?php
session_start();
if($_SESSION['us_tipo']==1||$_SESSION['us_tipo']==3){
    include_once 'layouts/header.php'
?>

<title>Adm | Editar Datos</title>
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
    font-size: 14px;
  }

  #gala {
    font-family: 'Planetnv2';
    text-transform: lowercase;
    font-size: 16px;
  }

  .gala {
    font-family: 'Planetnv2';
    text-transform: lowercase;
    font-size: 14px;
  }
</style>

<!-- Modal -->
<div class="modal fade" id="cambiologo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cambiar Logo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="text-center">
          <img id="logoactual" src="../img/scudo5.jpg" alt="" class="profile-user-img img-fluid img-circle">
        </div>
        <div class="text-center">
          <b id="nombre_logo">
          </b>
        </div>
        <div class="alert alert-success text-center" id="edit-prov" style="display:none">
          <span><i class="fas fa-check m-1"></i>Se cambio el logo</span>
        </div>
        <div class="alert alert-danger text-center" id="noedit-prov" style="display:none">
          <span><i class="fas fa-times m-1"></i>Formato no soportado</span>
        </div>

        <form id="form-logo" enctype="multipart/form-data">
          <div class="input-group mb-3 ml-5 mt-2">
            <input type="file" name="photo" class="input-group">
            <input type="hidden" name="funcion" id="funcion">
            <input type="hidden" name="id_logo_prov" id="id_logo_prov">
            <input type="hidden" name="avatar" id="avatar">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn bg-gradient-primary">Guardar</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade animate__animated animate__fadeInDown" id="crearproveedor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="card card-success">
        <div class="card-header">
          <h3 id="verla" class="card-title">Crear proveedor</h3>
          <button class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="card-body">
          <div class="alert alert-success text-center" id="add-prov" style="display:none">
            <span><i class="fas fa-check m-1"></i>proveedor creado</span>
          </div>
          <div class="alert alert-danger text-center" id="noadd-prov" style="display:none">
            <span><i class="fas fa-times m-1"></i>el proveedor ya existe</span>
          </div>
          <div class="alert alert-succes text-center" id="edit-prove" style="display:none">
            <span><i class="fas fa-times m-1"></i>se modifico correctamente</span>
          </div>
          <form class="zapato" id="form-crear">
            <div class="form-group">
              <label for="nombre">Nombres</label>
              <input id="nombre" type="text" class="form-control" placeholder="Ingrese nombre" required>
            </div>
            <div class="form-group">
              <label for="telefono">Teléfono</label>
              <input id="telefono" type="number" class="form-control" placeholder="Ingrese teléfono" required>
            </div>
            <div class="form-group">
              <label for="correo">Coreo</label>
              <input id="correo" type="email" class="form-control" placeholder="Ingrese correo">
            </div>
            <div class="form-group">
              <label for="direccion">Dirección</label>
              <input id="direccion" type="text" class="form-control" placeholder="Ingrese direccion" required>
              <input type="hidden" id="id_edit_prov">
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
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 id="gala">Gestion Prveedor <button type="button" class="btn bg-gradient-primary gala" data-toggle="modal"
              data-target="#crearproveedor">Crear Proveedor</button></h1>

        </div>
        <div class="col-sm-6">
          <ul class="breadcrumb float-sm-right">
            <li id="verla" class="breadcrumb-item"><a href="adm_catalogo.php">Home</a></li>
            <li id="verla" class="breadcrumb-item active">Gestion proveedor</li>
          </ul>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <section>
    <div class="container-fluid">
      <div class="card card-success">
        <div class="card-header">
          <h3 id="verla" class="card-title">Buscar Proveedor</h3>
          <div class="input-group">
            <input type="text" id="buscar_proveedor" class="form-control float-left"
              placeholder="Ingrese nombre de proveedor">
            <div class="input-group-append">
              <button class="btn btn-default">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div id="proveedores" class="row d-flex align-items-stretch">

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
<script src="../js/Proveedor.js"></script>