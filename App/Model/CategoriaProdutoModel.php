<?php

class CategoriaProdutoModel{

    public $id, $nomecategoria, $descricao;
    public $rows;

    public function save()
    {
        include 'DAO/CategoriaProdutoDAO.php';

        $dao = new CategoriaProdutoDAO();

        if($this->id == null) 
        {
            $dao->insert($this);
        } else {

        }
    }

    public function getById(int $id)
    {
        include 'DAO/CategoriaProdutoDAO.php'; 

        $dao = new CategoriaProdutoDAO();

        $obj = $dao->selectById($id);

        return ($obj) ? $obj : new CategoriaProdutoModel();
    }


    public function delete(int $id)
    {
        include 'DAO/CategoriaProdutoDAO.php'; 

        $dao = new CategoriaProdutoDAO();

        $dao->delete($id);
    }

    public function getAllRows()
    {
        include 'DAO/CategoriaProdutoDAO.php';

        $dao = new CategoriaProdutoDAO();
        $this->rows = $dao->getAllRows();
    }

}