$(document).ready(function(){
    buscar_pre(); 
    var funcion;
    var flack=false
    $('#form-crear-presentacion').submit(e=>{
         let nombre_presentacion = $('#nombre-presentacion').val();
         let id_editado = $('#id_editar_pre').val();
         if(flack==false){
             funcion='crear'
         }
         else{

             funcion='editar';
         }
       
         $.post('../controlador/PresentacionController.php',{nombre_presentacion,id_editado,funcion},(response)=>{
             console.log(response);
             response=response.trim();
             if(response=='add'){ 
                $('#add-pre').hide('slow');
                $('#add-pre').show(1000);
                $('#add-pre').hide(2000);
                $('#form-crear-presentacion').trigger('reset')
                buscar_pre()
             }
             if(response=='noadd'){
                $('#noadd-pre').hide('slow');
                $('#noadd-pre').show(1000);
                $('#noadd-pre').hide(2000);
                $('#form-crear-presentacion').trigger('reset');
             }
             if(response=='edit'){
                $('#edit-pre').hide('slow');
                $('#edit-pre').show(1000);
                $('#edit-pre').hide(2000);
                $('#form-crear-presentacion').trigger('reset');
                buscar_pre()
             }
             flack=false
         })
         e.preventDefault();
    })
    function buscar_pre(consulta){
        funcion='buscar'
        $.post('../controlador/PresentacionController.php',{consulta,funcion},(response)=>{
            const presentaciones = JSON.parse(response);
            let template=''
            presentaciones.forEach(presentacion => {
                template+=`
                <tr preId="${presentacion.id}" preNombre="${presentacion.nombre}">
                    <td> 
                        <button class="editar-pre btn btn-success" title="editar Presentaciòn" type="button" data-toggle="modal" data-target="#crearpresentacion">
                        <i class="fas fa-pencil-alt"></i>
                        </button>
                        <button class="borrar-pre btn btn-danger" title="borrar Presentaciòn">
                        <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                    <td>${presentacion.nombre}</td>
                 </tr>
              `;
            });
            $('#presentaciones').html(template);
        })
    }
    $(document).on('keyup','#buscar-presentacion',function(){
        let valor= $(this).val();
        if(valor!=''){
            buscar_pre(valor);

        }
        else{
            buscar_pre()
        }
    })
    
   
      $(document).on('click','.borrar-pre',(e)=>{
        funcion="borrar"
        const elemento = $(this)[0].activeElement.parentElement.parentElement
        const id = $(elemento).attr('preId');
        const nombre = $(elemento).attr('preNombre');
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success m-1',
                cancelButton: 'btn btn-danger m-1'
            },
            buttonsStyling: false
        })
        swalWithBootstrapButtons.fire({
            title: 'Desea eliminar '+nombre+' este producto?',
            text: "No podras revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si borra esto!',
            cancelButtonText: 'No, cancela esto',
            reverseButtons: true
          }).then((result) => {
            if (result.value) {
                $.post('../controlador/PresentacionController.php',{id,funcion},(response)=>{
                flack == false;
                    console.log(response);
                    response=response.trim();
                    if(response==response.trim('borrado')){
                           Swal.fire(
                          'Borrado!',
                          'L presentaciòn '+nombre+' fue borrado.',
                          'success'
                        )
                        buscar_pre()

                    }
                    else{
                        Swal.fire(
                            'No se pudo borrar!',
                            'La presentacion '+nombre+' no fue borrado por que esta siendo usado por un producto.',
                            'error'
                          )
                          
                    }
                });
            } else if (result.dismiss === Swal.DismissReason.cancel)  {
                swalWithBootstrapButtons.fire(
                    'Cancelado',
                    'La presenatcion '+nombre+' No fue borrado',
                    'error'
                )
            }       
        });
    });
    $(document).on('click','.editar-pre',(e)=>{
    const elemento = $(this)[0].activeElement.parentElement.parentElement
    const id = $(elemento).attr('preId');
    const nombre = $(elemento).attr('preNombre');
    $('#id_editar_pre').val(id);
    $('#nombre-presentacion').val(nombre);
    flack=true; 
    
    });

});