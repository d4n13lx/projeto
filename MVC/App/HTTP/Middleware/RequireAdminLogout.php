<?php

namespace MVC\App\HTTP\Middleware;
use MVC\App\Session\Admin\Login as SessionAdminLogin;
Class RequireAdminLogout
{
     /**
     * Metodo Resnposavel por executar o Middleware
     * @param Request
     * @param Closure
     * @return Response
     */
    Public function handle($request,$next)
    {
        //Verifica se o usuário está logado
        if(SessionAdminLogin::isLogged())
        {
            //Redireciona o usuário para o home do Admin
        $request->getRouter()->redirect('/admin');
        }

     //Continua a execução
     return $next($request);

    }
}

?>