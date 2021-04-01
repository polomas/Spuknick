<?php
session_start();
if($_SESSION['us_tipo']==1||$_SESSION['us_tipo']==3||$_SESSION['us_tipo']==2){
    include_once 'layouts/header.php'
?>

<title>Adm | Editar Datos</title>
<!-- Content Wrapper. Contains page content -->
<?php
  include_once 'layouts/nav.php';
  ?>
<!-- Modal -->
<div class="modal fade animate__animated animate__bounceInDown" id="Cambiocontra" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cambiar Password</h5>
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
                <div class="alert alert-success text-center" id="update" style="display:none">
                    <span><i class="fas fa-check m-1"></i>password actualizado</span>
                </div>
                <div class="alert alert-danger text-center" id="incorecto" style="display:none">
                    <span><i class="fas fa-times m-1"></i>La contraseña es incorrecta</span>
                </div>

                <form id="form-pass">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-unlock"></i></span>
                        </div>
                        <input type="password" id="oldpass" class="form-control" placeholder="Ingrese password actual">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        </div>
                        <input type="text" id="newpass" class="form-control" placeholder="Ingrese password nueva">
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
<!-- CAMBIO AVATAR -->

<div class="modal fade animate__animated animate__fadeInDown" id="cambioFoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cambiar Avatar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>

                </button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <img id="cromoUno" src="../img/scudo5.jpg" alt="" class="profile-user-img img-fluid img-circle">
                </div>
                <div class="text-center">
                    <b>
                        <?php
  echo $_SESSION['nombre_us'];
  ?>
                    </b>
                </div>
                <div class="alert alert-success text-center" id="edit" style="display:none">
                    <span><i class="fas fa-check m-1"></i>Se cambio el Avatar</span>
                </div>
                <div class="alert alert-danger text-center" id="noedit" style="display:none">
                    <span><i class="fas fa-times m-1"></i>Formato no soportado</span>
                </div>

                <form id="FotoAvatar" enctype="multipart/form-data">
                    <div class="input-group mb-3 ml-5 mt-2">
                        <input type="file" name="photo" class="input-group">
                        <input type="hidden" name="funcion" value="cambiar_foto">
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
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Datos personales</h1>
                </div>
                <div class="col-sm-6">
                    <ul class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../vista/adm_catalogo.php">Home</a></li>
                        <li class="breadcrumb-item active">Datos Personales</li>
                    </ul>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card card-success card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img id="cromoDos" src="../img/avatar3.png" alt=""
                                        class="profile-user-img img-fluid img-circle">
                                </div>
                                <div class="text-center mt-1">
                                    <button type="button" data-toggle="modal" data-target="#cambioFoto"
                                        class="btn btn-primary btn-sm">Cambiar Avatar</button>
                                </div>
                                <input id="id_usuario" type="hidden" value="<?php echo $_SESSION['usuario']?>">
                                <h3 id="nombre_us" class="profile-username text-center text-success">Nombre</h3>
                                <p id="apellidos_us" class="text-muted text-center">Apellidos</p>
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b style="color: #0B7300;">Edad</b>
                                        <a href="" class="float-right" id="edad">12</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b style="color: #0B7300;">DNI</b>
                                        <a href="" class="float-right" id="dni_us">12</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b style="color: #0B7300;">Tipo Usuario</b>
                                        <span id="us_tipo" class="float-right">Administrador</span>
                                    </li>
                                    <button class="btn ntn-block btn-outline-warning btn-sm" type="button"
                                        data-toggle="modal" data-target="#Cambiocontra">Cambiar Password</button>
                                </ul>
                            </div>
                        </div>
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Sobre mi</h3>
                            </div>
                            <div class="card-body">
                                <strong style="color: #0B7300;">
                                    <i class="fas fa-phone mr-2"> Teléfono</i>
                                </strong>
                                <p id="telefono_us" class="text-muted"> 097654</p>
                                <strong style="color: #0B7300;">
                                    <i class="fas fa-map-marker-alt mr-2"> Residencia</i>
                                </strong>
                                <p id="residencia_us" class="text-muted"> La casa</p>
                                <strong style="color: #0B7300;">
                                    <i class="fas fa-at mr-2"> Correo</i>
                                </strong>
                                <p id="correo_us" class="text-muted"> oswa@gmail.com</p>
                                <strong style="color: #0B7300;">
                                    <i class="fas fa-smile mr-2"> Sexo</i>
                                </strong>
                                <p id="sexo_us" class="text-muted"> M & F</p>
                                <strong style="color: #0B7300;">
                                    <i class="fas fa-pencil-alt mr-2"> Informacion Adicional</i>
                                </strong>
                                <p id="adicional_us" class="text-muted"> M & F</p>
                                <button class="edit bg-gradient-danger btn btn-block">Editar</button>
                            </div>
                            <div class="card-footer">
                                <p class="text-muted">Click en boton si desea editar</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="cadr-title">Editar datos personales</h3>
                            </div>
                            <div class="card-body">
                                <div class="alert alert-success text-center" id="ajustar" style="display:none">
                                    <i class="fas fa-check m-1"></i>Editado
                                </div>
                                <div class="alert alert-danger text-center" id="noajustar" style="display:none">
                                    <i class="fas fa-times m-1"></i>Ediciòn deshabilitada
                                </div>
                                <form id="form-usuario" class="form-horizontal">
                                    <div class="form-group row">
                                        <label for="telefono" class="col-sm-2 col-form-label">Teléfono</label>
                                        <div class="col-sm-10">
                                            <input type="number" id="telefono" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="residencia" class="col-sm-2 col-form-label">Residencia</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="residencia" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="correo" class="col-sm-2 col-form-label">Correo</label>
                                        <div class="col-sm-10">
                                            <input type="email" id="correo" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="sexo" class="col-sm-2 col-form-label">Sexo</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="sexo" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="adicional" class="col-sm-2 col-form-label">Información</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" id="adicional" cols="30"
                                                rows="10"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10 float-right">
                                            <button class="btn btn-block btn-outline-success">Guardar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer">
                                <p class="text-muted">Cuidado con ingresar datos erroneos </p>
                            </div>
                        </div>
                    </div>
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
<script src="../js/Usuario.js"></script>