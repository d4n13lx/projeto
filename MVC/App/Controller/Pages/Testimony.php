<?php

namespace MVC\App\Controller\Pages;

use MVC\Utils\view;  
use MVC\App\Model\entity\Testimony as EntityTestimony; 
use MVC\App\HTTP\Request;
use WilliamCosta\DatabaseManager\Pagination;

date_default_timezone_set('America/Sao_Paulo');

class Testimony extends Page
{
    /**
     * Metodo responsavel por obter a renderização dos itens de depoimentos para a pagina
     * @param Request $request
     * @param Pagination $obPagination
     * @return string
     */
    private static function GetTestimoniesitens($request, &$obPagination)
    {
        //Depoimentos
        $itens = '';

        //Quantidade Total de Registros
        $quantidadeTotal = EntityTestimony::GetTestimonies(null, null, null, 'COUNT(*) as qtd')->fetchObject()->qtd;

        //Pagina Atual
        $queryparams = $request->getQueryParams();
        $paginaAtual = $queryparams['page'] ?? 1;

        //Instancia de Pagination
        $obPagination = new Pagination($quantidadeTotal, $paginaAtual, 3);
        //Resultados da pagina
        $results = EntityTestimony::GetTestimonies(null, 'id DESC', $obPagination->getLimit());
        
        
        while ($obTestimony = $results->fetchObject(EntityTestimony::class)) {
            $itens .= view::render('Testimony/item', [
                'nome' => $obTestimony->nome,
                'mensagem' => $obTestimony->mensagem,
                'data' => date('d/m/y - H:i:s', strtotime($obTestimony->data))
            ]);
        }
        //Retorna os depoimentos
        return $itens;
    }

    /**
     * Renderizei a pagina 
     * @param Request $request
     */
    public static function GetTestimonies($request)
    {
        $obPagination = null;
        return view::render('depoimentos', [
            'itens' => self::GetTestimoniesitens($request, $obPagination),
            'pagination' => parent::getPagination($request, $obPagination)
        ]);
    }

    /**
     * Metodo responsavel por inserir um depoimento
     * @param Request $request
     * @return string
     */
    public static function InsertTestimony($request)
    {
        //Dados da Post(O que foi armazenado nas inputs dos formularios)
        $postVars = $request->getPostVars();

        //Nova instância de Testimony(Entity)
        $obTestimony = new EntityTestimony();
        $obTestimony->nome = $postVars['nome'];
        $obTestimony->mensagem = $postVars['mensagem'];
        $obTestimony->Cadastrar();

        // Redirecionar para a página de depoimentos
        header('Location: http://localhost/sprint/depoimentos');
        exit;
    }
}
?>
