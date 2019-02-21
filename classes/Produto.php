<?php

class Produto {

    public $id;
    public $nome;
    public $preco;
    public $quantidade;
    public $categoria_id;
    public $conn;

    public function __construct($id = false) {

        $this->conn = Conexao::getConnection();

        if($id) {
            $this->id = $id;
            $this->carregar();
        }
        
    }

    public function carregar() {
        
        $query = "SELECT nome, preco, quantidade, categoria_id FROM produtos WHERE id = :id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':id', $this->id);
        $stmt->execute();
        $produto = $stmt->fetch();
        $this->nome = $produto['nome'];
        $this->preco = $produto['preco'];
        $this->quantidade = $produto['quantidade'];
        $this->categoria_id = $produto['categoria_id'];

    }

    public static function listarSemLazyLoad() {

        $conn = Conexao::getConnection();
        $query = "SELECT p.id, p.nome, p.preco, p.quantidade, p.categoria_id, c.nome as categoria_nome
                  FROM produtos as p JOIN categorias as c ON c.id = p.categoria_id
                  ORDER BY p.nome";

        $result = $conn->query($query);
        return $result->fetchAll();

    }

    public static function listar() {

        $conn = Conexao::getConnection();
        $query = "SELECT p.id, p.nome, p.preco, p.quantidade, p.categoria_id
                  FROM produtos as p
                  ORDER BY p.nome";

        $result = $conn->query($query);
        return $result->fetchAll();

    }

    public static function listarPorCategoria($categoria_id) {
        $query = "SELECT id, nome, preco, quantidade FROM produtos WHERE categoria_id = :categoria_id";
        $conexao = Conexao::getConnection();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':categoria_id', $categoria_id);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function criar() {

        $query = "INSERT INTO produtos (nome, preco, quantidade, categoria_id)
                  VALUES (:nome, :preco, :quantidade, :categoria_id)";

        $stmt = $this->conn->prepare($query);

        $stmt->bindValue(':nome', $this->nome);
        $stmt->bindValue(':preco', $this->preco);
        $stmt->bindValue(':quantidade', $this->quantidade);
        $stmt->bindValue(':categoria_id', $this->categoria_id);
        $stmt->execute();

    }

    public function atualizar() {
        $query = "UPDATE produtos SET nome = :nome, preco = :preco, quantidade = :quantidade, categoria_id = :categoria_id WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':nome', $this->nome);
        $stmt->bindValue(':preco', $this->preco);
        $stmt->bindValue(':quantidade', $this->quantidade);
        $stmt->bindValue(':categoria_id', $this->categoria_id);
        $stmt->bindValue(':id', $this->id);
        $stmt->execute();
    }

    public function excluir() {
        $query = "DELETE FROM produtos WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':id', $this->id);
        $stmt->execute();
    }

}