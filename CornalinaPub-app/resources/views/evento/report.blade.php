<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel 7 PDF Example</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-2">
        <h2 class="text-center mb-2">{{$title}}</h2>
        <table class="table table-bordered mb-5">
            <thead>
                <tr class="table-success">
                <th scope="col">#</th>
                <th>Baner:</th>
                <th>Nome:</th>
                <th>Empresa:</th>
                <th>Data:</th>
                <th>Numero de ingressos:</th>
                <th>Endereço:</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($eventos as $item)
            @php
            $nome_imagem = !empty($item->baner) ? $item->baner : 'img/events/sem_imagem.png';

            @endphp
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td class="py-2 px-4 border"><img src="/storage/{{$nome_imagem}}" width="100px"
                        alt="logo"></td>
                    <td>{{ $item->nome }}</td>
                    <td>{{ $item->empresa->nome }}</td>
                    <td>{{ $item->data }}</td>
                    <td>{{ $item->numero_de_ingressos }}</td>
                    <td>{{ $item->endereco }}</td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
