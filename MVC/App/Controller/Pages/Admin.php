<?php

namespace MVC\App\Controller\Pages;

use \MVC\Utils\view;  /* Usando a classe view*/

class Admin
{

    public static function GetAdmin()
    {
        return view::render('Admin');
    }
}