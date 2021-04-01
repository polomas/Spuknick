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
    font-size: 12px;
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
<div class="modal fade animate__animated animate__fadeInDown" id="Confirmar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmar Acción</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>

        </button>
      </div>
      <div class="modal-body">
        <div class="text-center">
          <img id="cromoTres" src="../img/scudo5.jpg" alt="" class="profile-user-img img-fluid img-circle">
        </div>
        <div class="text-center">
          <b>
            <?php
  echo $_SESSION['nombre_us'];
  ?>
          </b>
        </div>
        <span class="text-secondary h6">Necesitamos su password para continuar</span>

        <div id="confirmado" class="alert alert-success text-center" style="display:none">
          <span>Se modifico el usuario<i class="fas fa-check m-1"></i></span>
        </div>
        <div id="rechazado" class="alert alert-danger text-center" style="display:none">
          <span>El password no es correcto<i class="fas fa-times m-1"></i></span>
        </div>
        <form id="form-confirmar">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-unlock"></i></span>
            </div>
            <input type="password" id="oldpass" class="form-control" placeholder="Ingrese password actual" required>
            <input type="hidden" id="id_user">
            <input type="hidden" id="funcion">
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
<div class="modal fade animate__animated animate__fadeInDown" id="crearUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="card card-success">
        <div class="card-header">
          <h3 id="verla" class="card-title">Crear usuario</h3>
          <button class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="card-body">
          <div class="alert alert-success text-center" id="agregado" style="display: none">
            <span>Usuario Actualizado<i class="fas fa-check m-1"></i></span>
          </div>
          <div class="alert alert-danger text-center" id="noagregado" style="display: none">
            <span>El Usuario ya existe<i class="fas fa-times m-1"></i></span>
          </div>
          <form class="zapato" id="FormCrear">
            <div class="form-group">
              <label for="nombre">Nombres</label>
              <input id="nombre" type="text" class="form-control" placeholder="Ingrese nombre" required>
            </div>
            <div class="form-group">
              <label for="apellido">Apellidos</label>
              <input id="apellido" type="text" class="form-control" placeholder="Ingrese apellido" required>
            </div>
            <div class="form-group">
              <label for="edad">Apellidos</label>
              <input id="edad" type="date" class="form-control" placeholder="Ingrese edad" required>
            </div>
            <div class="form-group">
              <label for="dni">DNI</label>
              <input id="dni" type="text" class="form-control" placeholder="Ingrese dni" required>
            </div>
            <div class="form-group">
              <label for="pass">Password</label>
              <input id="pass" type="password" class="form-control" placeholder="Ingrese Password" required>
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
          <h1 id="gala">Gestion Usuarios <button type="button" id="button-crear" class="btn bg-gradient-primary gala"
              data-toggle="modal" data-target="#crearUsuario">Crear Usuario</button></h1>
          <input type="hidden" id="tipo_usuario" value="<?php echo $_SESSION['us_tipo']?>">
        </div>
        <div class="col-sm-6">
          <ul class="breadcrumb float-sm-right">
            <li id="verla" class="breadcrumb-item"><a href="adm_catalogo.php">Home</a></li>
            <li id="verla" class="breadcrumb-item active">Gestion usuario</li>
          </ul>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <section>
    <div class="container-fluid">
      <div class="card card-success">
        <div class="card-header">
          <h3 id="verla" class="card-title">Buscar Usuario</h3>
          <div class="input-group">
            <input id="Buscar" type="text" class="form-control float-left" placeholder="Ingrese nombre de usuario">
            <div class="input-group-append">
              <button class="btn btn-default">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div id="usuarios" class="row d-flex align-items-stretch">

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
<script src="../js/GestionUsuario.js"></script>