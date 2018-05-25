@extends('site.modelo')

@section('conteudo')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="container">
        <!-- Header -->
        <div class="container">
            <h1><b>Faça sua proposta</b></h1>
            <hr>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
            <p>* Campos Requeridos</p>
            <form method="post" class="form-group" action="{{route('proposta.store')}}">
            {{ csrf_field() }}

                <label for="nome" class="mr-sm-2">*Nome: </label>
                <input type="text" name="nome_cliente" class="form-control" id="nome" required>

                <label for="email" class="mr-sm-2">*E-mail: </label>
                <input type="email" name="email" class="form-control" id="email" required>

                <label for="telefone" class="mr-sm-2">*Telefone: </label>
                <input type="text" name="telefone" class="form-control" id="telefone" required>

                <label for="proposta" class="mr-sm-2">*Valor da proposta R$:</label>
                <input type="text" name="proposta" class="form-control" id="proposta" required>
            <br>
                <input type="hidden" name="carro_id" value="{{$carro->id}}">
                <button type="submit" class="btn btn-success">Enviar</button>
            </form>
            </div>

            <div class="col-sm-6">
            @if(Storage::exists($carro->foto))
                            <img src="{{url('storage/'.$carro->foto)}}"
                            style="width:100%; height: 18vw;" 
                            alt="Foto de Carro"/>
            @else
                            <img src="{{url('storage/fotos/sem_foto.png')}}"
                            style="width: 100%; height: 18vw;" 
                            alt"Foto de Carro"/>
            @endif
                <ul class="none">
                    <li><b>Modelo:</b> {{$carro->modelo}}</li>
                    <li><b>Ano:</b> {{$carro->ano}}</li>
                    <li><b>Marca:</b> {{$carro->marca->nome}}</li>
                    <li><b>Combustivel:</b> {{$carro->combustivel}}</li>
                    <li><h2>{{number_format($carro->preco, '2', ',', '.')}}</h2></li>
                </ul>
            </div>
        </div>
<footer class="page-footer font-small blue pt-4 mt-4">
  <div class="footer-copyright text-center py-3">© 2018 Copyright Revenda Avenida</div>
</footer>
    </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.js"></script>
        <script>
            $(document).ready(function () {
                $('#proposta').mask('000.000.000.000.000,00', {reverse: true});
            });
        </script>


@endsection