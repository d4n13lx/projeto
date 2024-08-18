<?php

namespace MVC\App\HTTP\Middleware;
use MVC\App\Session\Admin\Login as SessionAdminLogin;
Class RequireAdminLogin
{
     /**
     * Metodo Resnposavel por executar o Middleware
     * @param Request
     * @param Closure
     * @return Response
     */
    Public function handle($request,$next)
    {
        //Verifica se o usuário não está logado
        if(!SessionAdminLogin::isLogged())
        {
            //Redireciona o usuário para a pagina de login
        $request->getRouter()->redirect('/admin/login');
        }

     //Continua a execução
     return $next($request);
    }
}

?>