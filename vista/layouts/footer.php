<footer class="main-footer">
  <div class="float-right d-none d-sm-block">
    <b>Version</b> 3.1.0-rc
  </div>
  <strong>Copyright &copy; 2014-2020 <a href="">AdminLTE.io</a>.</strong> All rights reserved.
</footer>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../js/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../js/demo.js"></script>
<!-- Sweetalert -->
<script src="../js/sweetalert2.js"></script>
<!-- Select2 -->
<script src="../js/select2.min.js"></script>
<!-- Datatables -->
<script src="../js/datatables.js"></script>
</body>
<script>
let funcion= 'devolver_avatar';
$.post('../controlador/UsuarioController.php',{funcion},(response)=>{
  const avatar = JSON.parse(response);
  $('#cromoCuatro').attr('src','../img/'+avatar.avatar);
})
funcion='tipo_usuario';
$.post('../controlador/UsuarioController.php',{funcion},(response)=>{
  if(response==1){
    $('#gestion_lote').hide();
  }
  else if(response==2){
    $('#gestion_lote').hide();
    $('#gestion_producto').hide();
    $('#gestion_usuario').hide();
    $('#gestion_proveedor').hide();
    $('#gestion_atributo').hide();
  }
})
</script>
</html>