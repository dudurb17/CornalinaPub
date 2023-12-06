@extends('base.app')
@section('titulo', 'Empresas')
@section('content')

<div class="container mt-3">
    <div class="d-flex justify-content-between align-items-center">
        <h2>Listagem de Empresas</h2>
        <form action="{{ route('empresas.search') }}" method="post" class="d-flex">
            @csrf
            <div class="input-group">
                <select name="tipo" class="form-select btn">
                    <option value="nome">Nome</option>
                    <option value="cnpj">CNPJ</option>
                </select>
            </div>
            <div class="input-group">
                <input type="text" name="valor" class="form-control" placeholder="Pesquisar">
            </div>
            <div class="input-group">
                <button type="submit" class="btn btn-primary" style="margin-left:5px">Buscar</button>
            </div>
        </form>
        <!-- Botão para abrir o modal de cadastro -->
        <button type="button" class="btn btn-success">
            <a href="{{ route('empresas.create') }}" class="text-white text-decoration-none">Cadastrar nova empresa</a>
        </button>
    </div><br>

    <!-- Tabela de Empresas -->
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Logo</th>
                <th>Nome</th>
                <th>CNPJ</th>
                <th>Endereço</th>
                <th>Ações</th>
                <th>Ações</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($empresas as $empresa)
            @php
            $nome_imagem = !empty($empresa->logo) ? $empresa->logo : 'img/events/sem_imagem.png';
            @endphp
            <tr>
                <td class="py-2 px-4 border">{{ $empresa->id }}</td>
                <td class="py-2 px-4 border"><img src="/storage/{{ $nome_imagem }}" width="100px" alt="logo"></td>
                <td class="py-2 px-4 border">{{ $empresa->nome }}</td>
                <td class="py-2 px-4 border">{{ $empresa->cnpj }}</td>
                <td class="py-2 px-4 border">{{ $empresa->endereco }}</td>
                <td class="py-2 px-4 border">
                    <a href="{{ route('empresas.edit', $empresa->id) }}" class="editar-empresa btn btn-primary">
                    <i class="bi bi-pencil-square"></i>
                    </a>
                </td>
                <td><a class="editar-empresa btn btn-primary"  href="{{ route('eventoEmpresa.list', $empresa->id) }}"><i class="bi bi-eye"></i></a></td>
                <td class="py-2 px-4 border">
                    <a type="button" class="btn btn-danger" href="{{ route('empresas.destroy', $empresa->id) }}" onclick="return confirm('Deseja Excluir?')"><i class="bi bi-trash3-fill"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
