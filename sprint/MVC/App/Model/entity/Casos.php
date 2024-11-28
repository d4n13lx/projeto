<?php

namespace MVC\App\Model\entity;
//Utilizamos a classe pelo william costa(importei a classe para o vs code)
use WilliamCosta\DatabaseManager\Database;

CLass Casos 
{   

    Public $id;

    public $bairro;

    public $Regiao;

    public $N_casos;
    /**
     * Metodo responsavel por retornar depoimentos 
     * @param string $where
     * @param string $order
     * @param string $limit
     * @param string $field
     * @return PDOStatement 
     */
    Public static function GetCasosBairro($where = '', $order = null, $limit = null, $field = '*' )
    {
        return (new Database('qtde_casos_bairros'))->Select(
        $where ,
        $order,
        $limit ,
        $field);
    }
    Public static function GetCasosRegiao($where = '', $order = null, $limit = null, $field = '*' )
    {
        return (new Database('qtde_casos_bairros'))->Select(
        $where ,
        $order,
        $limit ,
        $field);
    }

    public static function GetRegiaoRisco($where = '', $order = null, $limit = null, $field = '*')
    {
        return (new Database('regioes_risco'))->Select(
            $where ,
            $order,
            $limit ,
            $field);
    }


}

