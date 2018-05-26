<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Carro;
use App\Marca;

class CarroComercialController extends Controller
{
    public function filtros(Request $request) {
        $modelo = $request->modelo;

        $filtro = array();

        if (!empty($modelo)) {
            array_push($filtro, array('modelo','like', '%'.$modelo.'%'));
        }

        $carros = Carro::where($filtro)->where('destaque','X')
            ->orderBy('modelo')
            ->paginate(5);

        return view('site.carros_pesquisa', compact('carros'));
    }
}
