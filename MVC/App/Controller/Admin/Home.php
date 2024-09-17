<?php

namespace MVC\App\Controller\Admin;

use MVC\Utils\view;

Class Home 
{
    /**
     * Metodo responsavel por renderizar a view de home do painel
     * @param Request
     * @return string
     */
   Public static function getHome($request)
   {
    //conteudo da home
        $content =  view::render('admin/modules/home/index');
        return $content;
   }
}
