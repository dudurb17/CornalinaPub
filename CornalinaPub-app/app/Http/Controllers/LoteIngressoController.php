<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoteIngresso;
use App\Models\Evento;

class LoteIngressoController extends Controller
{
    public function index()
    {
        $lotesIngresso = LoteIngresso::all();
        return view('lote.list', ['lotesIngresso' => $lotesIngresso]);
    }

    public function create()
    {
        $lotesIngresso = LoteIngresso::all();
        $eventos = Evento::all();
        return view('lote.form')->with(['eventos' => $eventos,'lotesIngresso' => $lotesIngresso]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'descricao' => 'required',
            'evento_id' => 'required',
            // Adicione outras validações, se necessário
        ]);

        $dados = [
            'descricao' => $request->descricao,
            'evento_id' => $request->evento_id,
            // Adicione outros campos, se necessário
        ];

        LoteIngresso::create($dados);

        return redirect()->route('lote.index')->with('success', 'Lote de Ingresso criado com sucesso!');
    }

    public function edit($id)
    {
        $loteIngresso = LoteIngresso::find($id);
        $eventos = Evento::all();
        return view('lote.form')->with(['loteIngresso' => $loteIngresso, 'eventos' => $eventos]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'descricao' => 'required',
            'evento_id' => 'required',
            // Adicione outras validações, se necessário
        ]);

        $dados = [
            'descricao' => $request->descricao,
            'evento_id' => $request->evento_id,
            // Adicione outros campos, se necessário
        ];

        LoteIngresso::find($id)->update($dados);

        return redirect()->route('lote.index')->with('success', 'Lote de Ingresso atualizado com sucesso!');
    }

    public function destroy($id)
    {
        LoteIngresso::findOrFail($id)->delete();

        return redirect()->route('lote.index')->with('success', 'Lote de Ingresso excluído com sucesso!');
    }
    public function search(Request $request)
    {
        if(!empty($request->valor)){
            $lote = LoteIngresso::where(
                $request->tipo,
                 'like' ,
                "%". $request->valor."%"
                )->get();
        } else {
            $lote = LoteIngresso::all();
        }

        return view('lote.list', ['lotesIngresso' =>  $lote]);
    }
}