<?php
session_start();
if($_SESSION['us_tipo']==1||$_SESSION['us_tipo']==3){
    include_once 'layouts/header.php'
?>

<title>Adm | Atrbuto </title>
<link rel="stylesheet" href="../css/bootstrap.min.css">
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
<div class="modal fade animate__animated animate__fadeInDown" id="cambiologo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
        <div class="alert alert-success text-center" id="La" style="display:none">
          <span><i class="fas fa-check m-1"></i>Se cambio el logo</span>
        </div>
        <div class="alert alert-danger text-center" id="Pa" style="display:none">
          <span><i class="fas fa-times m-1"></i>Formato no soportado</span>
        </div>

        <form id="form-logo" enctype="multipart/form-data">
          <div class="input-group mb-3 ml-5 mt-2">
            <input type="file" name="photo" class="input-group">
            <input type="hidden" name="funcion" id="funcion">
            <input type="hidden" name="id_logo_lab" id="id_logo_lab">
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

<div class="modal fade animate__animated animate__fadeInDown" id="crearlaboratorio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="card card-success">
        <div class="card-header">
          <h3 id="verla" class="card-title">Crear Laboratorio</h3>
          <button class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="card-body">
          <div class="alert alert-success text-center" id="add-laboratorio" style="display:none">
            <span><i class="fas fa-check m-1"></i>Laboratorio Creado</span>
          </div>
          <div class="alert alert-danger text-center" id="noadd-laboratorio" style="display:none">
            <span><i class="fas fa-times m-1"></i>El Laboratorio ya existe</span>
          </div>
          <div class="alert alert-success text-center" id="edit-lab" style="display:none">
            <span><i class="fas fa-check m-1"></i>Se edito correctamente</span>
          </div>

          <form class="zapato" id="form-crear-laboratorio">
            <div class="form-group">
              <label for="nombre-laboratorio">Nombres</label>
              <input id="nombre-laboratorio" type="text" class="form-control" placeholder="Ingrese nombre laboratorio"
                required>
              <input type="hidden" id="id_editar_lab">
            </div>
        </div>
        <div class="card-footer">
          <button type="submit" class="btn bg-gradient-primary float-right m-1">Crear</button>
          <button type="button" data-dismiss="modal" class="btn btn-outline-secondary float-right m-1">Close</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade animate__animated animate__fadeInDown" id="creartipo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="card card-success">
        <div class="card-header">
          <h3 id="verla" class="card-title">Crear Tipo</h3>
          <button class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="card-body">
          <div class="alert alert-success text-center" id="add-tipo" style="display:none">
            <span><i class="fas fa-check m-1"></i>Tipo Creado</span>
          </div>
          <div class="alert alert-danger text-center" id="noadd-tipo" style="display:none">
            <span><i class="fas fa-times m-1"></i>El Tipo ya existe</span>
          </div>
          <div class="alert alert-success text-center" id="edit-tip" style="display:none">
            <span><i class="fas fa-check m-1"></i>Se edito correctamente</span>
          </div>
          <form class="zapato" id="form-crear-tipo">
            <div class="form-group">
              <label for="nombre-tipo">Nombres</label>
              <input id="nombre-tipo" type="text" class="form-control" placeholder="Ingrese nombre tipo" required>
              <input type="hidden" id="id_editar_tip">

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
<div class="modal fade animate__animated animate__fadeInDown" id="crearpresentacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="card card-success">
        <div class="card-header">
          <h3 id="verla" class="card-title">Crear Presentación</h3>
          <button class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="card-body">
          <div class="alert alert-success text-center" id="add-pre" style="display:none">
            <span><i class="fas fa-check m-1"></i>Se agrego correctamente</span>
          </div>
          <div class="alert alert-danger text-center" id="noadd-pre" style="display:none">
            <span><i class="fas fa-times m-1"></i>La Presentaciòn ya existe</span>
          </div>
          <div class="alert alert-success text-center" id="edit-pre" style="display:none">
            <span><i class="fas fa-check m-1"></i>Se edito correctamente</span>
          </div>
          <form class="zapato" id="form-crear-presentacion">
            <div class="form-group">
              <label for="nombre-presentacion">Nombres</label>
              <input id="nombre-presentacion" type="text" class="form-control" placeholder="Ingrese nombre presentación"
                required>
              <input type="hidden" id="id_editar_pre">

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
          <h1 id="casa">Gestion atributo</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li id="claro" class="breadcrumb-item"><a href="#">Home</a></li>
            <li id="claro" class="breadcrumb-item active">Gestion atributo</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card header">
              <ul class="nav nav-pills">
                <li class="nav-item"><a href="#laboratorio" class="nav-link active" data-toggle="tab">Laboratorio</a>
                </li>
                <li class="nav-item"><a href="#tipo" class="nav-link" data-toggle="tab">Tipo</a></li>
                <li class="nav-item"><a href="#presentacion" class="nav-link" data-toggle="tab">Presentación</a></li>
              </ul>
            </div>
            <div class="card-body p-0">
              <div class="tab-content">
                <div class="tab-pane active" id="laboratorio">
                  <div class="card card-success">
                    <div class="card-header">
                      <div class="card-title">Buscar laboratorio <button type="button" data-toggle="modal"
                          data-target="#crearlaboratorio" class="btn bg-gradient-primary btn-sm m-2">Crear
                          Laboratorio</button></div>
                      <div class="input-group">
                        <input id="buscar-laboratorio" type="text" class="form-control float-left"
                          placeholder="Ingrese nombre">
                        <div class="input-group-append">
                          <button class="btn btn-default"><i class="fas fa-search"></i></button>
                        </div>
                      </div>
                    </div>
                    <div class="card-body p-0 table-responsive">
                      <table class="table table-hover text-nowrap">
                        <thead class="table-success">
                          <tr>
                            <th>Aciones</th>
                            <th>Logo</th>
                            <th>Laboratorio</th>
                          </tr>
                        </thead>
                        <tbody class="table-active" id="laboratorios">

                        </tbody>
                      </table>
                    </div>
                    <div class="card-fooetr">

                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="tipo">
                  <div class="card card-success">
                    <div class="card-header">
                      <div class="card-title">Busca Tipo <button type="button" data-toggle="modal"
                          data-target="#creartipo" class="btn bg-gradient-primary btn-sm m-2">Crear Tipo</button></div>
                      <div class="input-group">
                        <input id="buscar-tipo" type="text" class="form-control float-left" placeholder="Ingrese Tipo">
                        <div class="input-group-append">
                          <button class="btn btn-default"><i class="fas fa-search"></i></button>
                        </div>
                      </div>
                    </div>
                    <div class="card-body p-0 table-responsive">
                      <table class="table table-hover text-nowrap">
                        <thead class="table-success">
                          <tr>
                            <th>Aciones</th>
                            <th>Tipos</th>
                          </tr>
                        </thead>
                        <tbody class="table-active" id="tipos">
                        </tbody>
                      </table>
                    </div>
                    <div class="card-fooetr"></div>
                  </div>
                </div>
                <div class="tab-pane" id="presentacion">
                  <div class="card card-success">
                    <div class="card-header">
                      <div class="card-title">Busca Presentación <button type="button" data-toggle="modal"
                          data-target="#crearpresentacion" class="btn bg-gradient-primary btn-sm m-2">Crear
                          Presentación</button></div>
                      <div class="input-group">
                        <input id="buscar-presentacion" type="text" class="form-control float-left"
                          placeholder="Ingrese Presentación">
                        <div class="input-group-append">
                          <button class="btn btn-default"><i class="fas fa-search"></i></button>
                        </div>
                      </div>
                    </div>
                    <div class="card-body p-0 table-responsive">
                      <table class="table table-hover text-nowrap">
                        <thead class="table-success">
                          <tr>
                            <th>Aciones</th>
                            <th>Presentaciòn</th>
                          </tr>
                        </thead>
                        <tbody class="table-active" id="presentaciones">
                        </tbody>
                      </table>
                    </div>
                    <div class="card-fooetr"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">

            </div>
          </div>
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
<script src="../js/Laboratorio.js"></script>
<script src="../js/Tipo.js"></script>
<script src="../js/Presentacion.js"></script>