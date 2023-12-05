@extends('base.app')
@section('titulo', 'Empresas')
@section('content')

<div class="container mt-3">
    <h2>Listagem de Eventos</h2>

    <!-- Botão para abrir o modal de cadastro -->
    <button type="button" class="btn btn-primary">
<a href="{{ route('evento.create') }}">Cadastrar</a>
    </button>

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
            </tr>
        </thead>
        <tbody>
            @foreach ($evento as $item)
            @php
            $nome_imagem = !empty($item->baner) ? $item->baner : 'img/events/sem_imagem.png';

            @endphp
                <tr>
                    <td>{{ $item->id }}</td>
                    <td class="py-2 "><img src="/storage/{{$nome_imagem}}" width="100px"
                        alt="logo"></td>
                    <td>{{ $item->nome }}</td>
                    <td>{{ $item->cnpj }}</td>
                    <td>{{ $item->endereco }}</td>
                    <td class="py-2 px-4 border"><a
                        href="{{ route('evento.edit', $item->id) }}">Editar</a></td>

                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
