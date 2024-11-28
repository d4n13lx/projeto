<?php 

namespace MVC\App\Controller\Api;

use MVC\App\HTTP\Request;
use WilliamCosta\DatabaseManager\Pagination;

class Api 
{
    /**
     * Método responsável por retornar os detalhes da API
     * @param Request $request
     * @return array
     */
    public static function getDetails($request) 
    {
        return [
            'nome'   => 'Primeira Implementação de API',
            'versao' => 'v1.0.0',
            'autor'  => 'Guardirus'
        ];
    }

    /**
     * Método responsável por retornar os detalhes da Paginação
     * @param Request $request
     * @param Pagination $obPagination
     * @return array
     */
    protected static function getPagination($request, $obPagination) 
    {
        // Query Params
        $queryParams = $request->getQueryParams();

        // Pagina
        $pages = $obPagination->getPages();

        return[
            'paginaAtual' => isset($queryParams['pages']) ? (int)$queryParams['pages'] : 1,
            'quantidadePaginas' => !empty($pages) ? count($pages) : 1
        ];
    }
}
?>