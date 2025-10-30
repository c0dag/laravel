<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorias</title>
</head>
<body>
    <h1>Categorias</h1>

    <a href="/categorias/criar">Cadastrar Categoria</a>
    <a href="/produtos">Ver Produtos</a>

    <div>
        <h2>Categorias Cadastradas</h2>

        @if ($categorias->count() > 0)
            @foreach ($categorias as $categoria)
                <div>
                    <strong>{{ $categoria->nome }}</strong>
                    <div>
                        <p><strong>Produtos nesta categoria:</strong> {{ $categoria->produtos->count() }}</p>
                        <p><strong>Cadastrada em:</strong> {{ $categoria->created_at->format('d/m/Y H:i') }}</p>
                    </div>
                </div>
            @endforeach
        @else
            <p>Nenhuma categoria cadastrada ainda.</p>
        @endif
    </div>
</body>
</html>
