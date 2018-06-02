@extends('adminlte::page')

@section('title', 'Grafico de Propostas')

@section('content_header')
    <h1>Grafico do Cadastro de Propostas
    <a href="{{ route('proposta.index') }}" 
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
          ['Propostas', 'Nº Propostas'],

      @foreach ($dados as $linha)
        {!! "['$linha->mes', $linha->num], " !!}
      @endforeach

        ]);

        var options = {
          title: 'Nº de Propostas por Mês',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>

    <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
@endsection