@extends('layouts.template')
@section('css')
    <link rel="stylesheet" href="{{ asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')
   <!-- Main content -->
   <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <!-- /.box -->  
            <div class="box">
              <div class="box-header">
                <h3 class="box-title"><strong>Lista de Soporte técnico</strong></h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="tabla_registros" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Tecnico</th>
                    <th>Dependencia</th>
                    <th>Solicitante</th>
                    <th>Servicio</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($registro as $reg)
                      <tr>
                        <td>{{ $reg->tec_nombres }} {{ $reg->tec_paterno }} {{ $reg->tec_materno }}</td>
                        <td>{{ $reg->sec_nombre }}</td>
                        <td>{{ $reg->solicitante }}</td>
                        <td>Servicio</td>
                        <td>
                          <a href="#" class="btn btn-danger" id="btn_eliminar">eliminar</a> 
                          <a href="#" class="btn btn-info" id="btn_editar">editar</a>
                        </td>
                      </tr>
                    @endforeach
                  
                  </tbody>
                  <tfoot>
                  <tr>
                      <th>Tecnico</th>
                      <th>Dependencia</th>
                      <th>Solicitante</th>
                      <th>Servicio</th>
                      <th>Acciones</th>
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
      </section>
      <!-- /.content --> 
@endsection


@section('js')
    <script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script>
      
            $(function () {
              $('#tabla_registros').DataTable({
                language: {
                  "sProcessing":     "Procesando...",
                  "sLengthMenu":     "Mostrar _MENU_ registros",
                  "sZeroRecords":    "No se encontraron resultados",
                  "sEmptyTable":     "Ningún dato disponible en esta tabla",
                  "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                  "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                  "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                  "sInfoPostFix":    "",
                  "sSearch":         "Buscar:",
                  "sUrl":            "",
                  "sInfoThousands":  ",",
                  "sLoadingRecords": "Cargando...",
                  "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                  },
                  "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                  }
                }
              });              
            });
      </script>
      
@endsection