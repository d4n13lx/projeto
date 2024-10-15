<?php

namespace MVC\App\Controller\Admin;

use \MVC\Utils\view;  /* Usando a classe view*/

//Renderização da página de home do Admin
class Admin
{

    public static function GetAdmin()
    {
        return view::render('Admin/Admin');
    }
    
}