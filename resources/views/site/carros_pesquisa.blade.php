@extends ('layouts.comercial.master')

@section('content')

    <div class="w3-main" style="margin-left:340px;margin-right:40px">

        <!-- Header -->
        <div class="w3-container" style="margin-top:80px" id="showcase">
            <h1 class="w3-jumbo"><b>Encontre seu carro novo</b></h1>
            <h1 class="w3-xxxlarge w3-text-red"><b>Pesquisar</b></h1>
            <hr style="width:50px;border:5px solid red" class="w3-round">
        </div>

        <div class="w3-container" id="contact" style="margin-top:75px">


            <form method="post" action="{{route('carros.filtroscom')}}">
                {{ csrf_field() }}
                <div class="w3-section">
                    <label for="modelo">Modelo do Veículo</label>
                    <input class="w3-input w3-border" type="text" name="modelo" id="modelo">
                </div>
                <div class="w3-section">
                    <label for="precomax">Preço Máximo R$:</label>
                    <input class="w3-input w3-border" type="text" name="precomax" id="precomax">
                </div>
                <button type="submit" class="w3-button w3-block w3-padding-large w3-red w3-margin-bottom">Buscar</button>
            </form>
        </div>

        <!-- Photo grid -->
        <div class="row">
            @if (count($carros)==0)
                <div class="alert alert-danger">
                    Não há carros com os filtros informados...
                </div>
            @endif
        @foreach($carros as $carro)

                @php
                    if(file_exists(public_path('fotos/'.$carro->id.'.jpg'))){
                       $foto = '../fotos/'.$carro->id.'.jpg';
                    } else {
                       $foto = '../fotos/sem_foto.jpg';
                    }
                @endphp


                    <div class='col-sm-4' style="padding-bottom: 2vw;">
                        {!!"<img src='$foto' style='width:100%; height: 18vw;' >"!!}
                        <div class="w3-row">
                            <ul class="w3-ul w3-light-grey w3-center">
                                <li class="w3-red w3-xlarge w3-padding-32">{{$carro->modelo}}</li>
                                <li class="w3-padding-16">{{$carro->ano}}</li>
                                <li class="w3-padding-16">{{$carro->marca->nome}}</li>
                                <li class="w3-padding-16">{{$carro->combustivel}}</li>
                                <li class="w3-padding-16">
                                    <h2>{{number_format($carro->preco, '2', ',', '.')}}</h2>
                                </li>
                                <li class="w3-light-grey w3-padding-24">
                                    <a href="{{route('propostas.show', $carro->id)}}" class="w3-button w3-red w3-padding-large w3-hover-black">Proposta</a>
                                </li>
                            </ul>
                        </div>
                    </div>

            @endforeach


        </div>


    {{ $carros->links() }}

        <!-- End page content -->
    </div>

@endsection