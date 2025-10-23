<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar produto</title>
</head>
<body>
    <h1>Novo Produto</h1>
    @if ($errors -> any())
    <div style="color: red;">
        <ul>
            @foreach ($errors -> all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{ route('produto.salvar') }}" method="POST">
        @csrf
        <div>
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="{{ old('nome') }}">
        </div>
        <div>
            <label for="descricao">Descrição:</label>
            <textarea id="descricao" name="descricao">{{ old('descricao') }}</textarea>
        </div>
        <div>
            <label for="preco">Preço:</label>
            <input type="text" id="preco" name="preco" value="{{ old('preco') }}">
        </div>
        <div>
            <button type="submit">Salvar</button>
        </div>
    </form>
    <button >
</body>
</html>