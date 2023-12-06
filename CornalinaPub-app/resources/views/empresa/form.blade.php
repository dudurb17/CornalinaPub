@extends('base.app')

@section('titulo', 'Formulário de Pedido')

@section('content')
    @php
        if (!empty($empresa->id)) {
            $route = route('empresas.update', $empresa->id);
        } else {
            $route = route('empresas.store');
        }
    @endphp
    <div class="mx-auto py-12 divide-y md:max-w-4xl">
        <div class="grid grid-cols 2 gap-4">
            <h3 class="pt-4 text-2xl font-medium">Formulário de Eventos</h3>
           <!-- Adicione aqui o formulário de cadastro -->
           <form action="{{$route}}" method="post" enctype="multipart/form-data">
            @csrf <!-- cria um hash de segurança-->
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" value="@if (!empty($empresa->nome)) {{ $empresa->nome }}@elseif(!empty(old('nome'))){{ old('nome') }}@else{{ '' }} @endif" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="cnpj">CNPJ:</label>
                <input type="text" name="cnpj" value="@if (!empty($empresa->cnpj)) {{ $empresa->cnpj }}@elseif(!empty(old('cnpj'))){{ old('cnpj') }}@else{{ '' }} @endif" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="endereco">Endereço:</label>
                <input type="text" name="endereco" value="@if (!empty($empresa->endereco)) {{ $empresa->endereco }}@elseif(!empty(old('endereco'))){{ old('endereco') }}@else{{ '' }} @endif" class="form-control" required>
            </div>
            @php
            $nome_imagem = !empty($empresa->logo) ? $empresa->logo : 'img/events/sem_imagem.png';
            @endphp
            <div>
                <img class="h-40 w-40 object-cover rounded-full" src="/storage/{{ $nome_imagem }}" width="300px" alt="logo">
                <br>
                <input class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100" type="file" name="logo" id="logo"><br>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
    </div>
@endsection
