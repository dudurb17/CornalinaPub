@extends('base.app')
@section('titulo', 'Empresas')
@section('content')

<div class="container mt-3">
    <h2>Listagem de Eventos</h2>

    <!-- Botão para abrir o modal de cadastro -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cadastroModal">
        Nova Empresa
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

<!-- Modal de Cadastro de Nova Empresa -->
<div class="modal fade" id="cadastroModal" tabindex="-1" role="dialog" aria-labelledby="cadastroModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cadastroModalLabel">Cadastrar Nova Empresa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @php
                // dd($produto); // é igual ao var_dump()
                if (!empty($empresas->id)) {
                    $route = route('empresas.update', $empresas->id);
                } else {
                    $route = route('evento.store');
                }
            @endphp
                <!-- Adicione aqui o formulário de cadastro -->
                <form action="{{ $route }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nome">Nome:</label>
                        <input type="text" name="nome" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="cnpj">CNPJ:</label>
                        <input type="text" name="cnpj" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="endereco">Endereço:</label>
                        <input type="text" name="endereco" class="form-control" required>
                    </div>
                    @php
                    $nome_imagem = !empty($produto->logo) ? $produto->logo : 'img/events/sem_imagem.png';
        @endphp
        <div>
            <img class="h-40 w-40 object-cover rounded-full" src="/storage/{{ $nome_imagem }}" width="300px"
                alt="logo">
            <br>
                <input
                class="block w-full text-sm text-slate-500
                        file:mr-4 file:py-2 file:px-4
                        file:rounded-full file:border-0
                        file:text-sm file:font-semibold
                        file:bg-green-50 file:text-green-700
                        hover:file:bg-green-100"
                type="file" name="logo" id="logo"><br>
            </div>
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection