<?php

namespace MVC\App\Controller\Pages;

use \MVC\Utils\view;  /* Usando a classe view*/

class Home
{

    public static function GetHome()
    {
        return view::render('Home');
    }
}
