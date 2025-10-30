<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Categoria</title>
</head>
<body>
    <h1>Cadastrar Categoria</h1>

    <a href="/categorias">Ver Categorias</a>
    <a href="/produtos">Ver Produtos</a>
    <a href="/produtos/criar">Cadastrar Produto</a>

    @if (session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h2>Cadastrar Nova Categoria</h2>
    <form action="{{ route('categorias.store') }}" method="POST">
        @csrf
        <div>
            <label for="nome">Nome da Categoria:</label>
            <input type="text" id="nome" name="nome" value="{{ old('nome') }}" required>
        </div>

        <button type="submit">Cadastrar Categoria</button>
    </form>
</body>
</html>

