<?php

require_once __DIR__ . "/Conexao.php";

class Categoria {

    public $id;
    public $nome;
    public $produtos;
    public $conn; 

    public function __construct($id = false) {

        $this->conn = Conexao::getConnection();

        if($id) {
            $this->id = $id;
            $this->carregar();
        }

    }

    public static function listar() {
        $query = "SELECT id, nome FROM categorias ORDER BY nome";        
        $conn = Conexao::getConnection();
        $resultado = $conn->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }    

    public function carregarProdutos() {
        $this->produtos = Produto::listarPorCategoria($this->id);
    }

    public function carregar() {
        $query = "SELECT id, nome FROM categorias WHERE id = {$this->id}";        
        $resultado = $this->conn->query($query);
        $categoria = $resultado->fetch();
        $this->nome = $categoria['nome'];
    }

    public function inserir() {
        $query =  "INSERT INTO categorias (nome) VALUES ('" . $this->nome ."')";        
        $this->conn->exec($query);
    }

    public function atualizar() {
        $query = "UPDATE categorias SET nome = '{$this->nome}' WHERE id = {$this->id}";        
        $this->conn->exec($query);
    }

    public function excluir()
    {
        $query = "DELETE FROM categorias WHERE id = " . $this->id;
        $this->conn->exec($query);
    }

}