<?php

namespace MVC\App\Controller\Pages;

use \MVC\Utils\view;  /* Usando a classe view*/
use MVC\App\Session\Admin\Login as SessionAdminLogin;

class index
{

    public static function GetIndex()
    {
        if (SessionAdminLogin::isLogged()) {
            return view::render('view_mobi/index', [
                'login' => view::render('view_mobi/User/LoggedMenu')
            ]);
        } else {
            return view::render('view_mobi/index', [
                'login' => view::render('view_mobi/User/LogoutMenu')
            ]);
        }
    }
}
