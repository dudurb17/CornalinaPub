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

    <div class="container py-5">
        <div class="row">
            <div class="col-md-6">
                <div class="bg-white p-4 rounded shadow">
                    <h3 class="text-2xl font-medium mb-4">Formulário de Eventos</h3>

                    <form action="{{ $route }}" method="post" enctype="multipart/form-data">
                        @csrf
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

                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome:</label>
                            <input type="text" name="nome" value="@if (!empty($evento->nome)) {{ $evento->nome }}@elseif(!empty(old('nome'))) {{ old('nome') }} @else{{ '' }} @endif" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="data" class="form-label">Data:</label>
                            <input type="date" name="data" value="@if (!empty($evento->data)) {{ $evento->data }}@elseif(!empty(old('data'))) {{ old('data') }} @else{{ '' }} @endif" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="text" class="form-label">Numero de ingressos:</label>
                            <input type="text" name="numero_de_ingressos" value="@if (!empty($evento->numero_de_ingressos)) {{ $evento->numero_de_ingressos }}@elseif(!empty(old('numero_de_ingressos'))) {{ old('numero_de_ingressos') }} @else{{ '' }} @endif" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="text" class="form-label">Endereço:</label>
                            <input type="text" name="endereco" value="@if (!empty($evento->endereco)) {{ $evento->endereco }}@elseif(!empty(old('endereco'))) {{ old('endereco') }} @else{{ '' }} @endif" class="form-control" required>
                        </div>


                        <div class="mb-3">
                            <label for="empresas_id" class="form-label">Nome da empresa:</label>
                            <select name="empresa_id" class="form-select">
                                @foreach ($empresa as $item)
                                    <option value="{{ $item->id }}">{{ $item->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                        @php
                        $nome_imagem = !empty($evento->baner) ? $evento->baner : 'img/events/sem_imagem.png';
                        @endphp
                        <!-- Adicione o restante dos campos do formulário com a mesma estrutura -->

                        <div class="mb-3">
                            <label for="baner" class="form-label">Banner:</label>
                            <input type="file" name="baner" id="logo" class="form-control">
                        </div>


                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                        </div>
                    </form>
                </div>
            </div>


            <div class="col-md-6 text-center">
                <img class="img-fluid rounded-circle" src="/storage/{{ $nome_imagem }}" width="300px" alt="logo">
            </div>
        </div>
    </div>
@endsection
