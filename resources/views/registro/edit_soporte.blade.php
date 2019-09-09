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
        
    <div class="box-body">
        @if (isset($errors) && count($errors) > 0)
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <div class="col-md-6">

                <!-- general form elements -->
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title"><strong>Edición - Servicio Técnico </strong></h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                   
                        
                    <form role="form" method="post" id="formulario_principal" name="formulario_principal">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="secretaria">Secretaría <b style="color:red;">*</b></label>
                                        <select id="secretaria" name="secretaria" class="form-control" required>
                                            <option value="" disable selected></option>
                                            @foreach ($secretaria as $sec)
                                                @if ($soporte->sec_id == $sec->id)
                                                    <option value="{{ $sec->id }}" selected>{{ $sec->sec_name }}</option>
                                                @else
                                                    <option value="{{ $sec->id }}">{{ $sec->sec_name }}</option>
                                                @endif                                            
                                            @endforeach                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="direccion">Dirección</label>
                                        <select id="direccion" name="direccion" class="form-control" >
                                            <option value="0" disable selected></option>
                                            @foreach ($direccion as $dir)
                                                @if ($soporte->dir_id == $dir->id)
                                                    <option value="{{ $dir->id }}" selected>{{ $dir->dir_name }}</option>
                                                @else
                                                    <option value="{{ $dir->id }}">{{ $dir->dir_name }}</option>
                                                @endif                                            
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="unidad">Unidad</label>
                                        <select id="unidad" name="unidad" class="form-control">
                                            <option value="0" disable selected></option>
                                            @foreach ($unidad as $uni)
                                                @if ($soporte->uni_id == $uni->id)
                                                    <option value="{{ $uni->id }}" selected>{{ $uni->uni_name }}</option>
                                                @else
                                                    <option value="{{ $uni->id }}">{{ $uni->uni_name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="tecnico">Tecnico <b style="color:red;">*</b></label>
                                        <select class="form-control" name="tecnico" id="tecnico" required>
                                            
                                            <option value="{{ $soporte->tec_id}}">{{ $soporte->tec_id }}</option>                                
                                            @foreach ($tecnico as $tec)
                                                @if ($soporte->tec_id == $tec->id)
                                                    <option value="{{ $tec->id }}" selected>{{ $tec->tec_nombres }} {{ $tec->tec_paterno }} {{ $tec->tec_materno }}</option>
                                                @else
                                                    <option value="{{ $tec->id }}">{{ $tec->tec_nombres }} {{ $tec->tec_paterno }} {{ $tec->tec_materno }}</option>
                                                @endif                                            
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="solicitante">Tipo activo</label>
                                        <select class="form-control" name="tipo_activo" id="tipo_activo">
                                            <option>CPU</option>
                                            <option>LAPTOP</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Date <b style="color:red;">*</b></label>
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" class="form-control pull-right" id="datepicker"
                                                    name="datepicker" required value="{{ \Carbon\Carbon::parse($soporte->fec_solicitud)->format('d/m/Y') }}">
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="solicitante">Solicitante <b style="color:red;">*</b></label>
                                        <input type="text" name="solicitante" id="solicitante" class="form-control text-uppercase"
                                            placeholder="Nombre del solicitante" required value="{{ $soporte->solicitante }}">
                                            {{ csrf_field() }}
                                        <input type="hidden" id="id" name="id" value="{{ $soporte->id_support }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="solicitante">Celular <b style="color:red;">*</b></label>
                                        <input type="number" id="celular" name="celular" class="form-control"
                                            placeholder="Número de celular" value="{{ $soporte->celular_sol }}">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="submit" name="actualizar" id="actualizar" value="Guardar actualizacion" class="btn btn-primary btn-block">
                                </div>
                                <div class="col-md-6">
                                    <input type="reset" name="cancelar" id="cancelar" value="Cancelar" class="btn btn-danger btn-block" onclick="window.location.href='{{ route('lista') }}'">
                                </div>
                            </div>
                        </div>
                    </form>
                   
                </div>
            </div>
            <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title"><strong> Registros </strong></h3>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="box-body">
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Servicio</th>
                                                        <th>Trabajo<br>Realizado</th>
                                                        <th>Estado</th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody id="cuerpo">

                                                </tbody>
                                                <tfoot>
                                                    
                                                </tfoot>
                                            </table>                                            
                                        </div>
                                        <!-- /.box-body -->
                                    </div>
                                    <!-- /.box -->
                                </div>
                                <!-- /.col -->
                            </div>
                        <!-- /.row -->
                        
                    </div>
                    <!-- /.box-header -->
    
                </div>
            </div>
        </div>
    
    <div class="box-body">
            <div class="row">
                <div class="col-md-6">
    
                    <!-- general form elements -->
                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title"><strong> Detalle del soporte técnico </strong></h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->          
                    <form role="form" action="" id="form_detalle">
                            <div class="box-body">
                                    
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Servicio <b style="color:red;">*</b></label>
                                    <select name="servicio" id="servicio" class="form-control" required>
                                        <option value="0">Seleccione Servicio...</option>
                                        @foreach ($categoria as $cate)
                                            <option value="{{ $cate->id }}">{{ $cate->cat_nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Trabajo realizado <b style="color:red;">*</b></label>
                                        <select name="tipo_servicio" id="tipo_servicio" class="form-control" required>
                                            <option value="">Seleccione un tipo de servicio...</option>
                                            @foreach ($activos as $act)
                                                <option value="{{ $act->id }}">{{ $act->nombre_activo_ser }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Estado</label>
                                            <select class="form-control" name="estado" id="estado">
                                                <option>Seleccione estado...</option>
                                                <option value="Reparado">Reparado</option>
                                                <option value="Reemplazo">Reemplazo</option>
                                                <option value="Dañado">Dañado</option>
                                                <option value="A garantia">A garantía</option>
                                            </select>
                                        </div>
                                    </div>
                            </div>                            
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                                <a href="#" class="btn btn-success" id="btn_detalle">Registrar detalle</a>
                        </div>
                    </form>
                    <!-- /.box -->
                </div>
            </div>
            <!-- /.row -->            
    </div>
</div>

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
    $('#tecnico').select2({
        placeholder: "Seleccione Tecnico...",
        allowClear: true
    });
    
</script>
<script>
        var activos_array = [];
        var contador =0;
        var detalle = {!! json_encode($detalles) !!};
        var activo_ser = {!! json_encode($activos) !!};
        var categoria = {!! json_encode($categoria) !!};
        var soporte = {!! json_encode($soporte) !!};
            console.log(soporte.id );
        $( document ).ready(function() {
            var tamanio_det = Object.keys(detalle).length;
            var tamanio_act = Object.keys(activo_ser).length;
            var tamanio_cat = Object.keys(categoria).length;
            for (let index = 0; index < tamanio_det; index++) {
                obj = {
                    id : contador++,
                    servicio: detalle[index].cat_id,
                    tipo_servicio: detalle[index].asset_id,
                    estado: detalle[index].estado,
                    id_det : detalle[index].id,
                };

                var serv = categoria.filter (function (servi) { 
                    return servi.id === obj.servicio;
                });

                var acti = activo_ser.filter (function (activ) { 
                    return activ.id === obj.tipo_servicio; 
                });

                //console.log(obj.id_det);
                activos_array.push(obj);                       
                var pos = activos_array.indexOf(obj);

                var tr = '<tr id= '+obj.id+'><td>'+serv[0].cat_nombre+'</td><td>'+acti[0].nombre_activo_ser+'</td><td>'+obj.estado+
                        '</td></tr>';
                $("#cuerpo").append(tr)                       
                
            }
            //console.log(activos_array);  
        });               

            $('#btn_detalle').click(function (event) {
                event.preventDefault();       
                    
                    var servicio = $('#servicio').val().trim();
                    var tipo_servicio = $('#tipo_servicio').val().trim();              
                    var estado = $('#estado').val().trim();
                
    
                if (servicio.length == 0 || tipo_servicio.length == 0|| estado.length == 0) {
                    $.notify({
                        icon: 'glyphicon glyphicon-warning-sign',
                        title: '<b>Error de ingreso de datos</b></br>',
                        message: ` - Servicio <br>
                                    - Trabajo Realizado <br>
                                    - Estado <br>
                                    ¡No pueden estar vacios!
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
                    estado: $('#estado').val().trim()
                    };
    
                    activos_array.push(obj);                       
    
                    var pos = activos_array.indexOf(obj);
                    var tr = '<tr id= '+obj.id+'><td>'+obj.servicio_t+'</td><td>'+obj.tipo_servicio_t+'</td><td>'+obj.estado+
                        '</td></tr>';
                    $("#cuerpo").append(tr)
                    $("#form_detalle")[0].reset();
                }    
                
                console.log(activos_array);
            });
            
            function slice_db(id){
                //index = activos_array.findIndex(x => x.id ==id);
                //activos_array.splice(id, 1);
                //eliminamos el la fila de la tabla
                $.ajax({
                    url: "{{ url('eliminar_det', "+ id +") }}" ,
                    type: "DELETE",
                    dataType: "JSON",
                    success: function(result){
                        alert ('el archivo SI fue eliminado');
                            console.log(activos_array);    
                    },
                    error: function(result){
                        alert("El archivo no fue eliminado ");
                            console.log(activos_array);
                    }
                });
                //document.getElementById(id).outerHTML="";
            }

            function slice(id){
                index = activos_array.findIndex(x => x.id ==id);
                activos_array.splice(id, 1);
                //eliminamos el la fila de la tabla
                document.getElementById(id).outerHTML="";
            }
    
            $('.delete_item').click(function(){
            });
            
           
            $('#actualizar').click(function (event) {
                event.preventDefault();
                var final ={
                id: soporte.id,    
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
                    url: "{{ url('/actualizacion') }}",
                    method: "POST",
                    dataType: "json",
                    data: JSON.stringify(final),
                    contentType: "aplication/json; charset=utf-8",
                    success: function(data){
                        if(true)
                        window.location.href = "{{ url('/lista') }}";
                        $.notify({message: 'El registro se actualizo satisfactoriamente'},
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
