<?php

namespace MVC\App\Controller\Pages;

use MVC\App\Model\entity\Casos as entitycasos;
use MVC\Utils\view;
use WilliamCosta\DatabaseManager\Pagination;
use MVC\App\Controller\Pages\Page;
use MVC\App\Session\Admin\Login as SessionAdminLogin;

include_once __DIR__ . '/Regiao.php'; // Inclui a função getPostVars

class Casos
{
    public static function GetCasos($request)
    {
        // Verifica se há uma requisição POST e captura 'regiao'
        $Filtro = $_SESSION['Regiao'] ?? ''; // Captura a região armazenada na sessão



        // Instância da paginação
        $obPagination = new Pagination(0, 1, 30); // Inicializa com valores padrão, será atualizado mais tarde

        // Determinar se o usuário está logado
        $isLoggedIn = SessionAdminLogin::isLogged();


        // Renderiza toda a página, inicializando o conteúdo com a região filtrada se disponível
        return view::render('view_mobi/casos', [
            'mapa' => view::render('view_mobi/mapa/mapa'),
            'Content' => self::GetContent($request, $obPagination, $Filtro), // Passa a região filtrada
            'pagination' => Page::getPagination($request, $obPagination), // Chama o método da classe Page
            'regiao' => $Filtro,
            'login' => $isLoggedIn ? view::render('view_mobi/User/LoggedMenu') : view::render('view_mobi/User/LogoutMenu')
        ]);
    }

    private static function GetContent($request, &$obPagination, $regiao)
    {
        $dados = '';

        // Verifica se a região foi filtrada via sessão e aplica filtro se necessário
        $filtroRegiao = $regiao ? "Regiao = '$regiao'" : null;

        // Quantidade Total de Registros - Aplica o filtro de 'Regiao' se for necessário
        $quantidadeTotal = entitycasos::GetCasosBairro($filtroRegiao, null, null, 'COUNT(*) as qtd')->fetchObject()->qtd;

        // Página Atual
        $queryparams = $request->getQueryParams();
        $paginaAtual = $queryparams['page'] ?? 1;

        // Atualiza a instância de Pagination com a quantidade total e a página atual
        $obPagination = new Pagination($quantidadeTotal, $paginaAtual, 30);

        // Consulta para buscar casos, ordenando por N_casos DESC - Aplica o filtro de 'Regiao'
        $Casos = entitycasos::GetCasosBairro($filtroRegiao, 'N_casos DESC', $obPagination->getLimit());

        while ($ObCasos = $Casos->fetchObject(entitycasos::class)) {
            $dados .= view::render('view_mobi/Content_casos/Content', [
                'Bairro' => $ObCasos->bairro,
                'regiao' => $ObCasos->Regiao,
                'casos' => $ObCasos->N_casos
            ]);
        }

        return empty($dados) ? "Nenhum caso encontrado." : $dados; // Mensagem padrão se não houver dados
    }

}
