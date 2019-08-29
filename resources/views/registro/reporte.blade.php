@extends('layouts.template')

@section('css')
<!-- daterange picker -->
<link rel="stylesheet" href="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
<!-- bootstrap datepicker -->
<link rel="stylesheet"
    href="{{ asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('bower_components/select2/dist/css/select2.min.css') }}">
@endsection
@section('content')

<section class="content">
        
    

</section>

@endsection
@section('js')
<!-- bootstrap datepicker -->
<script src="{{ asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-notify.min.js') }}"></script>

<script type="text/javascript">     
    $('#datepicker').datepicker({
        format: 'dd/mm/yyyy',
        autoclose: true
    })
    $('#secretaria').select2({
        placeholder: "Seleccione Secretaria...",
        allowClear: true
    });
    $('#direccion').select2({
        placeholder: "Seleccione Direccíon...",
        allowClear: true
    });
    $('#unidad').select2({
        placeholder: "Seleccione Unidad...",
        allowClear: true
    });
    $('#tipo_servicio').select2({
        placeholder: "Seleccione Servicio...",
        allowClear: true
    });
    
    $('#secretaria').change(function () {
        $('#direccion').removeAttr('disabled');
    });
    $('#direccion').change(function () {
        $('#unidad').removeAttr('disabled');
    });
</script>
<script>
    var activos_array = [];
    var contador =0;
        $('#btn_detalle').click(function (event) {
            event.preventDefault();            
                
                var servicio = $('#servicio').val().trim();
                var tipo_servicio = $('#tipo_servicio').val().trim();
                var serial_gamea = $('#serial_gamea').val().trim();
                var cod_gamea_p = $('#cod_gamea_p').val().trim();
                var caracteristicas = $('#caracteristicas').val().trim();
                var estado = $('#estado').val().trim();
            

            if (servicio.length == 0 || tipo_servicio.length == 0|| estado.length == 0) {
                $.notify({
                    icon: 'glyphicon glyphicon-warning-sign',
                    title: '<b>Error de ingreso de datos</b></br>',
                    message: ` - Servicio <br>
                                - Trabajo Realizado <br>
                                - Estado <br>
                                No pueden estar vacios
                            `
                        },{
                    type: 'danger'
                }); 
            }
            else{
                
                obj = {
                id : contador++,
                servicio: $('#servicio').val().trim(),
                servicio_t: $('#servicio option:selected').text().trim(),
                tipo_servicio: $('#tipo_servicio').val().trim(),
                tipo_servicio_t: $('#tipo_servicio option:selected').text().trim(),
                serial_gamea: $('#serial_gamea').val().trim(),
                cod_gamea_p: $('#cod_gamea_p').val().trim(),
                caracteristicas: $('#caracteristicas').val().trim(),
                estado: $('#estado').val().trim()
                };

                activos_array.push(obj);                       

                var pos = activos_array.indexOf(obj);
                var tr = '<tr id= '+obj.id+'><td>'+obj.servicio_t+'</td><td>'+obj.tipo_servicio_t+'</td><td><b>Cod:</b> '+obj.cod_gamea_p+'<br><b>S/N:</b> '+obj.serial_gamea+
                    '</td><td>'+obj.caracteristicas+'</td><td>'+obj.estado+
                    '</td><td><button type="button" onclick="slice('+obj.id+')" class="btn btn-danger">Eliminar</button></td></tr>';
                $("#cuerpo").append(tr)
                $("#form_detalle")[0].reset();
            }

            
            console.log(activos_array);
        });
        
        function slice(id){
            //console.log(id);
            index = activos_array.findIndex(x => x.id ==id);
            activos_array.splice(id, 1);
            //eliminamos el la fila de la tabla
            document.getElementById(id).outerHTML="";
        }

        $('.delete_item').click(function(){
            console.log('hola');
        });
        
       
        $('#insertar').click(function (event) {
            event.preventDefault();
             var final ={
            secretaria: $('#secretaria').val(),
            direccion: $('#direccion').val(),
            unidad: $('#unidad').val(),
            tec_id: $('#tecnico').val(),
            tipo_activo: $('#tipo_activo').val(),
            solicitante: $('#solicitante').val(),
            celular: $('#celular').val(),
            fec_solicitud: $('#datepicker').val(),
            codigo_gamea: $('#cod_gamea').val()

            
        };
        console.log(final);
            
            final.activos = activos_array;
            $.ajax({
                url: "{{ url('/save_detalle') }}",
                method: "POST",
                dataType: "json",
                data: JSON.stringify(final),
                contentType: "aplication/json; charset=utf-8",                             
                success: function(data){
                    if(true)
                    location.reload();
                    $.notify({message: 'El registro se guardo satisfactoriamente'},
                            { type: 'success'});
                },
                error: function(data){
                    console.log(data.responseJSON.errors);
                    var obj=data.responseJSON.errors;
                    $.notify({
                        icon: 'glyphicon glyphicon-warning-sign',
                        title: '<b>Error de ingreso de datos</b></br>',
                        message: `
                            ${ (obj.secretaria)?obj.secretaria[0]:" " }</br>
                            ${ (obj.tec_id)?obj.tec_id[0]:" " }</br>
                            ${ (obj.solicitante)?obj.solicitante[0]:" " }</br>
                            ${ (obj.celular_sol)?obj.celular_sol[0]:" " }</br>
                            ${ (obj.fec_solicitud)?obj.fec_solicitud[0]:" " }
                            `
                        },{
                        type: 'danger'
                        });      
                }                
            });
        });   
</script>
<script></script>
@endsection
