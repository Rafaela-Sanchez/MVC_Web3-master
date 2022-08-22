<?php

class ProdutoController
{

    public static function index() 
    {
        //include 'Model/ProdutoModel.php';
        
        $model = new ProdutoModel();
        $model->getAllRows();

        //include 'View/modules/Produto/ProdutoListar.php';
    }

    public static function form()
    {
        //include 'View/modules/Produto/ProdutoCadastro.php';
    }

    public static function save() {

        //include 'Model/ProdutoModel.php';

        $produto = new ProdutoModel();
        $produto->nomeproduto = $_POST['nomeproduto'];
        $produto->preco = $_POST['preco'];
        $produto->descricao = $_POST['descricao'];

        $produto->save();
        header("Location: /produto");
    }


        public static function delete(){

        //include 'Model/ProdutoModel.php';

        $model = new ProdutoModel();

        $model->delete( (int) $_GET['id'] );

        header("Location: /produto");
    }
    

}