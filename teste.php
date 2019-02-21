<?php

$query = "SELECT id, nome FROM categorias";
$conexao = new PDO('mysql:host=127.0.0.1;dbname=estoque', 'root', '');
$resultado = $conexao->query($query);
$lista = $resultado->fetchAll();

echo '<pre>';
print_r($lista);
echo '</pre>';