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
        <table class="table">
            <thead>
                <tr class="table-success">
                <th scope="col">#</th>
                <th scope="col">Baner:</th>
                <th scope="col">Nome:</th>
                <th scope="col">Empresa:</th>
                <th scope="col">Data:</th>
                <th scope="col">Numero de ingressos:</th>
                <th scope="col">Endereço:</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($eventos as $item)
            @php
            $nome_imagem = !empty($item->baner) ? $item->baner : 'img/events/sem_imagem.png';
            $srcImagem = public_path()."/storage/".$nome_imagem;
         @endphp
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td scope="col"><img src="{{$srcImagem}}" width="100px"
                        alt="imagem"></td>
                    <td scope="col">{{ $item->nome }}</td>
                    <td scope="col">{{ $item->empresa->nome }}</td>
                    <td scope="col">{{ $item->data }}</td>
                    <td scope="col">{{ $item->numero_de_ingressos }}</td>
                    <td scope="col">{{ $item->endereco }}</td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
