@extends('adminlte::page')

@section('title', 'Cadastro de Carros')

@section('content_header')

@if ($acao==1)
<h2>Inclusão de Carros
@else ($acao ==2)
<h2>Alteração de Carros
@endif          

  <a href="{{ route('carros.index') }}" class="btn btn-primary pull-right" role="button">Voltar</a>
</h2>

@endsection

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if ($acao==1)
<form method="POST" action="{{ route('carros.store') }}"
 enctype="multipart/form-data">
@else ($acao==2)
<form method="POST" action="{{route('carros.update', $reg->id)}}"
 enctype="multipart/form-data">
{!! method_field('put') !!}
@endif          
{{ csrf_field() }}

<div class="row">
    <div class="col-sm-6">
      <div class="form-group">
        <label for="modelo">Modelo do Veículo</label>
        <input type="text" id="modelo" name="modelo" required 
               value="{{$reg->modelo or old('modelo')}}"
               class="form-control">
      </div>
    </div>

    <div class="col-sm-6">
      <div class="form-group">
        <label for="marca_id">Marca do Veículo</label>
        <select id="marca_id" name="marca_id" class="form-control">
          @foreach($marcas as $m)
            <option value="{{$m->id}}" 
                    {{ ((isset($reg) and $reg->marca_id == $m->id) or 
                       old('marca_id') == $m->id) ? "selected" : "" }}>
                    {{$m->nome}}</option>
          @endforeach
        </select>  
      </div>
    </div>
  </div>              

  <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <label for="cor">Cor</label>
          <input type="text" id="cor" name="cor" required 
                 value="{{$reg->cor or old('cor')}}"
                 class="form-control">
        </div>
      </div>
    
      <div class="col-sm-6">
        <div class="form-group">
            <label for="preco">Preço R$</label>
            <input type="text" id="preco" name="preco" required 
                   value="{{$reg->preco or old('preco')}}"
                   class="form-control">
        </div>
      </div>
  </div>

  <div class="row">
      <div class="col-sm-4">
        <div class="form-group">
          <label for="ano">Ano</label>
          <input type="text" id="ano" name="ano" required 
                 value="{{$reg->ano or old('ano')}}"
                 class="form-control">
        </div>
      </div>

      <div class="col-sm-4">
        <div class="form-group">
          <label for="foto">Foto</label>
          <input type="file" id="foto" name="foto"  
                 class="form-control">
        </div>
      </div>
    
      <div class="col-sm-4">
        <div class="form-group">
            <label for="combustivel">Combustível</label>
            <select id="combustivel" name="combustivel" class="form-control">
                @foreach($comb as $c)
                  <option value="{{$c}}"{{ isset($reg) && $reg->combustivel == $c || old('combustivel') == $c ? "selected":""}}>{{$c}}</option>
                @endforeach
            </select>  
          </div>
      </div>
  </div>

  <input type="submit" value="Enviar" class="btn btn-success">
  <input type="reset" value="Limpar" class="btn btn-warning">
</form>

@endsection

@section('js')
<script src="https://code.jquery.com/jquery-latest.min.js"></script>
<script src="/js/jquery.mask.min.js"></script>
<script>
  $(document).ready(function() {
    $('#preco').mask('#.###.##0,00', {reverse: true});
  });
</script>
@endsection