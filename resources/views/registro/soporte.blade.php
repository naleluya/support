@extends('layouts.template')

@section('css')
<!-- daterange picker -->
<link rel="stylesheet" href="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
<!-- bootstrap datepicker -->
<link rel="stylesheet"
    href="{{ asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
@endsection
@section('content')

<section class="content">
    <div class="container-fluid">
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
                            <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="tecnico">Tecnico</label>
                                        <select class="form-control" name="tecnico" id="tecnico">
                                            <option>option 1</option>
                                            <option>option 2</option>
                                            <option>option 3</option>
                                            <option>option 4</option>
                                            <option>option 5</option>
                                        </select>
                                    </div>
                                </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Secretaría</label>
                                <select class="form-control">
                                    <option>option 1</option>
                                    <option>option 2</option>
                                    <option>option 3</option>
                                    <option>option 4</option>
                                    <option>option 5</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Dirección</label>
                                <select class="form-control">
                                    <option>option 1</option>
                                    <option>option 2</option>
                                    <option>option 3</option>
                                    <option>option 4</option>
                                    <option>option 5</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Unidad</label>
                                <select class="form-control">
                                    <option>option 1</option>
                                    <option>option 2</option>
                                    <option>option 3</option>
                                    <option>option 4</option>
                                    <option>option 5</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group">
                                <label for="solicitante">Solicitante</label>
                                <input type="text" name="solicitante" id="solicitante" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="solicitante">Tipo activo</label>
                                <select class="form-control">
                                    <option>CPU</option>
                                    <option>LAPTOP</option>
                                </select>
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
                                    <input type="text" class="form-control pull-right" id="datepicker">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="solicitante">Codigo GAMEA</label>
                                <input type="number" class="form-control pull-right" id="datepicker">
                            </div>
                        </div>
                        <div class="col-md-4">
                                <div class="form-group">
                                    <label for="solicitante">Serial GAMEA</label>
                                    <input type="text" class="form-control pull-right" id="datepicker">
                                </div>
                            </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">
                            <label>Servicio</label>
                            <select name="provincia" id="provincia" onchange="cargarPueblos();" class="form-control">
                                    <option value="">Seleccione un Servicio...</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Trabajo realizado</label>
                                <select name="pueblo" id="pueblo" class="form-control">
                                        <option value="">Seleccione un tipo de servicio...</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Activo</label>
                                <select class="form-control">
                                    <option>option 1</option>
                                    <option>option 2</option>
                                    <option>option 3</option>
                                    <option>option 4</option>
                                    <option>option 5</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Caracteristicas</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Estado</label>
                                <select class="form-control">
                                    <option>option 1</option>
                                    <option>option 2</option>
                                    <option>option 3</option>
                                    <option>option 4</option>
                                    <option>option 5</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <!-- /.box -->

    </div>
    <!-- /.row -->
</section>

@endsection
@section('js')
<!-- bootstrap datepicker -->
<script src="{{ asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script type="text/javascript">
    $('#datepicker').datepicker({
        format: 'dd/mm/yyyy',
        autoclose: true
    })
</script>
<script>
    function cargarProvincias() {
    var array = ["Cantabria", "Asturias", "Galicia", "Andalucia", "Extremadura"];
    array.sort();
    addOptions("provincia", array);
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
      cantabria: ["Laredo", "Gama", "Solares", "Castillo", "Santander"],
      asturias: ["Langreo", "Villaviciosa", "Oviedo", "Gijon", "Covadonga"],
      galicia: ["Tui", "Cambados", "Redondella", "Porriño", "Ogrove"],
      andalucia: ["Dos Hermanas", "Écija", "Algeciras", "Marbella", "Sevilla"],
      extremadura: ["Caceres", "Badajoz", "Plasencia", "Zafra", "Merida"]
    }
    
    var provincias = document.getElementById('provincia')
    var pueblos = document.getElementById('pueblo')
    var provinciaSeleccionada = provincias.value
    
    // Se limpian los pueblos
    pueblos.innerHTML = '<option value="">Seleccione un Pueblo...</option>'
    
    if(provinciaSeleccionada !== ''){
      // Se seleccionan los pueblos y se ordenan
      provinciaSeleccionada = listaPueblos[provinciaSeleccionada]
      provinciaSeleccionada.sort()
    
      // Insertamos los pueblos
      provinciaSeleccionada.forEach(function(pueblo){
        let opcion = document.createElement('option')
        opcion.value = pueblo
        opcion.text = pueblo
        pueblos.add(opcion)
      });
    }
    
  }
  
 // Iniciar la carga de provincias solo para comprobar que funciona
cargarProvincias();
</script>
@endsection