<?php


use App\Controller\CategoriaProdutoController;
use App\Controller\PessoaController; 
use App\Controller\ProdutoController;

$uri_parse = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

//echo $uri_parse;
//echo "<hr />";

//include 'Controller/PessoaController.php';
//include 'Controller/ProdutoController.php';
//include 'Controller/CategoriaProdutoController.php';

include 'autoload.php';

switch($uri_parse)
{

    //PESSOAS 

    case '/pessoa':
        PessoaController::index();
    break;

    case '/pessoa/form':
        PessoaController::form();
    break;

    case '/pessoa/save':
        PessoaController::save();
    break;

    case '/pessoa/delete':
        PessoaController::delete();
    break;
    
    // PRODUTOS
    
    case '/produto/formulario':
        ProdutoController::form();
    break;

    case '/produto':
        ProdutoController::index();
    break;

    case '/produto/delete':
       ProdutoController::delete();
    break;

    case '/produto/save':
        ProdutoController::save();
    break;

    //CATEGORIA

    case '/categoria/form':
        CategoriaProdutoController::form();
    break;

    case '/categoria/save':
        CategoriaProdutoController::save();
    break;
    
    default:
        echo "erro 404";
    break;
}