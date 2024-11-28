<?php

namespace MVC\App\Controller\Pages;

use \MVC\Utils\view;  /* Usando a classe view*/
use \MVC\App\Model\entity\Casos;
use \MVC\App\HTTP\Response;
use WilliamCosta\DatabaseManager\Pagination;

Class Bairro extends Page
{

    private static function GetContent($request, & $obPagination)
    {
        $dados = '';
        //Quantidade Total de Registros
        $quantidadeTotal = Casos::GetCasosBairro(null, null, null, 'COUNT(*) as qtd')->fetchObject()->qtd;

        //Pagina Atual
        $queryparams = $request->getQueryParams();
        $paginaAtual = $queryparams['page'] ?? 1;

        //Instancia de Pagination
        $obPagination = new Pagination($quantidadeTotal, $paginaAtual, 30);
        
        $Casos =  Casos::GetCasosBairro(null, 'id ASC', $obPagination->getLimit());

        while ($ObCasos = $Casos->fetchObject(Casos::class))
        {
            $dados .= view::render('view_mobi/Content_casos/Content',[
                'Bairro' => $ObCasos->bairro,
                'regiao' => $ObCasos->Regiao,
                'casos'=> $ObCasos->N_casos
            ]);
        }
        return $dados;
    }

    public static function GetDengue($request)
    {
        return view::render('view_mobi/arboviroses',[
            'title' => 'Bairros',
            'Content'=> self::GetContent($request, $obPagination),
            'pagination'=> parent::getPagination($request, $obPagination)
        ]);
    }
}


?>