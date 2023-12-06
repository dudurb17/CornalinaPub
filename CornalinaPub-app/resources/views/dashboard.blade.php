@extends('base.app')
@section('titulo', 'Home')
@section('content')


<div class="row">
        <div class="col-sm-6" id="card">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Empresas</h5>
                    <img src="https://img.freepik.com/fotos-gratis/pessoas-de-tiro-medio-no-evento-de-trabalho-com-comida_23-2149304773.jpg"
                    width="600px" height="350px">
                    <p class="card-text"></p>
                    <a href="{{ route('empresas.index') }}" class="btn btn-primary">Ver empresas</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6" id="card">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Eventos</h5>
                    <img src="https://img.freepik.com/fotos-gratis/a-luz-brilhante-do-palco-ilumina-os-fas-de-rock-gerados-pela-ia_188544-37983.jpg?w=900&t=st=1701883516~exp=1701884116~hmac=0370b4cc6f434678bddab3e7b2029f31731dbe2032d989964640659d7756bfc0"
                    width="600px" height="350px">
                    <p class="card-text"></p>
                    <a href="{{ route('evento.index') }}" class="btn btn-primary">Ver eventos</a>
                </div>
            </div>
        </div>
        <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="" class="d-block w-100" alt="...">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>

    </div>



@endsection
