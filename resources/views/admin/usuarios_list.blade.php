@extends('adminlte::page')

@section('title', 'Cadastro de Carros')

@section('content_header')
    <h1>Cadastro de Usuários
    <a href="{{ route('register') }}" 
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
    <th> Id </th>
    <th> Nome </th>
    <th> Email </th>
    <th> Data </th>
    <th>Ações </th>
  </tr>  
@forelse($user as $u)
  <tr>
    <td> {{$u->id}} </td>
    <td> {{$u->name}} </td>
    <td> {{$u->email}} </td>
    <td> {{date_format($u->created_at, 'd/m/Y')}} </td>
    <td> 
        <a href="" 
            class="btn btn-warning btn-sm" title="Alterar"
            role="button"><i class="fa fa-edit"></i></a> &nbsp;&nbsp;
        <form style="display: inline-block"
              method="post"
              action="{{route('usuarios.destroy', $u->id)}}"
              onsubmit="return confirm('Confirma Exclusão?')">
               {{method_field('delete')}}
               {{csrf_field()}}
              <button type="submit" title="Excluir"
                      class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>
        </form>  
    </td>
  </tr>
@empty
  <tr><td colspan=8> Não existem usuarios Cadastrados No sistema </td></tr>
@endforelse
</table>
@endsection

@section('js')
  <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
@endsection