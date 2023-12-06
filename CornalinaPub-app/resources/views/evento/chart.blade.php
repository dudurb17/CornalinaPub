@extends('base.app')
@section('titulo', 'Gráfico de eventos')
@section('content')


<div class="card" style="margin:20px;">

<div class="container px-4 mx-auto">

    <div class="p-6 m-20 bg-white rounded shadow">

        {!! $chart->container() !!}
    </div>

</div>

<script src="{{ $chart->cdn() }}"></script>

{{ $chart->script() }}

</div>


@endsection
