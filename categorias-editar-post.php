<?php

    require_once __DIR__ . "/global.php";

    try {
        $nome = $_POST["nome"];
        $id = $_POST['id'];

        $categoria = new Categoria($id);
        $categoria->nome = $nome;

        $categoria->atualizar();
        header("Location: categorias.php");        
    } catch(Exception $e) {
        Erro::catchError($e);
    }