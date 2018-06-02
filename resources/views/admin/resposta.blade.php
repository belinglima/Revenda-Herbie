@extends('adminlte::page')

@section('title', 'Resposta')

@section('content_header')
    <h1>Dados da proposta <b> {{ $proposta->id }}</b></h1>
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-4">
      <h3>Dados do Carro</h3>
      <b>Modelo: </b> {{ $carro->modelo }}<br>
      <b>Marca: </b> {{ $carro->marca->nome }}<br>
      <b>Ano: </b> {{ $carro->ano }} <br>
      <b>Valor: </b> {{ $carro->preco }} <br>
      @if (Storage::exists($carro->foto))
        <img src="{{url('storage/'.$carro->foto)}}" 
             style="width: 100%" 
             alt="foto do carro">
      @else
        <img src="{{url('storage/fotos/sem_foto.jpg')}}"
             style="width: 100%" 
             alt="foto do carro">      
      @endif
      <br>
      <h3>Proposta:</h3>
      <div class="alert alert-warning">
        <b>Valor (proposta):</b> R$ {{number_format($proposta->proposta, '2', ',', '.')}}
      </div>
    </div>
    <div class="col-sm-6">
      <h3>Responder</h3>
      <form action="{{route('resposta')}}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ $proposta->id }}" s>
        <div class="form-group">
          <label for="nome">Nome do cliente:</label>
          <input id="nome" name="nome" type="text" class="form-control" value="{{ $proposta->nome_cliente }}" readonly>
        </div>
        <div class="form-group">
          <label for="email">Email do cliente:</label>
          <input id="email" name="email" type="text" class="form-control" value="{{ $proposta->email }}" readonly>
        </div>
        <div class="form-group">
          <label for="email">Telefone do cliente:</label>
          <input id="email" name="email" type="text" class="form-control" value="{{ $proposta->telefone }}" readonly>
        </div>
        <div class="form-group">
          <label for="mensagem">Rsposta:</label>
          <textarea rows="4" cols="50" id="mensagem" name="mensagem" class="form-control"></textarea>
        </div>
        <input type="submit" class="btn btn-success" value="enviar">
      </form>
    </div>
  </div>
</div>

@endsection