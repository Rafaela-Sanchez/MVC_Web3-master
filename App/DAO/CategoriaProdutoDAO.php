<?php

class CategoriaProdutoDAO{

    private $conexao;

    function __construct() 
    {
        $dsn = "mysql:host=localhost:3307;dbname=db_sistema";
        $user = "root";
        $pass = "etecjau";
        $this->conexao = new PDO($dsn, $user, $pass);
    }

    function insert(CategoriaProdutoModel $model) 
    {
        $sql = "INSERT INTO categoria 
                (nome_cat, descricao) 
                VALUES (?, ?)";
        
        $stmt = $this->conexao->prepare($sql);
    
        $stmt->bindValue(1, $model->nomecategoria);
        $stmt->bindValue(2, $model->descricao);

        $stmt->execute();      
    }

    public function getAllRows()
    {
        $sql = "SELECT * FROM categoria ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS); 
    }

    public function update(CategoriaProdutoModel $model)
    {
        $sql = "UPDATE categoria SET nomecategoria=?, descricao=?, WHERE id=?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->nomecategoria);
        $stmt->bindValue(2, $model->descricao);
        $stmt->bindValue(3, $model->id);
        $stmt->execute();
    }

    public function selectById(int $id)
    {
        include_once 'Model/CategoriaProdutoModel.php';

        $sql = "SELECT * FROM categoria WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("CategoriaProdutoModel");
    }

    public function delete(int $id)
    {
        $sql = "DELETE FROM categoria WHERE id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }

}