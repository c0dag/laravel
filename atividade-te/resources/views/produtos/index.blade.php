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

    <div>
        <h2>Produtos Cadastrados</h2>

        @if ($produtos->count() > 0)
            @foreach ($produtos as $produto)
                <div style="border: 1px solid #ccc; padding: 10px; margin: 10px 0;">
                    <strong>{{ $produto->nome }}</strong>
                    <div>
                        <p><strong>Preço:</strong> R$ {{ number_format($produto->preco, 2, ',', '.') }}</p>
                        @if ($produto->descricao)
                            <p><strong>Descricao:</strong> {{ $produto->descricao }}</p>
                        @endif
                        <p><strong>Categoria:</strong> {{ $produto->categoria ? $produto->categoria->nome : 'Sem categoria' }}</p>
                        @if ($produto->imagem)
                            <p><img src="{{ asset('storage/produtos/' . $produto->imagem) }}" alt="{{ $produto->nome }}" style="max-width: 150px;"></p>
                        @endif
                        <div style="margin-top: 10px;">
                            <a href="{{ route('produtos.edit', $produto->id) }}">Editar</a>
                            <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p>Nenhum produto cadastrado</p>
        @endif
    </div>
</body>
</html>
