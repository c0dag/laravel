<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
</head>
<body>
    <div style="display: flex; align-items: center; gap: 10px;">
        <h1>Editar Produto</h1>
        <a href="/produtos">Ver Produtos</a>
        <a href="/categorias">Ver Categorias</a>
        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit">Sair</button>
        </form>
    </div>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('produtos.update', $produto->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="{{ old('nome', $produto->nome) }}" required>
        </div>

        <div>
            <label for="descricao">Descrição:</label>
            <textarea id="descricao" name="descricao">{{ old('descricao', $produto->descricao) }}</textarea>
        </div>

        <div>
            <label for="preco">Preço (R$):</label>
            <input type="number" id="preco" name="preco" step="0.01" min="0" value="{{ old('preco', $produto->preco) }}" required>
        </div>

        <div>
            <label for="categoria_id">Categoria:</label>
            <select id="categoria_id" name="categoria_id">
                <option value="">Selecione uma categoria</option>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ old('categoria_id', $produto->categoria_id) == $categoria->id ? 'selected' : '' }}>
                        {{ $categoria->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="imagem">Imagem (PNG ou JPG):</label>
            <input type="file" id="imagem" name="imagem" accept=".png,.jpg,.jpeg">
            @if ($produto->imagem)
                <div>
                    <p>Imagem atual:</p>
                    <img src="{{ asset('storage/produtos/' . $produto->imagem) }}" alt="{{ $produto->nome }}" style="max-width: 200px;">
                </div>
            @endif
        </div>

        <button type="submit">Atualizar Produto</button>
    </form>
</body>
</html>
