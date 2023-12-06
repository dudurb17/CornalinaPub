@extends('base.app')

@section('titulo', 'Formulário de Ingresso')

@section('content')
    @php
        if (!empty($ingresso->id)) {
            $route = route('ingresso.update', $ingresso->id);
        } else {
            $route = route('ingresso.store');
        }
    @endphp

    <div class="container py-5">
        <div class="row">
            <div class="col-md-6">
                <div class="bg-white p-4 rounded shadow">
                    <h3 class="text-2xl font-medium mb-4">Formulário de ingressos</h3>

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
                            <label for="text" class="form-label">Código</label>
                            <input type="text" name="codigo" value="@if (!empty($ingresso->codigo)) {{ $ingresso->codigo }}@elseif(!empty(old('codigo'))) {{ old('codigo') }} @else{{ '' }} @endif" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="text" class="form-label">Valor:</label>
                            <input type="text" name="valor" value="@if (!empty($ingresso->valor)) {{ $ingresso->valor }}@elseif(!empty(old('valor'))) {{ old('valor') }} @else{{ '' }} @endif" class="form-control" required>
                        </div>


                        <div class="mb-3">
                            <label for="lote_ingresso_id" class="form-label">Lote:</label>
                            <select name="lote_ingresso_id" class="form-select">
                                @foreach ($lotesIngresso as $item)
                                    <option value="{{ $item->id }}">{{ $item->descricao}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                        </div>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection
