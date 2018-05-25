@extends('site.modelo')

@section('conteudo')

<div class="container">
@if (session('status'))
    <div class="alert alert-success">
      {{ session('status') }}
    </div>  
@endif
<div class="row">

@forelse($carros as $c)
        <div class="col col-sm-4">
            <div class="card border-light bg-light">
                <div class="card-header text-center" style="font-weight: bold;">{{ $c->modelo }}</div>
                    <div class="card-body">
                        @if(Storage::exists($c->foto))
                            <img src="{{url('storage/'.$c->foto)}}"
                            style="width: 100%; height: 150px;" 
                            alt="Foto de Carro"/>
                        @else
                            <img src="{{url('storage/fotos/sem_foto.png')}}"
                            style="width: 100%; height: 150px;" 
                            alt="Foto de Carro"/>
                        @endif
                        <p class="text-center">Valor R$: {{number_format($c->preco, 2, ',', '.')}} </p>
                        <a href="{{route('proposta.show', $c->id)}}" type="button" class="btn btn-block btn-dark">Proposta</a>
                    </div>
                </div>
        </div>

@empty
        <h4>Não Existe carros sendo Exibidos</h4>

@endforelse
</div>
</div>
@endsection