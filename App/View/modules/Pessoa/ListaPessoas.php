<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Lista de Pessoas</h1>
    <table>
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>RG</th>
            <th>CPF</th>
            <th>Data Nascimento</th>
            <th>E-mail</th>
            <th>Telefone</th>
            <th>Endereco</th>
        </tr>    

        <?php foreach($model->rows as $item): ?>
        <tr>
            <td><?= $item->id ?></td>
            <td><?= $item->nome ?></td>
            <td><?= $item->rg ?></td>
            <td><?= $item->cpf ?></td>
            <td><?= $item->data_nascimento ?></td>
            <td><?= $item->email ?></td>
            <td><?= $item->telefone ?></td>
            <td><?= $item->endereco ?></td>
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