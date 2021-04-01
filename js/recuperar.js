$(document).ready(function(){
    $('#aviso').hide();
    $('#aviso1').hide();
    $('#form-recuperar').submit(e=>{
        $('#aviso').hide();
        $('#aviso1').hide();
        Mostar_Loader('Recuperar_password');
        let email = $('#email-recuperar').val(); 
        let dni = $('#dni-recuperar').val();
        if(email==''||dni==''){
            $('#aviso').show();
            $('#aviso').text('Rellene todos los campos');
            Cerrar_Loader('');
        }
        else{
            $('#aviso').hide();
            let funcion='verificar';
            $.post('../controlador/recuperar.php',{funcion,email,dni},(response)=>{
                console.log(response,'entro al atrio');
                response=response.trim();
                if(response=='encontrado'){
                    let funcion='recuperar';
                    $('#aviso').hide();
                    $.post('../controlador/recuperar.php',{funcion,email,dni},(response2)=>{

                        $('#aviso').hide();
                        $('#aviso1').hide();
                        response2=response2.trim();
                        if(response2==response2.trim('enviado')){
                            Cerrar_Loader('exito_envio');
                            $('#aviso1').show();
                            alert(response2,'salio del aviso');
                            $('#aviso1').text('Se restablecio la contrasena');
                            $("#form-recuperar").trigger('reset');

                        }
                        
                        else{
                            Cerrar_Loader('error_envio');
                            $('#aviso').show();
                            $('#aviso').text('No se pudo remplazar');
                            $("#form-recuperar").trigger('reset');
                        }
                    })
                    
                }
                else{
                    console.log(response,'camino corto');
                    response=response.trim();
                    Cerrar_Loader('error_usuario');
                    $('#aviso').hide();
                    $('#aviso1').hide(); 
                    $('#aviso').show();
                    $("#form-recuperar").trigger('reset');
                    $('#aviso').text('El correo no se encuentra asociados o no estan registrados en el sistema');
                    
                }
            })
        } 
        e.preventDefault();
    })
    function Mostar_Loader(Mensaje){
        var texto = null;
        var mostrar = false;
        switch (Mensaje) {
            case 'Recuperar_password':
                texto='Se esta anviando el correo por favor espere...';
                mostrar=true;
                break;
        }
        if(mostrar){
            Swal.fire({
                title: 'Enviando correo',
                text: texto,
                showConfirmButton: false
              })
        }
    }
    function Cerrar_Loader(Mensaje){
        var tipo = null;
        var texto = null;
        var mostrar = false;
        switch (Mensaje) {
            case 'exito_envio':
                tipo='success',
                texto='El correo fue enviado correctamente';
                mostrar=true;
                break;
            case 'error_envio':
                tipo='danger',
                texto='El correo  no pudo enviarse por favor intentelo de nuevo.';
                mostrar=true;
                break;
            case 'error_usuario':
                tipo='danger',
                texto='El usuario perteneciente a estosdatos no fue encontrado.';
                mostrar=true;
                break;
        
            default:
                Swal.close();
                break;
        }
        if(mostrar){
            Swal.fire({
                position: 'center',
                icon: tipo,
                text: texto,
                showConfirmButton: false
              })
        }
    }
})