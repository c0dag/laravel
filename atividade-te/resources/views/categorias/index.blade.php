<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorias</title>
</head>
<body>
    <div style="display: flex; align-items: center; gap: 10px;">
        <h1>Categorias</h1>
        <a href="/categorias/criar">Cadastrar Categoria</a>
        <a href="/produtos">Ver Produtos</a>
        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit">Sair</button>
        </form>
    </div>

    @if (session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif

    @if (isset($ultimaCategoria))
        <div style="background: #e0e0e0; padding: 10px; margin: 10px 0;">
            <p>Última categoria visualizada: <strong>{{ $ultimaCategoria }}</strong></p>
        </div>
    @endif

    <div>
        <h2>Categorias Cadastradas</h2>

        @if ($categorias->count() > 0)
            @foreach ($categorias as $categoria)
                <div style="border: 1px solid #ccc; padding: 10px; margin: 10px 0;">
                    <strong>{{ $categoria->nome }}</strong>
                    <div>
                        <p><strong>Produtos nesta categoria:</strong> {{ $categoria->produtos->count() }}</p>
                        <p><strong>Cadastrada em:</strong> {{ $categoria->created_at->format('d/m/Y H:i') }}</p>
                        <div style="margin-top: 10px;">
                            <a href="{{ route('categorias.edit', $categoria->id) }}">Editar</a>
                            <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p>Nenhuma categoria cadastrada ainda.</p>
        @endif
    </div>
</body>
</html>
