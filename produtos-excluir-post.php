<?php

    require_once __DIR__ . "/global.php";

    $id = $_GET['id'];

    try {
        $produto = new Produto($id);
        $produto->excluir();
        header("Location: produtos.php");
    } catch(Exception $e) {
        Erro::catchError($e);
    }
    