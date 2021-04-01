$(document).ready(function(){
    buscar_lab(); 
    var funcion;
    var flack=false
    $('#form-crear-laboratorio').submit(e=>{
         let nombre_laboratorio = $('#nombre-laboratorio').val();
         let id_editado = $('#id_editar_lab').val();
         if(flack==false){
             funcion='crear'
         }
         else{

             funcion='editar';
         }
       
         $.post('../controlador/LaboratorioController.php',{nombre_laboratorio,id_editado,funcion},(response)=>{
            
             response=response.trim()
             if(response=='add'){ 
                $('#add-laboratorio').hide('slow');
                $('#add-laboratorio').show(1000);
                $('#add-laboratorio').hide(2000);
                $('#form-crear-laboratorio').trigger('reset')
                buscar_lab()
             }
             if(response=='noadd'){
                $('#noadd-laboratorio').hide('slow');
                $('#noadd-laboratorio').show(1000);
                $('#noadd-laboratorio').hide(2000);
                $('#form-crear-laboratorio').trigger('reset');
             }
             if(response=='edit'){
                $('#edit-lab').hide('slow');
                $('#edit-lab').show(1000);
                $('#edit-lab').hide(2000);
                $('#form-crear-laboratorio').trigger('reset');
                buscar_lab();
             }
             flack = false;
         })
         e.preventDefault();
    })
    function buscar_lab(consulta){
        funcion='buscar'
        $.post('../controlador/LaboratorioController.php',{consulta,funcion},(response)=>{
            const laboratorios = JSON.parse(response);
            let template=''
            laboratorios.forEach(laboratorio => {
                template+=`
                <tr labId="${laboratorio.id}" labNombre="${laboratorio.nombre}" labAvatar="${laboratorio.avatar}">
                    <td> 
                        <button class="avatar btn btn-info" title="cambiar logo de laboratorio" type="button" data-toggle="modal" data-target="#cambiologo">
                        <i class="fas fa-image"></i>
                        </button>
                        <button class="editar btn btn-success" title="editar laboratorio" type="button" data-toggle="modal" data-target="#crearlaboratorio">
                        <i class="fas fa-pencil-alt"></i>
                        </button>
                        <button class="borrar btn btn-danger" title="borrar laboratorio">
                        <i class="fas fa-trash-alt"></i>
                        </button>
                    
                    </td>
                    <td>
                        <img src="${laboratorio.avatar}" class="img-fluid rounded" width="70" height="70">
                    </td>
                    <td>${laboratorio.nombre}</td>
                    
                   
                </tr>
                `
            });
            $('#laboratorios').html(template);
        })
    }
    $(document).on('keyup','#buscar-laboratorio',function(){
        let valor= $(this).val();
        if(valor!=''){
            buscar_lab(valor);

        }
        else{
            buscar_lab()
        }
    })
    $(document).on('click','.avatar',(e)=>{
        funcion="cambiar_logo"
        const elemento = $(this)[0].activeElement.parentElement.parentElement
        const id = $(elemento).attr('labId')
        const nombre = $(elemento).attr('labNombre');
        const avatar = $(elemento).attr('labAvatar');
        $('#logoactual').attr('src',avatar);
        $('#nombre_logo').html(nombre);
        $('#funcion').val(funcion);
        $('#id_logo_lab').val(id);
    })
    $('#form-logo').submit(e=>{
        let formData = new FormData($('#form-logo')[0]);
        $.ajax({
          url:'../controlador/LaboratorioController.php',
          type:'POST',
          data:formData,
          cache:false,
          processData:false,
          contentType:false
        }).done(function(response){
            const json = JSON.parse(response)
            if(json.alert=='edit'){
                $('#logo_actual').attr('src',json.ruta)
                $("#La").hide('slow');
                $("#La").show(1000);
                $("#La").hide(2000);
                $('#form-logo').trigger('reset');
                buscar_lab()
            }
            else{
                $("#Pa").hide('slow');
                $("#Pa").show(1000);
                $("#Pa").hide(2000);
                $('#form-logo').trigger('reset');
            }
        })
        e.preventDefault();
      })
      $(document).on('click','.borrar',(e)=>{
        funcion="borrar"
        const elemento = $(this)[0].activeElement.parentElement.parentElement
        const id = $(elemento).attr('labId');
        const nombre = $(elemento).attr('labNombre');
        const avatar = $(elemento).attr('labAvatar');
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger m-1'
            },
            buttonsStyling: false
        })
        swalWithBootstrapButtons.fire({
            title: 'Desea eliminar '+nombre+' este producto?',
            text: "No podras revertir esto!",
            imageUrl: ''+avatar+'',
            imageWidth: 100,
            imageHeight: 100,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si borra esto!',
            cancelButtonText: 'No, cancela esto',
            reverseButtons: true
          }).then((result) => {
            if (result.value) {
                $.post('../controlador/LaboratorioController.php',{id,funcion},(response)=>{
                flack == false
                response=response.trim();
                    if(response==response.trim('borrado')){
                        console.log(response,'entro al uno');
                           Swal.fire(
                          'Borrado!',
                          'El laboratorio '+nombre+' fue borrado.',
                          'success'
                        )
                        buscar_lab()

                    }
                    else{
                        Swal.fire(
                            'No se pudo borrar!',
                            'El laboratorio '+nombre+' no fue borrado por que esta siendo usado por un producto.',
                            'error'
                          )
                          
                    }
                });
            } else if (result.dismiss === Swal.DismissReason.cancel)  {
                swalWithBootstrapButtons.fire(
                    'Cancelado',
                    'El laboratorio '+nombre+' No fue borrado',
                    'error'
                )
            }       
        });
    });
    $(document).on('click','.editar',(e)=>{
    const elemento = $(this)[0].activeElement.parentElement.parentElement
    const id = $(elemento).attr('labId');
    const nombre = $(elemento).attr('labNombre');
    $('#id_editar_lab').val(id);
    $('#nombre-laboratorio').val(nombre);
    flack = true; 
    
    });

});