@extends('adminlte::page')

@section('title', 'Lista de Propostas')

@section('content')

    <div class='col-sm-11'>
        <h2> Propostas </h2>
    </div>

    <div class='col-sm-12'>
    
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <table class="table table-striped">
            <tr>
                <th>Código</th>
                <th>Nome do Cliente</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Veículo</th>
                <th>Proposta</th>
                <th>Data</th>
                <th>Ação</th>

            </tr>
            @forelse($propostas as $proposta)
                <tr>
                    <td style="text-align: center">{{$proposta->id}}</td>
                    <td>{{$proposta->nome_cliente}}</td>
                    <td>{{$proposta->email}}</td>
                    <td>{{$proposta->telefone}}</td>
                    <td>{{$proposta->carro->modelo}}</td>
                    <td>R$: {{number_format($proposta->proposta, '2', ',', '.')}} &nbsp;&nbsp;&nbsp;</td>
                    <td> {{date_format($proposta->created_at, 'd/m/Y')}} </td>
                    <td>
                        <a href="{{ route('propostas.resposta') }}"
                           class="btn btn-info"
                           role="button">Responder</a> &nbsp;&nbsp;
                    </td>
                </tr>
            @empty

                <h4>Não existem proposta cadastradas ainda.</h4>

            @endforelse
        </table>
        {{ $propostas->links() }}
    </div>

@endsection