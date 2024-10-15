<?php

namespace MVC\App\Model\entity;

use PDOStatement;
use WilliamCosta\DatabaseManager\Database;

class Profile 
{
    /**
     * ID do comentario
     * @var integer
     */
    public $id;
    /**
     * Nome de quem comentou  
     * @var string
     */
    public $nome;
    /**
     * Mensagem que a pessoa comentou
     * @var string
     */
    public $email;
    /**
     * Data de quando comentou
     * @var string
     */
    public $senha;


    /**
     * Metodo responsavel por retornar Perfil 
     * @param string $where
     * @param string $order
     * @param string $limit
     * @param string $field 
     */
    Public static function GetProfile($where = '', $order = null, $limit = null, $field = '*' )
    {
        return (new Database('user_form'))->select(
        $where,
        $order,
        $limit,
        $field);
    }

    Public static function GetProfileByID($id)
    {
        // Aqui a função deve retornar o resultado do select, sem tentar usar fetchObject diretamente
        return self::GetProfile('id = ' . $id)->fetchObject(self::class);
    }

    Public function atualizar()
    {

       return (new Database('user_form'))->update('id ='.$this->id,[
          'nome' => $this->nome,
          'email'=> $this->email,
          'senha'=> $this->senha
       ]);
    }
}

?>