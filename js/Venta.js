$(document).ready(function(){
    mostrar_consultas();
    listar_ventas();
    var datatable;
    function mostrar_consultas(){
       let funcion='mostrar_consultas';
        $.post('../controlador/VentaController.php',{funcion},(response)=>{
            const vistas = JSON.parse(response);
            $('#venta_dia_vendedor').html((vistas.venta_dia_vendedor*1).toFixed(2));
            $('#venta_diaria').html((vistas.venta_diaria*1).toFixed(2));
            $('#venta_mensual').html((vistas.venta_mensual*1).toFixed(2));
            $('#venta_anual').html((vistas.venta_anual*1).toFixed(2));
        })
    }
    function listar_ventas() {
        funcion ="listar";
   
           datatable = $('#tabla_venta').DataTable( {
            "ajax": {
                "url": "../controlador/VentaController.php",
                "method": "POST",
                "data":{funcion:funcion} 
            },
            "columns": [
                { "data": "id_venta" },
                { "data": "fecha" },
                { "data": "cliente" }, 
                { "data": "dni" },
                { "data": "total" },
                { "data": "vendedor" },
                {"defaultContent": `<button class="imprimir btn btn-secondary btn-sm"><i class="fas fa-print"></i></button>
                                    <button class="ver btn btn-success btn-sm" type="button" data-toggle="modal" data-target="#vista_venta"><i class="fas fa-search"></i></button> 
                                    <button class="borrar btn btn-danger btn-sm"><i class="fas fa-window-close"></i></button>`}
            ],
            "destroy": true,
            "language": espanol
        });
    }
    
    $('#tabla_venta tbody').on('click','.imprimir',function(){
        let datos = datatable.row($(this).parents()).data();
        let id = datos.id_venta;
        $.post('../controlador/PDFController.php',{id},(response)=>{
            console.log(response);
            window.open('../pdf/pdf-'+id+'.pdf','_blank');
        })        
    })
    $('#tabla_venta tbody').on('click','.borrar',function(){
        let datos = datatable.row($(this).parents()).data();
        let id = datos.id_venta;
        funcion='borrar_venta';
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
              confirmButton: 'btn btn-success m-1',
              cancelButton: 'btn btn-danger m-1'
            },
            buttonsStyling: false
          })
          
          swalWithBootstrapButtons.fire({
            title: 'Esta seguro de que desea eliminar la Venta: '+id+'?',
            text: "No podras revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Si, borra esto!',
            cancelButtonText: 'No, cancelar!',
            reverseButtons: true
          }).then((result) => {
            if (result.isConfirmed) {
                $.post('../controlador/DetalleVentaController.php',{funcion,id},(response)=>{
                    response=response.trim();
                    if(response == 'delete'){
                        swalWithBootstrapButtons.fire(
                            'Eliminado!',
                            'La venta: '+id+' ha sido Eliminada',
                            'success'
                          )
                          listar_ventas()
                    }else if(response ='nodelete'){
                        swalWithBootstrapButtons.fire(
                            'No eliminada',
                            'No tienes prioridad parar eliminar esta venta:)',
                            'error'
                            )
                            
                    }
                })
              swalWithBootstrapButtons.fire(
                'Eliminado!',
                'La venta: '+id+' ha sido Eliminada',
                'success'
              )
            
            } else if (result.dismiss === Swal.DismissReason.cancel) {
              swalWithBootstrapButtons.fire(
                'No eliminada',
                'La venta no se elimino:)',
                'error'
              )
            }
          })
       
    })
    $('#tabla_venta tbody').on('click','.ver',function(){
        let datos = datatable.row($(this).parents()).data();
        let id = datos.id_venta;
        funcion='ver';
        $('#codigo_venta').html(datos.id_venta);
        $('#fecha').html(datos.fecha);
        $('#cliente').html(datos.cliente);
        $('#dni').html(datos.dni);
        $('#total').html(datos.total);
        $('#vendedor').html(datos.vendedor);
        $('#total').html(datos.total);
        $.post('../controlador/VentaProductoController.php',{funcion,id},(response)=>{
            let registros = JSON.parse(response);
            let template='';
            $('#registros').html(template);
            registros.forEach(registro => {
                template+=`
                    <tr>
                    <td>${registro.cantidad}</td>
                    <td>${registro.precio}</td>
                    <td>${registro.producto}</td>
                    <td>${registro.concentracion}</td>
                    <td>${registro.adicional}</td>
                    <td>${registro.laboratorio}</td>
                    <td>${registro.presentacion}</td>
                    <td>${registro.tipo}</td>
                    <td>${registro.subtotal}</td>
                    </tr>
                `;
                $('#registros').html(template); 
            });
        })
    })
})
let espanol = {
    	

    "processing": "Procesando...",
    "lengthMenu": "Mostrar _MENU_ registros",
    "zeroRecords": "No se encontraron resultados",
    "emptyTable": "Ning??n dato disponible en esta tabla",
    "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
    "infoFiltered": "(filtrado de un total de _MAX_ registros)",
    "search": "Buscar:",
    "infoThousands": ",",
    "loadingRecords": "Cargando...",
    "paginate": {
        "first": "Primero",
        "last": "??ltimo",
        "next": "Siguiente",
        "previous": "Anterior"
    },
    "aria": {
        "sortAscending": ": Activar para ordenar la columna de manera ascendente",
        "sortDescending": ": Activar para ordenar la columna de manera descendente"
    },
    "buttons": {
        "copy": "Copiar",
        "colvis": "Visibilidad",
        "collection": "Colecci??n",
        "colvisRestore": "Restaurar visibilidad",
        "copyKeys": "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br \/> <br \/> Para cancelar, haga clic en este mensaje o presione escape.",
        "copySuccess": {
            "1": "Copiada 1 fila al portapapeles",
            "_": "Copiadas %d fila al portapapeles"
        },
        "copyTitle": "Copiar al portapapeles",
        "csv": "CSV",
        "excel": "Excel",
        "pageLength": {
            "-1": "Mostrar todas las filas",
            "1": "Mostrar 1 fila",
            "_": "Mostrar %d filas"
        },
        "pdf": "PDF",
        "print": "Imprimir"
    },
    "autoFill": {
        "cancel": "Cancelar",
        "fill": "Rellene todas las celdas con <i>%d<\/i>",
        "fillHorizontal": "Rellenar celdas horizontalmente",
        "fillVertical": "Rellenar celdas verticalmentemente"
    },
    "decimal": ",",
    "searchBuilder": {
        "add": "A??adir condici??n",
        "button": {
            "0": "Constructor de b??squeda",
            "_": "Constructor de b??squeda (%d)"
        },
        "clearAll": "Borrar todo",
        "condition": "Condici??n",
        "conditions": {
            "date": {
                "after": "Despues",
                "before": "Antes",
                "between": "Entre",
                "empty": "Vac??o",
                "equals": "Igual a",
                "notBetween": "No entre",
                "notEmpty": "No Vacio",
                "not": "Diferente de"
            },
            "number": {
                "between": "Entre",
                "empty": "Vacio",
                "equals": "Igual a",
                "gt": "Mayor a",
                "gte": "Mayor o igual a",
                "lt": "Menor que",
                "lte": "Menor o igual que",
                "notBetween": "No entre",
                "notEmpty": "No vac??o",
                "not": "Diferente de"
            },
            "string": {
                "contains": "Contiene",
                "empty": "Vac??o",
                "endsWith": "Termina en",
                "equals": "Igual a",
                "notEmpty": "No Vacio",
                "startsWith": "Empieza con",
                "not": "Diferente de"
            },
            "array": {
                "not": "Diferente de",
                "equals": "Igual",
                "empty": "Vac??o",
                "contains": "Contiene",
                "notEmpty": "No Vac??o",
                "without": "Sin"
            }
        },
        "data": "Data",
        "deleteTitle": "Eliminar regla de filtrado",
        "leftTitle": "Criterios anulados",
        "logicAnd": "Y",
        "logicOr": "O",
        "rightTitle": "Criterios de sangr??a",
        "title": {
            "0": "Constructor de b??squeda",
            "_": "Constructor de b??squeda (%d)"
        },
        "value": "Valor"
    },
    "searchPanes": {
        "clearMessage": "Borrar todo",
        "collapse": {
            "0": "Paneles de b??squeda",
            "_": "Paneles de b??squeda (%d)"
        },
        "count": "{total}",
        "countFiltered": "{shown} ({total})",
        "emptyPanes": "Sin paneles de b??squeda",
        "loadMessage": "Cargando paneles de b??squeda",
        "title": "Filtros Activos - %d"
    },
    "select": {
        "1": "%d fila seleccionada",
        "_": "%d filas seleccionadas",
        "cells": {
            "1": "1 celda seleccionada",
            "_": "$d celdas seleccionadas"
        },
        "columns": {
            "1": "1 columna seleccionada",
            "_": "%d columnas seleccionadas"
        }
    },
    "thousands": ".",
    "datetime": {
        "previous": "Anterior",
        "next": "Proximo",
        "hours": "Horas",
        "minutes": "Minutos",
        "seconds": "Segundos",
        "unknown": "-",
        "amPm": [
            "am",
            "pm"
        ]
    },
    "editor": {
        "close": "Cerrar",
        "create": {
            "button": "Nuevo",
            "title": "Crear Nuevo Registro",
            "submit": "Crear"
        },
        "edit": {
            "button": "Editar",
            "title": "Editar Registro",
            "submit": "Actualizar"
        },
        "remove": {
            "button": "Eliminar",
            "title": "Eliminar Registro",
            "submit": "Eliminar",
            "confirm": {
                "_": "??Est?? seguro que desea eliminar %d filas?",
                "1": "??Est?? seguro que desea eliminar 1 fila?"
            }
        },
        "error": {
            "system": "Ha ocurrido un error en el sistema (<a target=\"\\\" rel=\"\\ nofollow\" href=\"\\\">M??s informaci??n&lt;\\\/a&gt;).<\/a>"
        },
        "multi": {
            "title": "M??ltiples Valores",
            "info": "Los elementos seleccionados contienen diferentes valores para este registro. Para editar y establecer todos los elementos de este registro con el mismo valor, hacer click o tap aqu??, de lo contrario conservar??n sus valores individuales.",
            "restore": "Deshacer Cambios",
            "noMulti": "Este registro puede ser editado individualmente, pero no como parte de un grupo."
        }
    }

};