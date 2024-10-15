<?php

namespace MVC\App\Model\entity;

use PDOStatement;
use WilliamCosta\DatabaseManager\Database;

class Testimony
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
    public $mensagem;
    /**
     * Data de quando comentou
     * @var string
     */
    public $data;

    /**
     * Metodo responsavel por cadastrar a instancia atual no banco de dados
     * @return boolean
     */
    public function Cadastrar()
    {

        //Data do momento da publicação
        $this->data = date('y-m-d h:i:s');
        //Insere os dados de Post na tabela de depoimentos(Nos campos Nome,Mensagem e Data)
        $this->id = (new Database('depoimentos'))->insert([
            'nome' => $this->nome,
            'mensagem' => $this->mensagem,
            'data' => $this->data

        ]);
        //Retornar sucesso(Caso a inserção de dados seja concluida)
        return true;
    }

    /**
     * Metodo responsavel por retornar depoimentos 
     * @param string $where
     * @param string $order
     * @param string $limit
     * @param string $field 
     */
    Public static function GetTestimonies($where = '', $order = null, $limit = null, $field = '*' )
    {
        return (new Database('depoimentos'))->select(
        $where,
        $order,
        $limit,
        $field);
    }

    Public static function GetTestimonnybyid($id)
    {
        // Aqui a função deve retornar o resultado do select, sem tentar usar fetchObject diretamente
        return self::GetTestimonies('id = ' . $id)->fetchObject(self::class);
    }

    Public function atualizar()
    {

       return (new Database('depoimentos'))->update('id ='.$this->id,[
          'nome' => $this->nome,
          'mensagem'=> $this->mensagem
       ]);
    }

    Public function excluir()
    {
       return (new Database('depoimentos'))->delete('id ='.$this->id);
    }
    
}
?>
