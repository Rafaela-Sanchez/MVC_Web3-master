<?php

namespace App\Controller;
use App\Model\CategoriaProdutoModel;


class CategoriaProdutoController{

    public static function form()
    {
        include 'View/modules/CategoriaProduto/CadastroCategoria.php';
    }

    public static function save() {

        //include 'Model/CategoriaProdutoModel.php';

        $produto = new CategoriaProdutoModel();
        $produto->nomecategoria = $_POST['nomecategoria'];
        $produto->descricao = $_POST['descricao'];

        $produto->save();
        header("Location: /categoria");
    }


        public static function delete(){

        //include 'Model/CategoriaProdutoModel.php';

        $model = new CategoriaProdutoModel();

        $model->delete( (int) $_GET['id'] );

        header("Location: /categoria");
    }

}