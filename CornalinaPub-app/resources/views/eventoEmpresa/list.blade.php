@extends('base.app')
@section('titulo', 'Empresas')
@section('content')

<div class="container mt-3">
<div class="d-flex justify-content-between align-items-center">
    <h2>Listagem de Eventos por empresas</h2>
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
            </tr>
        </thead>
        <tbody>
            @foreach ($empresa as $item)
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
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
