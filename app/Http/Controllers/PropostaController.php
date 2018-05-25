<?php

namespace App\Http\Controllers;

use App\Proposta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
Use App\Carro;
Use App\Marca;


class PropostaController extends Controller
{


    public function __construct(){

        $this->middleware('auth')->only('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $propostas = Proposta::orderBy('id', 'desc')->paginate(5);
        return view('admin.propostas_list', compact('propostas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $this->validate($request, [
            'nome_cliente' => 'required|min:2|max:200',
            'email' => 'required',
            'telefone' => 'min:9|max:40'
        ]);

        Proposta::create($request->all());

        return redirect()->route('site.index')->with('status', ' Proposta inserida com sucesso!');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Proposta  $proposta
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('site.proposta', ['carro' => Carro::find($id)]);
    }

    public function responder()
    {
        return view('admin.resposta');
    }


}
