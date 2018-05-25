@extends('adminlte::page')

@section('title', 'Cadastro de Carros')

@section('content_header')
    <h1>Cadastro de Carros
    <a href="{{ route('carros.create') }}" 
       class="btn btn-primary pull-right" role="button">Novo</a>
    </h1>
@endsection

@section('content')

@if (session('status'))
    <div class="alert alert-success">
      {{ session('status') }}
    </div>  
@endif

<table class="table table-striped">
  <tr>
    <th> Modelo </th>
    <th> Marca </th>
    <th> Cor </th>
    <th> Ano </th>
    <th> Preço R$ </th>
    <th> Combustível </th>
    <th> Data Cad. </th>
    <th> * </th>
    <th>Foto </th>
    <th> Ações </th>
  </tr>  
@forelse($carros as $c)
  <tr>
    <td> {{$c->modelo}} </td>
    <td> {{$c->marca->nome}} </td>
    <td> {{$c->cor}} </td>
    <td> {{$c->ano}} </td>
    <td> {{number_format($c->preco, 2, ',', '.')}} </td>
    <td> {{$c->combustivel}} </td>
    <td> {{date_format($c->created_at, 'd/m/Y')}} </td>
    <td> {{ $c->destaque }} </td>
    <td>
    @if(Storage::exists($c->foto))
    <img src="{{url('storage/'.$c->foto)}}"
         style="width: 80px; height: 50px;" 
         alt="Foto de Carro"/>
    
    @else

    <img src="{{url('storage/fotos/sem_foto.png')}}"
         style="width: 80px; height: 50px;" 
         alt="Foto de Carro"/>

    @endif
  </td>

    <td> 
    
        <a href="{{route('carros.edit', $c->id)}}" 
            class="btn btn-warning btn-sm" title="Alterar"
            role="button"><i class="fa fa-edit"></i></a> &nbsp;&nbsp;
        <form style="display: inline-block"
              method="post"
              action="{{route('carros.destroy', $c->id)}}"
              onsubmit="return confirm('Confirma Exclusão?')">
               {{method_field('delete')}}
               {{csrf_field()}}
              <button type="submit" title="Excluir"
                      class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>
        </form>  &nbsp;&nbsp;
        <a href="{{route('carros.destaque', $c->id)}}" 
            class="btn btn-success btn-sm" title="Destacar"
            role="button"><i class="fa fa-star"></i></a>
    </td>
  </tr>
  @if ($loop->last)
    <tr>
      <td colspan=8> Soma dos preços dos veículos cadastrados R$: 
        {{number_format($soma, 2, ',', '.')}} </td>
    </tr>  
    <tr>
      <td colspan=8> Preço Médio dos veículos cadastrados R$: 
        {{number_format($c->avg('preco'), 2, ',', '.')}} </td>
    </tr>  
  @endif

@empty
  <tr><td colspan=8> Não há carros cadastrados ou filtro da pesquisa não 
                     encontrou registros </td></tr>
@endforelse
</table>
{{ $carros->links() }}
@endsection

@section('js')
  <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
@endsection