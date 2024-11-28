<?php

namespace MVC\App\Controller\Pages;

use \MVC\Utils\view;  /* Usando a classe view*/
use MVC\App\Model\entity\Testimony as EntityTestimony;
use MVC\App\Model\entity\User as EntityUser;
use \MVC\App\Controller\Admin\Alert;

class Cadastro
{

    Private static function getStatus($request)
  {
    $queryparams = $request->getQueryParams();

    if(!isset($queryparams['status'])) return '';

    switch($queryparams['status'])
    {
      case 'created':
        return Alert::getSucess('Usuário Criado Com Sucesso');
        break;
      case 'updated':
        return Alert::getSucess('Usuário Atualizado com Sucesso');  
        break;
      case 'Duplicate':
        return Alert::getErro('Esse e-mail já está sendo utilizado');  
      case 'deleted':
        return Alert::getSucess('Usuário deletado com Sucesso');
    }
  }

    public static function Getcadastro($request)
    {
      // Retornar a página do cadastro
        return view::render('view_mobi/cadastro',[
         'status' =>  self::getStatus($request),
        ]);
    }

    public static function SetCadastro($request)
    {
    // 1- Vai pegar os campos "nome", "email" e "senha 
    // 2- Pesquisar o campo "email" no banco de dados
    // 3- Vai verificar se esse usuário já existe (caso exista retornar "usuário duplicado")
    // 4- O sistema vai fazer o hash da senha
    // 5- O sistema vai cadastrar o usuário no banco de dados
    // 6- Retornar o "usuário cadastrado na uri"


    //Variavel que armazena o post
    $postvars = $request->getPostVars();
     $nome = $postvars['nome'];
     $email = $postvars['email'];
     $senha = $postvars['senha'];

     $Obuser = EntityUser::getUserByEmail($email);
     //Se ele for uma instancia de usuário
     if($Obuser instanceof EntityUser)
     {
         $request->getRouter()->redirect('/cadastro?status=Duplicate');
     }

     $Obuser = new EntityUser();
     $Obuser->nome = $nome;
     $Obuser->email = $email;
     $Obuser->senha = password_hash($senha, PASSWORD_DEFAULT);
     $Obuser->CadastrarUser();
 
     //redirecionar a pagina de edição
     $request->getRouter()->redirect('/cadastro?status=created');
   
    }
}

?>