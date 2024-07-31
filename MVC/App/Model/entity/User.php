<?php

namespace MVC\App\Model\entity;
//Utilizamos a classe pelo william costa(importei a classe para o vs code)
use WilliamCosta\DatabaseManager\Database;

CLass User 
{

    /**
     * Id do usuario
     * @var integer
     */
    Public $id;

    /**
     * nome do usuário
     * @var string
     */
    Public $nome;

    /**
     * email do usuário
     * @var string
     */
    Public $email;

    /**
     * senha do usuário
     * @var string
     */
    Public $senha;

    /**
     * Metodo responsável por retornar um usuário com base no seu e-mail
     * @param string $email
     * @return User
     */
    Public static function getUserByEmail($email)
    {
        //Retorna da tabela user_form os usuários com os emails cadastrados no banco
      return (new Database('user_form'))->select('email = "'.$email.'"')->fetchObject(self::class);
    }
}
?>