<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
class EventoController extends Controller
{
    public function index()

   {
        $eventos = Evento::all();
        return view('evento.list', ['evento' =>  $eventos]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'empresas_id' => 'required|unique:empresas',
            'endereco' => 'required',

        ]);
        $dados=['nome'=>$request->nome,
        'empresas_id'=>$request->empresas_id,
        'endereco'=>$request->endereco,
    'data'=>$request->data,
'numero_de_ingressos'=>$request->numero_de_ingressos];


        $imagem = $request->file('logo');
    //verifica se existe imagem no formulário
            if($imagem){
        $nome_arquivo =
             date('YmdHis').'.'.$imagem->getClientOriginalExtension();

    $diretorio = "img/events/";
    //salva imagem em uma pasta do sistema
    $imagem->storeAs($diretorio,$nome_arquivo,'public');

    $dados['logo'] = $diretorio.$nome_arquivo;
}

Evento::create($dados);

        return redirect()->route('empresas.index')
            ->with('success', 'Empresa criada com sucesso!');
    }

}