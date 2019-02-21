<?php

    require_once __DIR__ . "/global.php";

    $categoria = new Categoria();
    $categorias = $categoria->listar();

    foreach($categorias as $line) {

        $novaCategoria = new Categoria($line['id']);        
        $oldName = str_replace("Categoria ", "", $line['nome']);
        $novaCategoria->nome = $nome = "Categoria {$oldName}";
        $novaCategoria->atualizar();

    }

    header("Location: categorias.php");
    die();