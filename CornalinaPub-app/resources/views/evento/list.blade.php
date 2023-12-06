@extends('base.app')
@section('titulo', 'Empresas')
@section('content')

<div class="container mt-3">
<div class="d-flex justify-content-between align-items-center">

<h3>Listagem de Eventos</h3>


    <form action="{{ route('evento.search') }}" method="post" class="d-flex">
        @csrf
        <div class="input-group" >
            <select name="tipo" class="form-select btn">
                <option value="nome">Nome</option>
                <option value="numero_de_ingressos"> Número de ingressos</option>
            </select>
        </div>
        <div class="input-group" style="margin-left: 5px">
            <input type="text" name="valor" class="form-control" placeholder="Pesquisar">
        </div>
        <div class="input-group">
            <button type="submit" class="btn btn-primary" style="margin-left: 5px">Buscar</button>
        </div>
    </form>

    <button type="button" class="btn btn-primary">
    <i class="bi bi-filetype-pdf"></i>
    <a href="{{ route('evento.report') }}" class="text-white text-decoration-none">Abrir PDF</a>
    </button>



    <button type="button" class="btn btn-success" style="margin-left: 5px">
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
                <th>N° ingressos:</th>
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
                    <td class="py-2 px-4 border">
                        <a type="button" class="btn btn-primary"
                        href="{{ route('evento.edit', $item->id) }}"><i class="bi bi-pencil-square"></i></a>
                    </td>
                     <td class="py-2 px-4 border">
                    <a type="button" class="btn btn-danger" href="{{ route('evento.destroy', $item->id) }}"
                            onclick="return confirm('Deseja Excluir?')"><i class="bi bi-trash3-fill"></i></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
