<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;

class EmpresaController extends Controller
{
    public function index()
    {
        $empresas = Empresa::all();
        return view('empresa.list', ['empresas' => $empresas]);
    }

    public function show($id)
    {
        $empresas = Empresa::findOrFail($id);
        return view('empresas.show', ['empresa' => $empresas]);
    }

    public function create()
    {
        return view('empresas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'cnpj' => 'required|unique:empresas',
            'endereco' => 'required',
        ]);
        $dados=['nome'=>$request->nome,
        'cnpj'=>$request->cnpj,
        'endereco'=>$request->endereco];


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

        Empresa::create($dados);

        return redirect()->route('empresas.index')
            ->with('success', 'Empresa criada com sucesso!');
    }

    public function edit($id)
    {
        $empresa = Empresa::findOrFail($id);
        return view('empresas.edit', ['empresa' => $empresa]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required',
            'cnpj' => 'required|unique:empresas,cnpj,'.$id,
            'endereco' => 'required',
        ]);

        $empresa = Empresa::findOrFail($id);
        $empresa->update($request->all());

        return redirect()->route('empresas.index')
            ->with('success', 'Empresa atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $empresa = Empresa::findOrFail($id);
        $empresa->delete();

        return redirect()->route('empresas.index')
            ->with('success', 'Empresa excluída com sucesso!');
    }

    public function search(Request $request)
    {
        // Lógica de pesquisa aqui
    }
}