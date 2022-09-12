<?php

spl_autoload_register(function ($classe_buscada)
{
    echo "Foi buscar a classe: " . $classe_buscada;
    echo "<hr />";

    $arquivo = BASEDIR . '/' . $classe_buscada. '.php';

    if(file_exists($arquivo)){
        include $arquivo;
    }
    else
        exit('Arquivo não encontrado. Arquivo: ' . $arquivo . "<br />");

    //include '../' . $classe_buscada . "<br />";
    
    /*$arquivo_controller = "Controller/" . $classe_buscada . ".php";
    $arquivo_model = "Model/" . $classe_buscada . ".php";
    $arquivo_dao = "DAO/" . $classe_buscada . "php";

    if(file_exists($arquivo_controller))
        include $arquivo_controller;

    else if(file_exists($arquivo_model))
        include $arquivo_model;

    else if(file_exists($arquivo_dao))
        include $arquivo_dao;  
    */
   
});

?>