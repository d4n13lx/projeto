<?php

namespace MVC\App\Controller\Pages;

use MVC\Utils\view;

Class Page
{
    /**
     * Metodo responsavel por renderizar o layoult da paginação
     * @param Request $request
     * @param Pagination $obPagination
     * @return string
     */
    public static function getPagination($request, $obPagination)
    {
        $pages = $obPagination->getPages();

        //Retorna a quantidade de paginas
        if (count($pages) < 1) return '';

        //Links 
        $links = '';

        //Url atual (Sem Gets)
        $url = $request->getRouter()->getCurrentUrl();

        //Gets
        $queryParams = $request->getQueryParams();

        //Renderizar os links
        foreach ($pages as $page) {
            //Altera a pagina
            $queryParams['page'] = $page['page'];

            //link
            $link = $url . '?' . http_build_query($queryParams);

            //View
            $links .= view::render('Pagination/link', [
                'page' => $page['page'],
                'link' => $link,
                'active' => $page['current'] ? 'active' : ''
            ]);
        }

        //rendereiza Box de paginação
        return view::render('Pagination/box', [
            'links' => $links
        ]);
    }
}
