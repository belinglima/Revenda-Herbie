@extends('adminlte::page')

@section('title', 'Resposta')

@section('content')

    <div class='col-sm-11'>
        <h2> Digite a mensagem </h2>
    </div>

    <div class='col-sm-1'>
        <a href="{{route('proposta.index')}}" class="btn btn-primary"
           role="button">Voltar</a>
    </div>

    <div class='col-sm-12'>
                    <form method="post" action="">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <textarea name="" id="" cols="100" rows="15"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                        <button type="reset" class="btn btn-warning">Limpar</button>
                    </form>
    </div>

@endsection