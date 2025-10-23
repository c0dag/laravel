<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Porddutor</title>
</head>
<body>
    <h1>Produtos cadastrados</h1>
    <a href="{{ route('produtos.criar') }}">Cadastrar novo produto</a>
    <ul>
        @foreach ($produtos as $produto)
        <li>
            <strong>{{ $produto->nome }}</strong> 
            <br>
            - Preço: R$ {{ number_format($produto->preco, 2, ',', '.') }}
            <br>
            - Descrição: {{ $produto->descricao ?? 'N/A' }}
            <br>
            - Categoria: {{ $produto->categoria ? $produto->categoria->nome : 'Sem categoria' }}
        </li>
        @endforeach
    </ul>
</body>
</html>