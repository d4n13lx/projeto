<?php

namespace MVC\App\HTTP\Middleware;

Class Maintenence
{
    /**
     * Metodo Resnposavel por executar o Middleware
     * @param Request
     * @param Closure
     * @return Response
     */
    Public function handle($request,$next)
    {
        //Verifica o estado de manuteção da pagina
        if(getenv('MAINTENENCE') == 'true')
        {
            throw new \Exception("A pagina em manuntenção. Tente Novamente Mais Tarde", 200);
            
        }
           //Executa o proximo nivel do Middleware
          //pq na Classe Queue definimos um argumento de $request para o $next
          return $next($request);
    }
}
?>