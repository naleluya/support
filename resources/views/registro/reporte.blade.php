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

<section class="content-header">
        <h1>
            Reportes de Soporte
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Reportes</a></li>
            <li><a href="#">Soporte</a></li>
        </ol>
</section>
<section class="content">
    <!-- DONUT CHART -->
    <div class="row">
        <div class="col-md-8">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Grafica de Soporte</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                    <div class="col-md-2"> <br>
                        <i class="fa fa-square" style="color: #f56954;"></i><b><span style="color: #f56954;"> DOMINIO</span></b><br><br>
                        <i class="fa fa-square" style="color: #00a65a;"></i><b><span style="color: #00a65a;"> HARDWARE</span></b><br><br>
                        <i class="fa fa-square" style="color: #f39c12;"></i><b><span style="color: #f39c12;"> RED</span></b><br><br>
                        <i class="fa fa-square" style="color: #00c0ef;"></i><b><span style="color: #00c0ef;"> SOFTWARE</span></b>                      
                    </div>
                    <div class="col-md-10">
                        <canvas id="pieChart" style="height:150px"></canvas>
                    </div>
                </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
    <!-- /.box -->
</section>
@endsection
@section('js')
<!-- bootstrap datepicker -->
<script src="{{ asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<!-- Notificaciones -->
<script src="{{ asset('js/bootstrap-notify.min.js') }}"></script>
<!-- charts js -->
<script src="{{ asset('bower_components/chart.js/Chart.js') }}"></script>
<script>

    var tecnico = {!! json_encode($tecnicos) !!};
    var secretaria = {!! json_encode($secretarias) !!};
    var direccion = {!! json_encode($direcciones) !!};
    var unidad = {!! json_encode($unidades) !!};
    var soporte = {!! json_encode($soportes) !!};
    var categoria = {!! json_encode($categorias) !!};
    var activo = {!! json_encode($activos) !!};
    var detalle = {!! json_encode($detalles) !!}; 
    var dominio = 0;
    var hardware = 0;
    var red = 0;
    var software =0;
    console.log(detalle);
    $( document ).ready(function() {
    
    for (let index = 0; index < detalle.length; index++) {
        if (detalle[index].cat_id == 1) {
            dominio++;
        } else if (detalle[index].cat_id == 2) {
            hardware++;
        }else if (detalle[index].cat_id == 3) {
            red++;
        }else if (detalle[index].cat_id == 4) {
            software++;
        }
    }
    console.log(dominio, hardware, red, software);

    });

    console.log(detalle);
        $(function () {
          //-------------
          //- PIE CHART -
          //-------------
          // Get context with jQuery - using jQuery's .get() method.
          var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
          var pieChart       = new Chart(pieChartCanvas)
          var PieData        = [
            {
              value    : dominio,
              color    : '#f56954',
              highlight: '#f56954',
              label    : 'DOMINIO',
              
            },
            {
              value    : hardware,
              color    : '#00a65a',
              highlight: '#00a65a',
              label    : 'HARDWARE',
            },
            {
              value    : red,
              color    : '#f39c12',
              highlight: '#f39c12',
              label    : 'RED',
            },
            {
              value    : software,
              color    : '#00c0ef',
              highlight: '#00c0ef',
              label    : 'SOFTWARE',
            }            
          ]
          var pieOptions     = {
            //Boolean - Whether we should show a stroke on each segment
            segmentShowStroke    : true,
            //String - The colour of each segment stroke
            segmentStrokeColor   : '#fff',
            //Number - The width of each segment stroke
            segmentStrokeWidth   : 2,
            //Number - The percentage of the chart that we cut out of the middle
            percentageInnerCutout: 50, // This is 0 for Pie charts
            //Number - Amount of animation steps
            animationSteps       : 100,
            //String - Animation easing effect
            animationEasing      : 'easeOutBounce',
            //Boolean - Whether we animate the rotation of the Doughnut
            animateRotate        : true,
            //Boolean - Whether we animate scaling the Doughnut from the centre
            animateScale         : false,
            //Boolean - whether to make the chart responsive to window resizing
            responsive           : true,
            // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
            maintainAspectRatio  : true,
            //String - A legend template
            legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
          }
          //Create pie or douhnut chart
          // You can switch between pie and douhnut using the method below.
          pieChart.Doughnut(PieData, pieOptions)
      
          
        })
      </script>
@endsection
