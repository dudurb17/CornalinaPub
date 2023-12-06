@extends('base.app')
@section('titulo', 'Empresas')
@section('content')

<div class="container mt-3">
<div class="d-flex justify-content-between align-items-center">
    <h2>Listagem de Eventos</h2>
    <form action="{{ route('evento.search') }}" method="post" class="d-flex">
        @csrf
        <div class="input-group">
            <select name="tipo" class="form-select">
                <option value="nome">Nome</option>
                <option value="numero_de_ingressos"> Numero de ingressos</option>
            </select>
        </div>
        <div class="input-group">
            <input type="text" name="valor" class="form-control" placeholder="Pesquisar">
        </div>
        <div class="input-group">
            <button type="submit" class="btn btn-primary">Buscar</button>
        </div>
    </form>
    <button type="button" class="btn btn-primary">Primary</button>

    <button type="button" class="btn btn-success">
        <a href="{{ route('evento.create') }}" class="text-white text-decoration-none">Cadastrar novo Evento</a>
    </button>

</div>
<br>

    <!-- Tabela de Empresas -->
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID:</th>
                <th>Baner:</th>
                <th>Nome:</th>
                <th>Empresa:</th>
                <th>Data:</th>
                <th>Numero de ingressos:</th>
                <th>Endereço:</th>
                <th>Ações:</th>
                <th>Ações:</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($evento as $item)
            @php
            $nome_imagem = !empty($item->baner) ? $item->baner : 'img/events/sem_imagem.png';

            @endphp
                <tr>
                    <td class="py-2 px-4 border">{{ $item->id }}</td>
                    <td class="py-2 px-4 border"><img src="/storage/{{$nome_imagem}}" width="100px"
                        alt="logo"></td>
                    <td class="py-2 px-4 border">{{ $item->nome }}</td>
                    <td class="py-2 px-4 border">{{$item->empresa->nome}}</td>
                    <td class="py-2 px-4 border">{{ $item->data }}</td>
                    <td class="py-2 px-4 border">{{ $item->numero_de_ingressos }}</td>
                    <td class="py-2 px-4 border">{{ $item->endereco }}</td>
                    <td class="py-2 px-4 border"><a type="button" class="btn btn-primary"
                        href="{{ route('evento.edit', $item->id) }}">Editar</a></td>
<td class="py-2 px-4 border">
                    <a type="button" class="btn btn-danger" href="{{ route('evento.destroy', $item->id) }}"
                            onclick="return confirm('Deseja Excluir?')">Excluir</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
