@extends('adminlte::page')

@section('title', 'Listagem de Clientes')

@section('content_header')
    <h1>Listagem de Clientes</h1>
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
  </tr>  
@forelse($user as $u)
  <tr>
    <td> {{$u->id}} </td>
    <td> {{$u->name}} </td>
    <td> {{$u->email}} </td>
    <td> {{date_format($u->created_at, 'd/m/Y')}} </td>
  </tr>
@empty
  <tr><td colspan=8> Não existem clientes Cadastrados No sistema </td></tr>
@endforelse
</table>
@endsection

@section('js')
  <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
@endsection