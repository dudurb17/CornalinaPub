<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
use App\Models\Empresa;
class EventoController extends Controller
{
    public function index()

   {
        $eventos = Evento::all();
        return view('evento.list', ['evento' =>  $eventos]);
    }

    public function create(){
        $eventos = Evento::all();
        $empresa=Empresa::all();
        return view('evento.form')->with(['evento' =>  $eventos, 'empresa'=>$empresa]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'endereco' => 'required',
            'numero_de_ingressos'=>"required",

        ]);
        $dados=['nome'=>$request->nome,
        'empresa_id'=>$request->empresa_id,
        'endereco'=>$request->endereco,
        'data'=>$request->data,
        'numero_de_ingressos'=>$request->numero_de_ingressos];
        $imagem = $request->file('baner');
        //verifica se existe imagem no formulário
        if($imagem){
        $nome_arquivo = date('YmdHis').'.'.$imagem->getClientOriginalExtension();

            $diretorio = "img/events/";
        //salva imagem em uma pasta do sistema
        $imagem->storeAs($diretorio,$nome_arquivo,'public');

        $dados['baner'] = $diretorio.$nome_arquivo;
    }

    Evento::create($dados);
    return redirect()->route('evento.index')->with('success', 'Empresa criada com sucesso!');
    }
    public function edit($id)
    {
        $evento = Evento::find($id); //select * from aluno where id = $id
        $empresa=Empresa::all();
        return view('evento.form')->with([
            'evento'=> $evento, 'empresa'=>$empresa ]);
    }


    public function update(Request $request, Evento $evento)
    {

        $request->validate([
            'nome'=>'required|min:3',
            'endereco'=>'required|min:2',
            'numero_de_ingressos'=>'required|min:1'
        ],[
            'nome.required'=>"O :attribute é obrigatorio!",
            'endereco.required'=>"O :attribute é obrigatorio!",
            'numero_de_ingressos.required'=>"O :attribute é obrigatorio!",
        ]);

        $dados=['nome'=>$request->nome,
        'empresa_id'=>$request->empresa_id,
        'endereco'=>$request->endereco,
        'data'=>$request->data,
        'numero_de_ingressos'=>$request->numero_de_ingressos];
        $imagem = $request->file('baner');
        //verifica se existe imagem no formulário
        if($imagem){
            $nome_arquivo =
            date('YmdHis').'.'.$imagem->getClientOriginalExtension();

            $diretorio ="img/events/";
            //salva imagem em uma pasta do sistema
            $imagem->storeAs($diretorio,$nome_arquivo,'public');

            $dados['baner'] = $diretorio.$nome_arquivo;
        }



        Evento::updateOrCreate(
            ['id'=>$request->id],
            $dados);


            return redirect()->route('evento.index')->with('success', 'Empresa criada com sucesso!');

    }
    public function destroy($id)
    {
        $evento = Evento::findOrFail($id);

        $evento->delete();

        return redirect()->route('evento.index')->with('success', 'Evento removido com sucesso!');

    }

    public function search(Request $request)
    {
        if(!empty($request->valor)){
            $eventos = Evento::where(
                $request->tipo,
                 'like' ,
                "%". $request->valor."%"
                )->get();
        } else {
            $eventos = Evento::all();
        }

        return view('evento.list', ['evento' =>  $eventos]);
    }



}