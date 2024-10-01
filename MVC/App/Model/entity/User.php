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
     * Metodo responsavel por retornar depoimentos 
     * @param string $where
     * @param string $order
     * @param string $limit
     * @param string $field
     * @return PDOStatement 
     */
    Public static function getUsers($where = '', $order = null, $limit = null, $field = '*' )
    {
        return (new Database('user_form'))->Select(
        $where ,
        $order,
        $limit ,
        $field);
    }

    
    /**
     * Metodo responsavel por retornar depoimentos 
     * @param string $where
     * @param string $order
     * @param string $limit
     * @param string $field
     * @return PDOStatement 
     */
    Public static function GetTestimonies($where = '', $order = null, $limit = null, $field = '*' )
    {
        return (new Database('depoimentos'))->Select(
        $where ,
        $order,
        $limit ,
        $field);
    }

     /**
     * Método responsável por buscar um usuário pelo e-mail
     * @param string $email
     * @return User|null
     */
    public static function getUserByEmail($email)
    {
        // Pesquisa no banco de dados o email do usuario
        return (new Database('user_form'))->select('email = "'.$email.'"')->fetchObject(self::class);
    }

    public static function getUserById($id)
    {
        return self::getUsers('id = '.$id)->fetchObject(self::class);
    }

    public function excluirUser()
    {
        return (new Database('user_form'))->delete('id ='.$this->id);
    }

    public function CadastrarUser()
    {
        // Cadastrar o usuario no banco de dados
       $this->id = (new Database('user_form'))->insert([
        'nome'=> $this->nome,
        'email'=>$this->email,
        'senha'=>$this->senha
       ]);
       return true;
    
    }
}
?>