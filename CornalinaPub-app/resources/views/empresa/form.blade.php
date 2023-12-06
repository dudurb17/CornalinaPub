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
    <div class="container py-5">
        <div class="row">
        <div class="col-md-6">
            <div class="bg-white p-4 rounded shadow">
            <h3 class="pt-4 text-2xl font-medium">Formulário de empresas</h3>
           <!-- Adicione aqui o formulário de cadastro -->
           <form action="{{$route}}" method="post" enctype="multipart/form-data">
            @csrf <!-- cria um hash de segurança-->
            @if ($errors->any())
            <div class="mb-4 rounded-lg bg-danger-100 px-6 py-5 text-base text-danger-700" role="alert">Erro!
                @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
        @endif
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
                <input class="form-control" type="file" name="logo" id="logo"><br>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
   </div>
   <div class="col-md-6 text-center">
    <img class="img-fluid rounded-circle" src="/storage/{{ $nome_imagem }}" width="300px" alt="logo">
   </div>
    </div>
    </div>
@endsection
