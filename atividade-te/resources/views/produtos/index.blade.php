<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
</head>
<body>
    <div style="display: flex; align-items: center; gap: 10px;">
        <h1>Produtos</h1>
        <a href="/produtos/criar">Cadastrar Produto</a>
        <a href="/categorias">Ver Categorias</a>
    </div>

    <div>
        <h2>Produtos Cadastrados</h2>

        @if ($produtos->count() > 0)
            @foreach ($produtos as $produto)
                <div>
                    <strong>{{ $produto->nome }}</strong>
                    <div>
                        <p><strong>Preço:</strong> R$ {{ number_format($produto->preco, 2, ',', '.') }}</p>
                        @if ($produto->descricao)
                            <p><strong>Descricao:</strong> {{ $produto->descricao }}</p>
                        @endif
                        <p><strong>Categoria:</strong> {{ $produto->categoria ? $produto->categoria->nome : 'Sem categoria' }}</p>
                    </div>
                </div>
            @endforeach
        @else
            <p>Nenhum produto cadastrado</p>
        @endif
    </div>
</body>
</html>
