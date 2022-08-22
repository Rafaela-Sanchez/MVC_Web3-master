<?php

namespace App\DAO;

/**
 * a classe precisa incluir uma classe de outro subnamespace
 * no caso a classe PessoaModel do subnamespace Model
 */


use App\Model\PessoaModel;
use \PDO;

/**
 * \PDO puxa o arquivo da pasta PHP
 */


/**
 * As classes DAO (Data Access Object) executam os SQL junto ao banco de dados.
 */

class PessoaDAO
{
    /**
     * Atributo (ou Propriedade) da classe destinado a armazenar o link (vínculo aberto)
     * de conexão com o banco de dados.
     */

    private $conexao;


    /**
     * Método construtor, sempre chamado na classe quando a classe é instanciada.
     * Exemplo de instanciar classe (criar objeto da classe):
     * $dao = new PessoaDAO();
     * Neste caso, assim que é instânciado, abre uma conexão com o MySQL (Banco de dados)
     * A conexão é aberta via PDO (PHP Data Object) que é um recurso da linguagem para
     * acesso a diversos SGBDs.
     */

    function __construct() 
    {
        // DSN (Data Source Name) onde o servidor MySQL será encontrado
        // (host) em qual porta o MySQL está operado e qual o nome do banco pretendido. 
        $dsn = "mysql:host=localhost:3307;dbname=db_sistema";
        $user = "root";
        $pass = "etecjau";
        
        // Criando a conexão e armazenado na propriedade definida para tal.
        $this->conexao = new PDO($dsn, $user, $pass);
    }

    /**
     * Método que recebe um model e extrai os dados do model para realizar o insert
     * na tabela correspondente ao model.
     */

    function insert(PessoaModel $model) 
    {
        // Trecho de código SQL com marcadores ? para substituição posterior, no prepare   
        $sql = "INSERT INTO pessoa 
                (nome, rg, cpf, data_nascimento, email, telefone, endereco) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        
        /** 
         * Variável stmt: montagem da consulta. 
         * Observe que estamos acessando o método prepare dentro da propriedade que guarda a conexão
         * com o MySQL, via operador seta "->". Isso significa que o prepare "está dentro"
         *  da propriedade $conexao e recebe nossa string sql com os devidor marcadores.
         */

        $stmt = $this->conexao->prepare($sql);

        /** 
         * bindValue: recebem um valor e troca em uma determinada posição
         * Ex: o valor que está em 3, será trocado pelo terceiro ?
         * No que o bindValue está recebendo o model que veio via parâmetro e acessamos
         * via seta qual dado do model queremos pegar para a posição em questão.
        */

        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->rg);
        $stmt->bindValue(3, $model->cpf);
        $stmt->bindValue(4, $model->data_nascimento);
        $stmt->bindValue(5, $model->email);
        $stmt->bindValue(6, $model->telefone);
        $stmt->bindValue(7, $model->endereco);
        
        // Executamos a consulta.
        $stmt->execute();      
    }

    public function update(PessoaModel $model)
    {
        $sql = "UPDATE pessoa SET nome=?, cpf=?, data_nascimento=?, WHERE id=?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->cpf);
        $stmt->bindValue(3, $model->data_nascimento);
        $stmt->bindValue(4, $model->id);
        $stmt->execute();
    }

    public function getAllRows()
    {
        // Instrução SQL a ser consultada no banco de dados.
        $sql = "SELECT * FROM pessoa ";

        // Preparando o SQL para ser executado.
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute(); // Executando a SQL preparada.

        return $stmt->fetchAll(PDO::FETCH_CLASS); 

        /**  Retornando todas as linhas obtidas na consulta.
         * É retornado um array associativo, uma estrutura
         * chave-valor
        */
    }

    public function select()
    {
        $sql = "SELECT * FROM pessoa ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        // Retorna um array com as linhas retornadas da consulta.
        // É um array de objetos. 
        // Os objetos são do tipo stdClass e 
        // foram criados automaticamente pelo método fetchAll do PDO.

        return $stmt->fetchAll(PDO::FETCH_CLASS);        
    }

    public function selectById(int $id)
    {
        include_once 'Model/PessoaModel.php';

        $sql = "SELECT * FROM pessoa WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("PessoaModel"); // Retornando um objeto específico PessoaModel
    }

    /**
     * Remove um registro da tabela pessoa do banco de dados.
     * Note que o método exige um parâmetro $id do tipo inteiro.
     */
    public function delete(int $id)
    {
        $sql = "DELETE FROM pessoa WHERE id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }
}