<?php

namespace MVC\App\Controller\Admin;

use MVC\Utils\view;

Class Alert
{

    Public static function getErro($mensage)
    {
        return view::render('admin/alert/status',[
            'tipo' => 'erro',
            'mensagem' => $mensage
        ]
    );
    }

    Public static function getSucess($mensage)
    {
        return view::render('admin/alert/status',[
            'tipo' => 'success',
            'mensagem' => $mensage
        ]
    );
    }

}

?>