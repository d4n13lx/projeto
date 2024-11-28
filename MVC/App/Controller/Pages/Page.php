<?php

namespace MVC\App\Controller\Pages;

use MVC\Utils\view;
use MVC\App\HTTP\Request;
use WilliamCosta\DatabaseManager\Pagination;

class Page
{
    public static function getPagination($request, $obPagination)
    {
        $pages = $obPagination->getPages();

        // Retorna a quantidade de páginas
        if (count($pages) < 1) return '';

        // Links
        $links = '';

        // URL atual (Sem GETs)
        $url = $request->getRouter()->getCurrentUrl();

        // GETs
        $queryParams = $request->getQueryParams();

        // LIMITADOR DE BOTÕES VISÍVEIS
        $maxButtons = 10;
        $start = max(1, $obPagination->getCurrentPage() - floor($maxButtons / 2));
        $end = min($obPagination->getTotalPages(), $obPagination->getCurrentPage() + floor($maxButtons / 2));

        if (($end - $start) < $maxButtons) {
            if ($start == 1) {
                $end = min($start + $maxButtons - 1, $obPagination->getTotalPages());
            } elseif ($end == $obPagination->getTotalPages()) {
                $start = max($end - $maxButtons + 1, 1);
            }
        }

        // Adiciona botões "<<" e "<"
        if ($obPagination->getCurrentPage() > 1) {
            $queryParams['page'] = 1;
            $firstPageLink = $url . '?' . http_build_query($queryParams);
            $links .= view::render('Pagination/link', [
                'page' => '<<',
                'link' => $firstPageLink,
                'active' => ''
            ]);

            $queryParams['page'] = $obPagination->getCurrentPage() - 1;
            $prevPageLink = $url . '?' . http_build_query($queryParams);
            $links .= view::render('Pagination/link', [
                'page' => '<',
                'link' => $prevPageLink,
                'active' => ''
            ]);
        }

        // Renderiza os links das páginas entre início e fim
        for ($i = $start; $i <= $end; $i++) {
            $queryParams['page'] = $i;
            $link = $url . '?' . http_build_query($queryParams);
            $links .= view::render('Pagination/link', [
                'page' => $i,
                'link' => $link,
                'active' => $i == $obPagination->getCurrentPage() ? 'active' : ''
            ]);
        }

        // Adiciona botões ">" e ">>"
        if ($obPagination->getCurrentPage() < $obPagination->getTotalPages()) {
            $queryParams['page'] = $obPagination->getCurrentPage() + 1;
            $nextPageLink = $url . '?' . http_build_query($queryParams);
            $links .= view::render('Pagination/link', [
                'page' => '>',
                'link' => $nextPageLink,
                'active' => ''
            ]);

            $queryParams['page'] = $obPagination->getTotalPages();
            $lastPageLink = $url . '?' . http_build_query($queryParams);
            $links .= view::render('Pagination/link', [
                'page' => '>>',
                'link' => $lastPageLink,
                'active' => ''
            ]);
        }

        // Renderiza o box de paginação
        return view::render('Pagination/box', [
            'links' => $links
        ]);
    }
}
