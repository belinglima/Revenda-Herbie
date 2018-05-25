@extends('adminlte::page')

@section('title', 'Grafico de Carros')

@section('content_header')
    <h1>Grafico do Cadastro de Carros
    <a href="{{ route('carros.index') }}" 
       class="btn btn-primary pull-right" role="button">
       Listagem</a>
    </h1>
@endsection

@section('content')

 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Marcas', 'Nº Veiculos'],

@foreach ($dados as $linha)
{!! "['$linha->marca', $linha->num], " !!}
@endforeach

        ]);

        var options = {
          title: 'Nº de Veiculos por marca',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>

    <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
@endsection