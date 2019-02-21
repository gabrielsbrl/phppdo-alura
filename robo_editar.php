<?php

    require_once __DIR__ . "/global.php";

    try {

        $produtos = Produto::listar();

        if(count($produtos) > 0) {

            foreach($produtos as $produto) {

                $quantidade = rand(1, 10);
                $preco = rand(1, 200);
                $prd = new Produto($produto['id']);                
                $prd->quantidade = $quantidade;
                $prd->preco = $preco;
                $prd->atualizar();

                echo $produto['nome'] . " atualizados com sucesso!<br>";

            }

        }

    } catch(Exception $e) {
        Erro::catchError($e);
    }