@extends('base.app')
@section('titulo', 'Home')
@section('content')


<div class="row">
        <div class="col-sm-6" id="card">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Empresas</h5>
                    <p class="card-text"></p>
                    <a href="{{ route('empresas.index') }}" class="btn btn-success">Ver empresas</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6" id="card">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Eventos</h5>
                    <p class="card-text"></p>
                    <a href="{{ route('evento.index') }}" class="btn btn-success">Ver eventos</a>
                </div>
            </div>
        </div>

    </div>



@endsection
