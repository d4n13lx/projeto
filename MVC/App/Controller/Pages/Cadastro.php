<?php

namespace MVC\App\Controller\Pages;

use \MVC\Utils\view;  /* Usando a classe view*/

class Cadastro
{

    public static function GetCadastro()
    {
        return view::render('cadastro');
    }
}

?>