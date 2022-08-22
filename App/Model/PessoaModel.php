<?php

namespace App\Model;

use App\DAO\PessoaDAO;

class PessoaModel
{
    
    // Declaração das propriedades conforme campos da tabela no banco de dados.
     
    public $id, $nome, $rg, $cpf;
    public $data_nascimento, $email;
    public $telefone, $endereco;

    // Armazena o array vindo da DAO com todos os itens vindo da tabela.

    public $rows;


    //Método save: chamará a DAO para gravar no banco de dados o model preenchido.

    public function save()
    {
        include 'DAO/PessoaDAO.php';

        $dao = new PessoaDAO();

        // Se id for nulo, significa que trata-se de um novo registro
        // caso contrário, é um update poque a chave primária já existe.

        if($this->id == null) 
        {
            // Estamos enviando o proprio objeto model para o insert, por isso do this
            $dao->insert($this);
        } else {
            // update
        }
    }

    //Retorna todos os registros.

    public function getAllRows()
    {
        // incluindo o arquivo PessoaDAO.php
        include 'DAO/PessoaDAO.php';

        // Instanciando a classe PessoaDAO
        $dao = new PessoaDAO();

        // Obtendo todos os registros vindos de getAllRows e guardando
        // na propriedade $rows

        $this->rows = $dao->getAllRows();
    }
    

    /**
     * Método que encapsula o acesso ao método selectById da camada DAO
     * O método recebe um parâmetro do tipo inteiro que é o id do registro
     * a ser recuperado do MySQL, via camada DAO.
     */
    public function getById(int $id)
    {
        include 'DAO/PessoaDAO.php'; 

        $dao = new PessoaDAO();

        $obj = $dao->selectById($id); // Obtendo um model preenchido da camada DAO

        return ($obj) ? $obj : new PessoaModel(); // Operador Ternário

        /*if($obj)
        {
            return  $obj;
        } else {
            return new PessoaModel();
        }*/
    }


    /**
     * Método que encapsula o acesso a DAO do método delete.
     * O método recebe um parâmetro do tipo inteiro que é o id do registro
     * que será excluido da tabela no MySQL, via camada DAO.
     */

    public function delete(int $id)
    {
        include 'DAO/PessoaDAO.php'; 

        $dao = new PessoaDAO();

        $dao->delete($id);
    }
}