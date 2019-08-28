@extends('layouts.template')
@section('css')
    <link rel="stylesheet" href="{{ asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/Ionicons/css/ionicons.min.css') }}">
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
                    <th>Solicitante</th>
                    <th>Tecnico Responsable</th>
                    <th>Dependencia</th>                    
                    <th>Servicio</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($registro as $reg)
                      <tr>
                        <td>{{ $reg->solicitante }} <br><b>Fecha solicitud:</b>  {{ $reg->fec_solicitud }}</td>
                        <td>{{ $reg->tec_nombres }} {{ $reg->tec_paterno }} {{ $reg->tec_materno }}</td>
                        <td>{{ $reg->sec_nombre }}<br>{{ $reg->dir_name }}<br>{{ $reg->uni_name }}</td>                        
                        <td>
                          @foreach ($detalle as $det)
                            @if ($det->sup_id == $reg->id_support)
                             @foreach ($categoria as $cat)
                                 @if ($det->cat_id == $cat->id)
                                     <a href="#">{{ $cat->cat_nombre }}</a><br>
                                 @endif
                             @endforeach
                            @endif
                          @endforeach</td>
                        <td>
                          <form method="post" action="{{route('eliminar',$reg->id_support)}}" style="float: left" onclick="return confirm('¿Esta seguro de eliminar el registro?')">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="submit" value="Eliminar" class="btn btn-danger btn-sm">
                            {{ csrf_field() }}                            
                          </form> 
                          
                          <form method="get" action="{{ route('editar', $reg->id_support) }}" style="float: left">
                            <input type="submit" value="Editar" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ventanaEditar">
                            {{ csrf_field() }}
                          </form>

                          <button class="btn btn-secondary btn-sm"><i class="fa fa-file-pdf-o"></i></button>
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