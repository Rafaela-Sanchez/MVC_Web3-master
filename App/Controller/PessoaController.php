<?php

/**
 * Classes Controller processam as requisições do usuário.
 * Se um usuário chama uma rota, um método (função) de uma classe Controller é chamado.
 * O método pode devolver uma View ou acessar uma Model, redirecionando o usuário de rota 
 * ou chamar outra Controller.
 */

 namespace App\Controller;
 use App\Model\PessoaModel;

class PessoaController 
{
    
     // O index (método) devolve uma View.

    public static function index() 
    {
        //include 'Model/PessoaModel.php'; // inclusão do arquivo model.
        
        $model = new PessoaModel(); //Instância da Model
        $model->getAllRows();       //Obtendo todos os registros, abastecendo a propriedade $rows da model.

        //include 'View/modules/Pessoa/ListaPessoas.php'; 
        // Include da View, propriedade $rows da Model pode ser acessada na View
    }

  
    //Devolve uma View com um formulário.

    public static function form()
    {
        //include 'View/modules/Pessoa/FormPessoa.php';
    }

     //Preenche um Model para enviar ao banco de dados e salvar.
     
    public static function save() {

        //include 'Model/PessoaModel.php';

        // Propriedades do objeto sendo abastecida com os dados informados
        // pelo usuário no formulário (note o envio via POST)

        $pessoa = new PessoaModel();
        $pessoa->nome = $_POST['nome'];
        $pessoa->rg = $_POST['rg'];
        $pessoa->cpf = $_POST['cpf'];
        $pessoa->data_nascimento = $_POST['data_nascimento'];
        $pessoa->email = $_POST['email'];
        $pessoa->telefone = $_POST['telefone'];
        $pessoa->endereco = $_POST['endereco'];

        $pessoa->save();  // chamando o método save da model.

        header("Location: /pessoa"); // redirecionando o usuário para outra rota.
    }

    // Método para tratar a rota delete. 

    public static function delete()
    {
        //include 'Model/PessoaModel.php';

        $model = new PessoaModel();

        $model->delete( (int) $_GET['id'] ); // Enviando a variável $_GET como inteiro para o método delete

        header("Location: /pessoa");         //redirecionando o usuário para outra rota.
    }
}