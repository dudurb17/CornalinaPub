<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ingresso;
use App\Models\LoteIngresso;

class IngressoController extends Controller
{
    public function index()
    {
        $ingressos = Ingresso::all();
        return view('ingresso.list', ['ingressos' => $ingressos]);
    }

    public function create(){
        $ingressos = Ingresso::all();
        $lotesIngresso=LoteIngresso::all();
        return view('ingresso.form')->with(['ingresso' =>  $ingressos, 'lotesIngresso'=>$lotesIngresso]);
    }

    public function store(Request $request)
    {
        // Lógica para validar e armazenar o ingresso no banco de dados
        $request->validate([
            'lote_id' => 'required',
            'codigo' => 'required',
            'valor' => 'required',
        ]);

        Ingresso::create([
            'lote_id' => $request->lote_id,
            'codigo' => $request->codigo,
            'valor' => $request->valor,
        ]);

        return redirect()->route('ingresso.index')->with('success', 'Ingresso criado com sucesso!');
    }

    public function edit($id)
    {
        // Lógica para obter dados do ingresso que será editado
        $ingresso = Ingresso::find($id);
        $lote=LoteIngresso::all();
        return view('ingresso.form', ['ingresso' => $ingresso, 'lotesIngresso'=>$lote ]);
    }

    public function update(Request $request, $id)
    {
        // Lógica para validar e atualizar o ingresso no banco de dados
        $request->validate([
            'lote_id' => 'required',
            'codigo' => 'required',
            'valor' => 'required',
        ]);

        $ingresso = Ingresso::find($id);

        $ingresso->update([
            'lote_id' => $request->lote_id,
            'codigo' => $request->codigo,
            'valor' => $request->valor,
        ]);

        return redirect()->route('ingresso.index')->with('success', 'Ingresso atualizado com sucesso!');
    }

    public function destroy($id)
    {
        // Lógica para excluir o ingresso do banco de dados
        $ingresso = Ingresso::find($id);
        $ingresso->delete();

        return redirect()->route('ingresso.index')->with('success', 'Ingresso excluído com sucesso!');
    }

    // Outras funções, se necessário
}