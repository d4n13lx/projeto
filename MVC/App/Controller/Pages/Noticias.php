<?php


namespace MVC\App\Controller\Pages;

use MVC\App\Model\entity\Casos as entitycasos;
use MVC\Utils\view;
use WilliamCosta\DatabaseManager\Pagination;
use MVC\App\Controller\Pages\Page;
use MVC\App\Session\Admin\Login as SessionAdminLogin;

class Noticias
{
    


    public static function GetNoticias($request)
    {
        // Instância da paginação
        $obPagination = new Pagination(0, 1, 3);

        $isLoggedIn = SessionAdminLogin::isLogged();
        return view::render('view_mobi/noticias',[
            'login' => $isLoggedIn ? view::render('view_mobi/User/LoggedMenu') : view::render('view_mobi/User/LogoutMenu'),
            'card' => self::getRR($request,$obPagination)
        ]
    );
    }

    private static function getRR($request,$obPagination)
    {
        $dados = '';

        // Quantidade Total de Registros - Aplica o filtro de 'Regiao' se for necessário
        $quantidadeTotal = entitycasos::GetRegiaoRisco(null, null, null, 'COUNT(*) as qtd',)->fetchObject()->qtd;

        // Página Atual
        $queryparams = $request->getQueryParams();
        $paginaAtual = $queryparams['page'] ?? 1;

        // Atualiza a instância de Pagination com a quantidade total e a página atual
        $obPagination = new Pagination($quantidadeTotal, $paginaAtual, 3);

        // Consulta para buscar casos, ordenando por N_casos DESC - Aplica o filtro de 'Regiao'
        $Casos = entitycasos::GetRegiaoRisco(null, 'N_casos DESC', $obPagination->getLimit());

        while ($ObCasos = $Casos->fetchObject(entitycasos::class)) {
            $dados .= view::render('view_mobi/Card-Regiao-Risco/Regiao_Risco', [
                'InfoRegiao' => $ObCasos->Regiao,
                'info' => $ObCasos->N_casos
            ]);
        }

        return empty($dados) ? "Nenhum caso encontrado." : $dados; // Mensagem padrão se não houver dados
 
    }
}
?>