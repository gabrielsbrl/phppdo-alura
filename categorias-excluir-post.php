<?php

    require_once __DIR__ . "/cabecalho.php";

    $id = $_GET['id'];
    $categoria = new Categoria($id);

    try {
        $categoria->excluir();
        header("Location: categorias.php");
    } catch(Exception $ex) {
        echo "<pre>";
        print_r($ex->getMessage());
        echo "</pre>";
    }