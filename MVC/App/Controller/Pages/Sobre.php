<?php

namespace MVC\App\Controller\Pages;

use \MVC\Utils\view;  /* Usando a classe view*/
use MVC\App\Session\Admin\Login as SessionAdminLogin;


class Sobre
{

    public static function GetSobre()
    {
        $isLoggedIn = SessionAdminLogin::isLogged();
        return view::render('view_mobi/sobre', [
            'login' => $isLoggedIn ? view::render('view_mobi/User/LoggedMenu') : view::render('view_mobi/User/LogoutMenu')
        ]);
    }
}