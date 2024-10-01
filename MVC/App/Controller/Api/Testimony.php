<?php 
namespace MVC\App\Controller\Api;

use MVC\App\Model\entity\Testimony as EntityTestimony;
use MVC\App\HTTP\Request;
use WilliamCosta\DatabaseManager\Pagination;

class Testimony extends Api 
{
    private static function getTestimonyItems($request, &$obPagination)
    {
    //Depoimentos
    $itens = [];

    //Quantidade Total de Registros
    $quantidadeTotal = EntityTestimony::GetTestimonies(null, null, null, 'COUNT(*) as qtd')->fetchObject()->qtd;
    //Pagina Atual
    $queryparams = $request->getQueryParams();
    $paginaAtual = $queryparams['page'] ?? 1;

    //Instancia de Pagination
    $obPagination = new Pagination($quantidadeTotal, $paginaAtual, 5);

    //Resultados da pagina
    $results = EntityTestimony::GetTestimonies(null, 'id DESC', $obPagination->getLimit());


    while ($obTestimony = $results->fetchObject(EntityTestimony::class)) {
      $itens[] = [
        'id'        => (int)$obTestimony->id,
        'nome'      => $obTestimony->nome,
        'mensagem'  => $obTestimony->mensagem,
        'data'      => $obTestimony->data
      ];
    }

    //Retorna os depoimentos
    return $itens;
  }

     /**
     * Método responsável por retornar os depoimentos cadastrados
     * @param Request $request
     * @return array
     */
    public static function getTestimonies($request) 
    {
        return [
            'depoimentos' => [self::getTestimonyItems($request, $obPagination)],
            'paginacao' => parent::getPagination($request, $obPagination)
        ];
    }

    /**
     * Método responsável por retornar o detalhe de um depoimento
     * @param Request $request
     * @param integer $id
     * @return array
     */
    public static function getTestimony($request, $id)
    {
      // Busca depoimento
      $obTestimony = EntityTestimony::GetTestimonnybyid($id);
      
      // Valida se o depoimento existe
      //if(!$obTestimony) // Video 7 28:27
    }
}
?>