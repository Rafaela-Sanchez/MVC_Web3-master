<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Produtos</title>
</head>
<body>
    <h1>Lista de Produtos</h1>
    <table>
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Preço</th>
            <th>Descricao</th>
        </tr>    

        <?php foreach($model->rows as $item): ?>
        <tr>
            <td><?= $item->id ?></td>
            <td><?= $item->nomeproduto ?></td>
            <td><?= $item->preco ?></td>
            <td><?= $item->descricao ?></td>
        </tr>

        <?php endforeach ?>   
        
        <?php if(count($model->rows) == 0): ?>
            <tr>
                <td colspan="5">Nenhum registro encontrado.</td>
            </tr>
        <?php endif ?>

    </table>
</body>
</html>