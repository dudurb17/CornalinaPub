@extends('base.app')
@section('titulo', 'Ingressos')
@section('content')

<div class="container mt-3">
    <div class="d-flex justify-content-between align-items-center">
        <h2>Listagem de Ingressos</h2>
        <form action="{{ route('ingresso.search') }}" method="post" class="d-flex">
            @csrf
            <div class="input-group">
                <select name="tipo" class="form-select">
                    <option value="codigo">Código</option>
                    <option value="valor">Valor</option>
                    <!-- Adicione outros campos de pesquisa, se necessário -->
                </select>
            </div>
            <div class="input-group">
                <input type="text" name="valor" class="form-control" placeholder="Pesquisar">
            </div>
            <div class="input-group">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
        </form>

        <!-- Botão para abrir o modal de cadastro -->
        <button type="button" class="btn btn-success">
            <a href="{{ route('ingresso.create') }}" class="text-white text-decoration-none">Cadastrar novo Ingresso</a>
        </button>
    </div>
    <br>

    <!-- Tabela de Ingressos -->
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Lote de Ingresso</th>
                <th>Código</th>
                <th>Valor</th>
                <!-- Adicione outros cabeçalhos, se necessário -->
                <th>Ações</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ingressos as $ingresso)
            <tr>
                <td class="py-2 px-4 border">{{ $ingresso->id }}</td>
                <td class="py-2 px-4 border">{{ $ingresso->loteIngresso->descricao }}</td>
                <td class="py-2 px-4 border">{{ $ingresso->codigo }}</td>
                <td class="py-2 px-4 border">{{ $ingresso->valor }}</td>
                <!-- Adicione outros campos, se necessário -->
                <td class="py-2 px-4 border">
                    <a type="button" class="btn btn-primary"
                        href="{{ route('ingresso.edit', $ingresso->id) }}">Editar</a>
                </td>
                <td class="py-2 px-4 border">
                    <a type="button" class="btn btn-danger"
                        href="{{ route('ingresso.destroy', $ingresso->id) }}"
                        onclick="return confirm('Deseja Excluir?')">Excluir</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
