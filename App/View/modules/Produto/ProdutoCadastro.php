<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produtos</title>
    <style>
        label, input { display: block;}
    </style>
</head>
<body>
    <form action="/produto/save" method="post">
        <fieldset>
            <legend>Cadastro de Produtos</legend>
            <label for="nomeproduto">Nome Produto:</label>
            <input name="nomeproduto" id="nomeproduto" type="text" />

            <label for="preco">Preço:</label>
            <input name="preco" id="preco" type="text" />

            <label for="descricao">Descrição:</label>
            <input name="descricao" id="descricao" type="text" />

            <button type="submit">Enviar</button>

        </fieldset>
    </form>    
</body>
</html>