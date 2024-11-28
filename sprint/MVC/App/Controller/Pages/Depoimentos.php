<?php
namespace MVC\App\Controller\Pages;
use \MVC\Utils\view;  
use MVC\App\Model\entity\Testimony as EntityTestimony; 
use MVC\App\HTTP\Request;
use WilliamCosta\DatabaseManager\Pagination;
use MVC\App\Session\Admin\Login as SessionAdminLogin;
date_default_timezone_set('America/Sao_Paulo');
class depoimentos extends Page
{
    private static function GetTestimoniesitens($request, &$obPagination)
    {
        $itens = '';
        $quantidadeTotal = EntityTestimony::GetTestimonies(null, null, null, 'COUNT(*) as qtd')->fetchObject()->qtd;
        $queryparams = $request->getQueryParams();
        $paginaAtual = $queryparams['page'] ?? 1;
        $obPagination = new Pagination($quantidadeTotal, $paginaAtual, 4);
        $results = EntityTestimony::GetTestimonies(null, 'id DESC', $obPagination->getLimit());
        
        while ($obTestimony = $results->fetchObject(EntityTestimony::class)) {
            $itens .= view::render('Testimony/item', [
                'nome' => $obTestimony->nome,
                'mensagem' => $obTestimony->mensagem,
                'data' => date('d/m/y - H:i:s', strtotime($obTestimony->data))
            ]);
        }
        return $itens;
    }
    public static function GetDepoimentos($request)
{
    $obPagination = null;
    session_start();
    
    // Verifica se a sessão está ativa e se a chave 'nome_user' está definida
    $nome = isset($_SESSION['nome_usuario']) ? $_SESSION['nome_usuario'] : '';
    $itens = self::GetTestimoniesitens($request, $obPagination);
    $pagination = parent::getPagination($request, $obPagination);
    
    // Determinar se o usuário está logado
    $isLoggedIn = SessionAdminLogin::isLogged();
    return view::render('view_mobi/depoimentos', [
        'itens' => $itens,
        'pagination' => $pagination,
        'login' => $isLoggedIn ? view::render('view_mobi/User/LoggedMenu') : view::render('view_mobi/User/LogoutMenu'),
        'nome' => $isLoggedIn ? $nome : '', // Define o nome se estiver logado
        'var' => $isLoggedIn ? 'disabled' : '' // Desabilita o campo se logado
    ]);
}
    public static function InsertTestimony($request)
    {
        $postVars = $request->getPostVars();
        if(!SessionAdminLogin::isLogged())
        {
            $obTestimony = new EntityTestimony();
            $obTestimony->nome = $postVars['nome'];
            $obTestimony->mensagem = $postVars['mensagem'];
            $obTestimony->user_id = 0;
            $obTestimony->Cadastrar();
        }
        else 
        {

            $user_id = $_SESSION['id_usuario'];
            $obTestimony = new EntityTestimony();
            $obTestimony->nome =  $_SESSION['nome_usuario'];
            $obTestimony->mensagem = $postVars['mensagem'];
            $obTestimony->user_id = $user_id;
            $obTestimony->Cadastrar();
        }
        header('Location: http://localhost/sprint/depoimentos');
        exit;
    }
}