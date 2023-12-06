

@extends('base.app')

@section('titulo', 'Formulário de Lote de Ingresso')

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

                        <!-- Adicione os campos do formulário conforme necessário -->

                        <div class="mb-3">
                            <label for="descricao" class="form-label">Descrição:</label>
                            <input type="text" name="descricao" value="@if (!empty($loteIngresso->descricao)) {{ $loteIngresso->descricao }}@elseif(!empty(old('descricao'))) {{ old('descricao') }} @else{{ '' }} @endif" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="evento_id" class="form-label">Evento:</label>
                            <select name="evento_id" class="form-select">
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
