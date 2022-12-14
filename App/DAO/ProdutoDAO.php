<?php

namespace App\DAO;
use App\Model\ProdutoModel;
use \PDO;

class ProdutoDAO
{
    private $conexao;

    function __construct() 
    {
        $dsn = "mysql:host=localhost:3307;dbname=db_sistema";
        $user = "root";
        $pass = "etecjau";
        $this->conexao = new PDO($dsn, $user, $pass);
    }

    function insert(ProdutoModel $model) 
    {
        $sql = "INSERT INTO produto 
                (nome, preco, descricao) 
                VALUES (?, ?, ?)";
        
        $stmt = $this->conexao->prepare($sql);
    
        $stmt->bindValue(1, $model->nomeproduto);
        $stmt->bindValue(2, $model->preco);
        $stmt->bindValue(3, $model->descricao);

        $stmt->execute();      
    }

    public function getAllRows()
    {
        $sql = "SELECT * FROM produto ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS); 
    }


    public function update(ProdutoModel $model)
    {
        $sql = "UPDATE produto SET nomeproduto=?, preco=?, descricao=?, WHERE id=?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->nomeproduto);
        $stmt->bindValue(2, $model->preco);
        $stmt->bindValue(3, $model->descricao);
        $stmt->bindValue(4, $model->id);
        $stmt->execute();
    }

    public function selectById(int $id)
    {
        //include_once 'Model/ProdutoModel.php';

        $sql = "SELECT * FROM produto WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("ProdutoModel");
    }

    public function delete(int $id)
    {
        $sql = "DELETE FROM produto WHERE id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }

}
