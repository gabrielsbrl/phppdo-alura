<?php require_once 'cabecalho.php' ?>
<?php

    $produto = new Produto($_GET['id']);
    $categorias = Categoria::listar();

?>
<div class="row">
    <div class="col-md-12">
        <h2>Editar Nova Categoria</h2>
    </div>
</div>

<form action="produtos-editar-post.php" method="post">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <input type="hidden" value="<?=$produto->id?>" name="id">
            <div class="form-group">
                <label for="nome">Nome do Produto</label>
                <input type="text" value="<?=$produto->nome?>" class="form-control" placeholder="Nome do Produto" name="nome" required>
            </div>
            <div class="form-group">
                <label for="preco">Preço da Produto</label>
                <input type="number" value="<?=$produto->preco?>" step="0.01" min="0" class="form-control" name="preco" placeholder="Preço do Produto" required>
            </div>
            <div class="form-group">
                <label for="quantidade">Quantidade do Produto</label>
                <input type="number" value="<?=$produto->quantidade?>" min="0" class="form-control" name="quantidade" placeholder="Quantidade do Produto" required>
            </div>
            <div class="form-group">
                <label for="nome">Categoria do Produto</label>
                <select class="form-control" name="categoria_id">
                    <?php foreach($categorias as $categoria) : ?>
                        <?php 

                            $selected = '';
                            if($produto->categoria_id == $categoria['id']) {
                                $selected = 'selected';
                            }
                        
                        ?>    

                        <option value="<?=$categoria['id']?>" <?=$selected?>><?=$categoria['nome']?></option>                        

                    <?php endforeach ?>
                </select>
            </div>
            <input type="submit" class="btn btn-success btn-block" value="Salvar">
        </div>
    </div>
</form>

<?php require_once 'rodape.php' ?>
