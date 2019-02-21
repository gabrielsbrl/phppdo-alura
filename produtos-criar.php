<?php require_once 'cabecalho.php' ?>
<?php 

    try {
        $categorias = Categoria::listar();
    } catch(Exception $e) {
        Erro::catchError($e);
    }

?>
<div class="row">
    <div class="col-md-12">
        <h2>Criar Nova Produto</h2>
    </div>
</div>
<?php if(count($categorias) > 0) : ?>
<form action="produtos-criar-post.php" method="post">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="form-group">
                <label for="nome">Nome do Produto</label>
                <input type="text" class="form-control" name="nome" placeholder="Nome do Produto" required>
            </div>
            <div class="form-group">
                <label for="preco">Preço da Produto</label>
                <input type="number" step="0.01" min="0" name="preco" class="form-control" placeholder="Preço do Produto" required>
            </div>
            <div class="form-group">
                <label for="quantidade">Quantidade do Produto</label>
                <input type="number"  min="0" name="quantidade" class="form-control" placeholder="Quantidade do Produto" required>
            </div>
            <div class="form-group">
                <label for="categoria">Categoria do Produto</label>
                <select class="form-control" name="categoria_id" id="categoria">
                    <?php foreach($categorias as $categoria): ?>
                        <option value="<?=$categoria['id']?>"><?=$categoria['nome']?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <input type="submit" class="btn btn-success btn-block" value="Salvar">
        </div>
    </div>
</form>
<?php else: ?>
    <p>Nenhuma categoria cadastrada. Cadastre uma categoria antes de tentar cadastrar um produto!</p>
<?php endif ?>
<?php require_once 'rodape.php' ?>
