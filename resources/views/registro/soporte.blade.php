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
        <div class="row">
            <div class="col-md-6">

                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><strong> Servicio Técnico </strong></h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="post">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="secretaria">Secretaría</label>
                                        <select id="secretaria" name="secretaria" class="form-control" required>
                                            <option value="" disable selected></option>
                                            @foreach ($secretarias as $sec)
                                            <option value="{{ $sec->id }}">{{ $sec->sec_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="direccion">Dirección</label>
                                        <select id="direccion" name="direccion" class="form-control" disabled>
                                            <option value="" disable selected></option>
                                            @foreach ($direcciones as $dir)
                                            <option value="{{ $dir->id }}">{{ $dir->dir_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="unidad">Unidad</label>
                                        <select id="unidad" name="unidad" class="form-control" disabled>
                                            <option value="" disable selected></option>
                                            @foreach ($unidades as $uni)
                                            <option value="{{ $uni->id }}">{{ $uni->uni_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">

                                    <div class="form-group">
                                        <label for="tecnico">Tecnico</label>
                                        <select class="form-control" name="tecnico" id="tecnico" required>
                                            <option value="">Seleccione un tecnico...</option>
                                            @foreach ($tecnicos as $tec)
                                            <option value="{{ $tec->id }}">{{ $tec->tec_nombres }} {{ $tec->tec_paterno }} {{ $tec->tec_materno }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="solicitante">Tipo activo</label>
                                        <select class="form-control" name="tipo_activo" id="tipo_activo">
                                            <option>CPU</option>
                                            <option>LAPTOP</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="solicitante">Solicitante</label>
                                        <input type="text" name="solicitante" id="solicitante" class="form-control text-uppercase"
                                            placeholder="Nombre del solicitante" required>
                                            {{ csrf_field() }}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="solicitante">Celular</label>
                                        <input type="number" id="celular" name="celular" class="form-control"
                                            placeholder="Número de celular">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Date:</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right" id="datepicker"
                                                name="datepicker" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="solicitante">Codigo GAMEA</label>
                                        <input type="number" class="form-control pull-right" id="cod_gamea"
                                            name="cod_gamea">
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="box box-primary">
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
                                                        <th>Serial<br>Codigo GAMEA</th>
                                                        <th>Caractersiticas</th>
                                                        <th>Estado</th>
                                                        <th>Accion</th>
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
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title"><strong> Detalle del soporte técnico </strong></h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->          
                    <form role="form" action="" id="form_detalle">
                            <div class="box-body">
                                    
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Servicio</label>
                                    <select name="servicio" id="servicio" class="form-control" required>
                                        <option value="">Seleccione Servicio...</option>
                                        @foreach ($categorias as $cate)
                                            <option value="{{ $cate->id }}">{{ $cate->cat_nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Trabajo realizado</label>
                                        <select name="tipo_servicio" id="tipo_servicio" class="form-control" required>
                                            <option value="">Seleccione un tipo de servicio...</option>
                                            @foreach ($activo as $act)
                                                <option value="{{ $act->id }}">{{ $act->nombre_activo_ser }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="solicitante">Serial GAMEA</label>
                                            <input type="text" class="form-control pull-right" id="serial_gamea"
                                                name="serial_gamea">
                                        </div>
                                    </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Cod GAMEA (periférico)</label>
                                        <input type="text" class="form-control pull-right" id="cod_gamea_p"
                                            name="cod_gamea_p">
                                            <meta name="csrf-token" content="{{ csrf_token() }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Caracteristicas</label>
                                        <input type="text" class="form-control text-uppercase" name="caracteristicas" id="caracteristicas">
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
                            <div class="row">
                                <div class="col-md-3">
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                                <a href="#" class="btn btn-success" id="btn_detalle">Registrar detalle</a>
                            <input type="submit" name="insertar" id="insertar" value="Guardar registro"
                                class="btn btn-primary">
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
    var a = [];
    var c =0;
        $('#btn_detalle').click(function (event) {
            event.preventDefault();
            obj = {
                id : c++,
                servicio: $('#servicio').val(),
                tipo_servicio: $('#tipo_servicio').val(),
                serial_gamea: $('#serial_gamea').val(),
                cod_gamea_p: $('#cod_gamea_p').val(),
                caracteristicas: $('#caracteristicas').val(),
                estado: $('#estado').val()
            };
            
            a.push(obj);

            var pos = a.indexOf(obj);
            var tr = '<tr id= '+obj.id+'><td>'+obj.servicio+'</td><td>'+obj.tipo_servicio+'</td><td><b>Cod:</b> '+obj.cod_gamea_p+'<br><b>S/N:</b> '+obj.serial_gamea+
                    '</td><td>'+obj.caracteristicas+'</td><td>'+obj.estado+
                    '</td><td><button type="button" onclick="slice('+obj.id+')" class="btn btn-danger">Eliminar</button></td></tr>';
            $("#cuerpo").append(tr)
            
            console.log(a);                        
        });
        
        function slice(id){
            //console.log(id);
            index = a.findIndex(x => x.id ==id);
            a.splice(id, 1);
            //eliminamos el la fila de la tabla
            document.getElementById(id).outerHTML="";
            console.log(index);
            console.log(a);
            console.log(obj);

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
            
            final.activos = a;
            console.log(final);
            $.ajax({
                url: "{{ url('/save_detalle') }}",
                method: "POST",
                dataType: "json",
                data: JSON.stringify(final),
                contentType: "aplication/json; charset=utf-8",                             
                success: function(data){
                    console.log(data);
                    if(true)
                    alert ("los datos fueron guardados");                    
                },
                error: function(){
                    if(false)
                    alert ("no se guardaron los datos");
                }
                
            });
        });   
</script>
@endsection
