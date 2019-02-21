<?php require_once 'cabecalho.php' ?>
<?php

    try {

        $produtos = Produto::listar();

    } catch(Exception $e) {
        Erro::catchError($e);
    }    

?>
<div class="row">
    <div class="col-md-12">
        <h2>Produtos</h2>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <a href="produtos-criar.php" class="btn btn-info btn-block">Crair Novo Produto</a>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <table class="table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Categoria</th>
                <th class="acao">Editar</th>
                <th class="acao">Excluir</th>
            </tr>
            </thead>
            <tbody>
                <?php if(count($produtos) > 0) :?>
                    <?php foreach($produtos as $produto): ?>
                        <?php $categoria = new Categoria($produto['categoria_id']); ?>
                        <tr>
                            <td><?=$produto['id']?></td>
                            <td><?=$produto['nome']?></td>
                            <td>R$ <?=$produto['preco']?></td>
                            <td><?=$produto['quantidade']?></td>
                            <td><?=$categoria->nome?></td>
                            <td><a href="/produtos-editar.php?id=<?=$produto['id']?>" class="btn btn-info">Editar</a></td>
                            <td><a href="/produtos-excluir-post.php?id=<?=$produto['id']?>" class="btn btn-danger">Excluir</a></td>
                        </tr>
                    <?php endforeach ?>
                <?php else: ?>
                    <p>Nenhum produto cadastrado</p>
                <?php endif ?>
            </tbody>
        </table>
    </div>
</div>
<?php require_once 'rodape.php' ?>
