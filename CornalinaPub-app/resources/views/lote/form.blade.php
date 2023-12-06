

@extends('base.app')

@section('titulo', 'Formulário de lote de ingresso')

@section('content')
    @php
        if (!empty($loteIngresso->id)) {
            $route = route('lote.update', $loteIngresso->id);
        } else {
            $route = route('lote.store');
        }
    @endphp

    <div class="container py-5">
        <div class="row">
            <div class="col-md-6">
                <div class="bg-white p-4 rounded shadow">
                    <h3 class="text-2xl font-medium mb-4">Formulário de Lote de Ingresso</h3>

                    <form action="{{ $route }}" method="post">
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

                        <!-- Adicione os campos do formulário conforme necessário -->

                        <div class="mb-3">
                            <label for="descricao" class="form-label">Descrição:</label>
                            <input type="text" name="descricao" value="@if (!empty($loteIngresso->descricao)) {{ $loteIngresso->descricao }}@elseif(!empty(old('descricao'))) {{ old('descricao') }} @else{{ '' }} @endif" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="evento_id" class="form-label">Evento:</label>
                            <select name="evento_id" class="form-control">
                                @foreach ($eventos as $evento)
                                    <option value="{{ $evento->id }}">{{ $evento->nome }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Adicione o restante dos campos do formulário com a mesma estrutura -->

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
