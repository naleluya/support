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
                                        <select class="form-control" name="tipo_activo">
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
                                                name="fecha" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="solicitante">Codigo GAMEA</label>
                                        <input type="number" class="form-control pull-right" id="datepicker"
                                            name="cod_gamea">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="solicitante">Serial GAMEA</label>
                                        <input type="text" class="form-control pull-right" id="datepicker"
                                            name="serial_gamea">
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
                                                        <th>Nombre Tecnico</th>
                                                        <th>Solicitante</th>
                                                        <th>Servicio</th>
                                                        <th>Activo</th>
                                                        <th>Accion</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Trident</td>
                                                        <td>Internet
                                                            Explorer 4.0
                                                        </td>
                                                        <td>Win 95+</td>
                                                        <td> 4</td>
                                                        <td>X</td>
                                                    </tr>                                                
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>Rendering engine</th>
                                                        <th>Browser</th>
                                                        <th>Platform(s)</th>
                                                        <th>Engine version</th>
                                                        <th>CSS grade</th>
                                                    </tr>
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
                    <form role="form" action="">
                            <div class="box-body">
                                    
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Servicio</label>
                                    <select name="servicio" id="servicio" class="form-control">
                                        <option value="">Seleccione Servicio...</option>
                                        @foreach ($categorias as $cate)
                                            <option value="{{ $cate->id }}">{{ $cate->cat_nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Trabajo realizado</label>
                                        <select name="tipo_servicio" id="tipo_servicio" class="form-control">
                                            <option value="">Seleccione un tipo de servicio...</option>
                                            @foreach ($activo as $act)
                                                <option value="{{ $act->id }}">{{ $act->nombre_activo_ser }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Cod GAMEA (periférico)</label>
                                        <input type="text" class="form-control pull-right" id="datepicker"
                                            name="cod_gamea_p">
                                            {{ csrf_field() }}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Caracteristicas</label>
                                        <input type="text" class="form-control text-uppercase" name="caracteristicas">
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
   /* function cargarProvincias() {
        var array = ["SOFTWARE", "HARDWARE", "RED", "DOMINIO"];
        array.sort();
        addOptions("servicio", array);
    }

    //Función para agregar opciones a un <select>.
    function addOptions(domElement, array) {
        var selector = document.getElementsByName(domElement)[0];
        for (provincia in array) {
            var opcion = document.createElement("option");
            opcion.text = array[provincia];
            // Añadimos un value a los option para hacer mas facil escoger los pueblos
            
            opcion.value = array[provincia].toLowerCase()
            selector.add(opcion);
        }
    }

   function cargarPueblos() {
        // Objeto de provincias con pueblos
        var listaPueblos = {
            software: ["Instalación S.O.", "Instalación Utilitarios", "Instalación Office", "Instalación drivers",
                "Instalación programas",
                "Instalación impresora", "Instalación escaner", "Activación S.O.", "Actvación Office",
                "recuperación de archivos", "Reseteo de contraseña"
            ],
            hardware: ["Microprocesador", "Tarjeta madre", "Disco duro", "Memoria RAM", "Tarjeta de video",
                "Tarjeta de red", "Fuente de poder", "Lector DVD",
                "Monitor", "Estabilizador", "impresora", "Escaner", "Teclado", "Mouse", "Fotocopiadora",
                "Switch", "Router", "Servicio simple"
            ],
            red: ["Instalción de red", "Configuración de red", "Compartir Impresora en red", "Traslado de red"],
            dominio: ["Ingreso a dominio"],
        }

        var provincias = document.getElementById('servicio')
        var pueblos = document.getElementById('tipo_servicio')
        var provinciaSeleccionada = provincias.value

        // Se limpian los pueblos
        pueblos.innerHTML = '<option value="">Seleccione un Tipo de servicio...</option>'

        if (provinciaSeleccionada !== '') {
            // Se seleccionan los pueblos y se ordenan
            provinciaSeleccionada = listaPueblos[provinciaSeleccionada]
            provinciaSeleccionada.sort()

            // Insertamos los pueblos
            provinciaSeleccionada.forEach(function (pueblo) {
                let opcion = document.createElement('option')
                opcion.value = pueblo
                opcion.text = pueblo
                pueblos.add(opcion);
            });
        }

    }

    // Iniciar la carga de provincias solo para comprobar que funciona
    cargarProvincias();
*/</script>
@endsection
