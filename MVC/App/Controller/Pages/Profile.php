<?php

namespace MVC\App\Controller\Pages;

use \MVC\Utils\view;  /* Usando a classe view*/
use MVC\App\Session\Admin\Login as SessionAdminLogin;
use MVC\App\Model\entity\Profile as EntityProfile;
use MVC\App\Model\entity\Testimony as EntityTestimony;
use WilliamCosta\DatabaseManager\Pagination;

class Profile extends Page
{
    private static function GetMyDepoimentos($id, $request)
    {
        $itens = '';
        
        // Contar a quantidade total de depoimentos do usuário
        $quantidadeTotal = EntityTestimony::GetTestimonies('user_id = "' . $id . '"', null, null, 'COUNT(*) as qtd')->fetchObject()->qtd;

        $queryparams = $request->getQueryParams();
        $paginaAtual = $queryparams['page'] ?? 1;

        // Inicializa o objeto de paginação com 3 itens por página
        $obPagination = new Pagination($quantidadeTotal, $paginaAtual, 3);
        
        // Recuperar os depoimentos limitados ao número de itens por página
        $results = EntityTestimony::GetTestimonies('user_id = "' . $id . '"', 'id DESC', $obPagination->getLimit());
        
        while ($obTestimony = $results->fetchObject(EntityTestimony::class)) {
            $itens .= view::render('view_mobi/Profile/Testimony/item', [
                'nome' => $obTestimony->nome,
                'mensagem' => $obTestimony->mensagem,
                'data' => date('d/m/y - H:i:s', strtotime($obTestimony->data))
            ]);
        }
        return $itens;
    }
  
    public static function GetProfile($request)
    {
        session_start();
        $id = $_SESSION['id_usuario'];
        $nome = $_SESSION['nome_usuario'];
        $email = $_SESSION['email_usuario'];

        // Obter a quantidade total de depoimentos para a paginação
        $quantidadeTotal = EntityTestimony::GetTestimonies('user_id = "' . $id . '"', null, null, 'COUNT(*) as qtd')->fetchObject()->qtd;
        
        // Inicializa a paginação com a quantidade total e 3 itens por página
        $obPagination = new Pagination($quantidadeTotal, $request->getQueryParams()['page'] ?? 1, 3);

        return view::render('view_mobi/Profile/Perfil', [
            'id' => $id,
            'nome' => $nome,
            'email' => $email,
            'depoimentos' => self::GetMyDepoimentos($id, $request),
            'pagination' => parent::getPagination($request, $obPagination)
        ]);
    }

    public static function UpdateProfile($request)
    {
        session_start();
        $id = $_SESSION['id_usuario'];
        $obProfile = EntityProfile::GetProfileByID($id);

        if (!$obProfile instanceof EntityProfile) {
            $request->getRouter()->redirect('/Profile/?status=empty');
        }

        $postvars = $request->getPostVars();

        $nome = $postvars['nome'];
        $email = $postvars['email'];
        $senha = $postvars['senha'];

        $obProfile->nome = $nome ?? $obProfile->nome;
        $obProfile->email = $email ?? $obProfile->email; 
        $obProfile->senha = password_hash($senha, PASSWORD_DEFAULT) ?? $obProfile->senha; 
        $obProfile->atualizar();

        $_SESSION['nome_user'] = $obProfile->nome;
        $_SESSION['email_user'] = $obProfile->email;

        // Redirecionar para a página de edição
        $request->getRouter()->redirect('/profile?status=Updated');
    }
}