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
<div class="modal fade animate__animated animate__fadeInDown" id="editarcliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="card card-success">
        <div class="card-header">
          <h3 id="verla" class="card-title">Editar cliente</h3>
          <button class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="card-body">
          <div class="alert alert-success text-center" id="edit-cli" style="display:none">
            <span><i class="fas fa-check m-1"></i>cliente editado</span>
          </div>
          <div class="alert alert-danger text-center" id="noedit-cli" style="display:none">
            <span><i class="fas fa-times m-1"></i>no se pudo editar</span>
          </div>
          
          <form class="zapato" id="form-editar">
            <div class="form-group">
              <label for="telefono_edit">Teléfono</label>
              <input id="telefono_edit" type="number" class="form-control" placeholder="Ingrese teléfono">
            </div>
            <div class="form-group">
              <label for="correo_edit">Correo</label>
              <input id="correo_edit" type="email" class="form-control" placeholder="Ingrese correo">
            </div>
            <div class="form-group">
              <label for="adicional_edit">Adicional</label>
              <input id="adicional_edit" type="text" class="form-control" placeholder="Ingrese sexo">
            </div>
              <input type="hidden" id="id_cliente">
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

<div class="modal fade animate__animated animate__fadeInDown" id="crearcliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="card card-success">
        <div class="card-header">
          <h3 id="verla" class="card-title">Crear cliente</h3>
          <button class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="card-body">
          <div class="alert alert-success text-center" id="add-cli" style="display:none">
            <span><i class="fas fa-check m-1"></i>cliente creado</span>
          </div>
          <div class="alert alert-danger text-center" id="noadd-cli" style="display:none">
            <span><i class="fas fa-times m-1"></i>el cliente ya existe</span>
          </div>
          
          <form class="zapato" id="form-crear">
            <div class="form-group">
              <label for="nombre">Nombres</label>
              <input id="nombre" type="text" class="form-control" placeholder="Ingrese nombre">
            </div>
            <div class="form-group">
              <label for="apellido">Apellidos</label>
              <input id="apellido" type="text" class="form-control" placeholder="Ingrese apellidos">
            </div>
            <div class="form-group">
              <label for="dni">DNI</label>
              <input id="dni" type="number" class="form-control" placeholder="Ingrese DNI">
            </div>
            <div class="form-group">
              <label for="edad">Edad</label>
              <input id="edad" type="date" class="form-control" placeholder="Ingrese edad">
            </div>
            <div class="form-group">
              <label for="telefono">Teléfono</label>
              <input id="telefono" type="number" class="form-control" placeholder="Ingrese teléfono">
            </div>
            <div class="form-group">
              <label for="correo">Correo</label>
              <input id="correo" type="email" class="form-control" placeholder="Ingrese correo">
            </div>
            <div class="form-group">
              <label for="sexo">Sexo</label>
              <input id="sexo" type="text" class="form-control" placeholder="Ingrese sexo">
            </div>
            <div class="form-group">
              <label for="adicional">Adicional</label>
              <input id="adicional" type="text" class="form-control" placeholder="Ingrese sexo">
            </div>
              <input type="hidden" id="id_edit_prov">
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
          <h1 id="gala">Gestion Cliente <button type="button" class="btn bg-gradient-primary gala" data-toggle="modal"
              data-target="#crearcliente">Crear Cliente</button></h1>

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
          <h3 id="verla" class="card-title">Buscar Cliente</h3>
          <div class="input-group">
            <input type="text" id="buscar_cliente" class="form-control float-left"
              placeholder="Ingrese nombre de cliente">
            <div class="input-group-append">
              <button class="btn btn-default">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div id="clientes" class="row d-flex align-items-stretch">

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
<script src="../js/Cliente.js"></script>