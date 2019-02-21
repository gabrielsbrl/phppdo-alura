<?php

    require_once __DIR__ . "/global.php";

    try {

        $produtos = Produto::listar();

        if(count($produtos) > 0) {

            $quantidade = rand(1, 10);

            foreach($produtos as $produto) {                

                $prd = new Produto($produto['id']);   

                if($quantidade <= $produto['quantidade']) {
                    $prd->excluir();
                }

                echo $produto['nome'] . " excluido com sucesso!<br>";

            }

        }

    } catch(Exception $e) {
        Erro::catchError($e);
    }