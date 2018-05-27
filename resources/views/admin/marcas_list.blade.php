@extends('adminlte::page')

@section('title', 'Cadastro de Carros')

@section('content')
<div class='col-sm-12'>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    </div>

    <div class='col-sm-11'>
        <h2> Cadastro de Marcas </h2>
    </div>

            <div class="col-sm-1">
                <br>
            <a href="{{route('marcas.create')}}" class="btn btn-info"
               role="button">Nova</a>
            </div>
    <div class='col-sm-12'>



        <table class="table table-striped">
            <thead>
            <tr>
                <th>Código</th>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($marcas as $marca)
                <tr>
                    <td style="text-align: center">{{$marca->id}}</td>
                    <td>{{$marca->nome}}</td>
                    <td>
                        <a href="{{route('marcas.edit', $marca->id)}}"
                           class="btn btn-warning"
                           role="button">Alterar</a> &nbsp;&nbsp;
                        <form style="display: inline-block"
                              method="post"
                              action="{{route('marcas.destroy', $marca->id)}}"
                              onsubmit="return confirm('Confirma Exclusão?')">
                            {{method_field('delete')}}
                            {{csrf_field()}}
                            <button type="submit"
                                    class="btn btn-danger"> Excluir </button>
                        </form> &nbsp;&nbsp;

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
         <div class="col-sm-12"> {{ $marcas->links() }}</div>
    </div>

@endsection
