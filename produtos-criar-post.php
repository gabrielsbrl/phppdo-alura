<?php 

    require_once __DIR__ . "/global.php";

    try {
        $produto = new Produto();
        $produto->nome = $_POST['nome'];
        $produto->preco = $_POST['preco'];
        $produto->quantidade = $_POST['quantidade'];
        $produto->categoria_id = $_POST['categoria_id'];
        $produto->criar();
        header("Location: produtos.php");
    } catch(Exception $e) {
        Erro::catchError($e);
    }