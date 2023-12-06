<!-- resources/views/loteIngresso/list.blade.php -->
@extends('base.app')
@section('titulo', 'Lotes de Lotes de Ingresso')
@section('content')

<div class="container mt-3">
    <div class="d-flex justify-content-between align-items-center">
        <h2>Listagem de lotes de ingresso</h2>
        <form action="{{ route('lote.search') }}" method="post" class="d-flex">
            @csrf
            <div class="input-group">
                <select name="tipo" class="form-select btn">
                    <option value="descricao">Descrição</option>
                    <!-- Adicione outros campos de busca, se necessário -->
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
            <a href="{{ route('lote.create') }}" class="text-white text-decoration-none">Novo lote de ingressos </a>
        </button>
    </div>
    <br>

    <!-- Tabela de Lotes de Ingresso -->
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID:</th>
                <th>Descrição:</th>
                <th>Evento:</th>
                <th>Ações:</th>
                <th>Ações:</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($lotesIngresso as $loteIngresso)
                <tr>
                    <td class="py-2 px-4 border">{{ $loteIngresso->id }}</td>
                    <td class="py-2 px-4 border">{{ $loteIngresso->descricao }}</td>
                    <td class="py-2 px-4 border">{{ $loteIngresso->evento->nome }}</td>
                    <td class="py-2 px-4 border">
                        <a type="button" class="btn btn-primary" href="{{ route('lote.edit', $loteIngresso->id) }}"><i class="bi bi-pencil-square"></i></a>
                        </td>
                        <td class="py-2 px-4 border">
                        <a type="button" class="btn btn-danger" href="{{ route('lote.destroy', $loteIngresso->id) }}" onclick="return confirm('Deseja Excluir?')"><i class="bi bi-trash3-fill"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
