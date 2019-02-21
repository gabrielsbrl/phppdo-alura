<?php require_once 'cabecalho.php' ?>
<?php

    try {
        $id = $_GET['id'];
        $categoria = new Categoria($id);
        $categoria->carregarProdutos();
        $produtos = $categoria->produtos;
    } catch(Exception $e) {
        Erro::catchError($e);
    }

?>
<div class="row">
    <div class="col-md-12">
        <h2>Detalhe da Categoria</h2>
    </div>
</div>

<dl>
    <dt>ID</dt>
    <dd><?=$categoria->id?></dd>
    <dt>Nome</dt>
    <dd><?=$categoria->nome?></dd>
    <dt>Produtos</dt>
    <dd>
        <?php if(count($produtos) > 0) : ?>
            <ul>
                <?php foreach($produtos as $produto) : ?>
                    <li><a href="/produtos-editar.php?id=<?=$produto['id']?>"><?=$produto['nome']?></a></li>
                <?php endforeach ?>
            </ul>
        <?php else: ?>
            <p>Nenhum produto cadastrado nessa categoria</p>
        <?php endif ?>
    </dd>
</dl>
<?php require_once 'rodape.php' ?>
