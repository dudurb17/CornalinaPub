@extends('base.app')

@section('titulo', 'Formulário de Pedido')

@section('content')
    @php
        if (!empty($evento->id)) {
            $route = route('evento.update', $evento->id);
        } else {
            $route = route('evento.store');
        }
    @endphp
    <div class="mx-auto py-12 divide-y md:max-w-4xl">
        <div class="grid grid-cols 2 gap-4">
            <h3 class="pt-4 text-2xl font-medium">Formulário de Eventos</h3>
           <!-- Adicione aqui o formulário de cadastro -->
           <form action="{{ $route}}" method="post" enctype="multipart/form-data">
            @csrf <!-- cria um hash de segurança-->
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" value="@if (!empty($evento->nome)) {{ $evento->nome }}@elseif(!empty(old('nome'))){{ old('nome') }}@else{{ '' }} @endif" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="date" name="data"
                                class="mt-0 block w-full px-0.5 border-0 border-b-2 border-gray-200
                    focus:ring-0 focus:border-black"
                                value="@if (!empty($evento->data)) {{ $evento->data }} @elseif (!empty(old('data'))){{ old('data') }}@else{{ '' }} @endif"
                                required>
                        </label>
            </div>
            <div class="form-group">
                <label for="empresas_id">Nome da empresa:</label>
                <select name="empresas_id"
                    class="mt-0 block w-full px-0.5 border-0 border-b-2 border-gray-200
                focus:ring-0 focus:border-black">
                    @foreach ($empresa as $item)
                        <option value="{{ $item->id }}">{{ $item->nome }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="numero_de_ingressos">CNPJ:</label>
                <input type="text" name="numero_de_ingressos" value="@if (!empty($evento->numero_de_ingressos)) {{ $evento->numero_de_ingressos }}@elseif(!empty(old('numero_de_ingressos'))){{ old('numero_de_ingressos') }}@else{{ '' }} @endif" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="endereco">Endereço:</label>
                <input type="text" name="endereco" value="@if (!empty($evento->endereco)) {{ $evento->endereco }}@elseif(!empty(old('endereco'))){{ old('endereco') }}@else{{ '' }} @endif" class="form-control" required>
            </div>
                @php
                $nome_imagem = !empty($produto->baner) ? $produto->baner : 'img/events/sem_imagem.png';
                @endphp
            <div>
                <img class="h-40 w-40 object-cover rounded-full" src="/storage/{{ $nome_imagem }}" width="300px" alt="logo">
                <br>
                <input class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100" type="file" name="baner" id="logo"><br>
            </div><br>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
            <br>
            <br>
            <br>
            <br>
        </form>
    </div>
    </div>
@endsection
