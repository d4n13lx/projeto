<?php

namespace MVC\App\Controller\Admin;

use MVC\Utils\view;
use MVC\App\Model\entity\User;
use MVC\App\Session\Admin\Login as SessionAdminLogin;
use MVC\App\HTTP\Request;
use WilliamCosta\DatabaseManager\Database;

class Login
{
    /**
     * Summary of getLogin
     * @param Request $request
     * @param string $errorMessage
     * @return string
     */
    public static function getLogin($request, $errorMessage = null)
    {
        $status = !is_null($errorMessage) ? view::render('admin/login/status', [
            'mensagem' => $errorMessage
        ]) : '';

        return view::render('admin/login', [
            'status' => $status
        ]);
    }
    public static function setLogin($request)
    {
        // Post Vars (O que foi armazenado no Post do forms)
        $PostVars = $request->getPostVars();
        $email = $PostVars['email'] ?? '';
        $senha = $PostVars['senha'] ?? '';

        // Busca o usuário pelo e-mail
        $Obuser = User::getUserByEmail($email);
       

        if(!$Obuser instanceof User) {
            return self::getLogin($request,'E-mail invalido');
        }
        $hashSenha = password_hash('123456', PASSWORD_DEFAULT);

        if (!password_verify($senha, $Obuser->senha)) {
           return self::getLogin($request, 'Senha inválida');
        }
        
        SessionAdminLogin::login($Obuser);

    }
    /**
     * Metodo responsável por deslogar o usuário
     * @param Request
     */
    public static function setLogout($request)
    {
        // Criar sessão de login
        SessionAdminLogin::logout();

        //Redireciona o usuário para o home do Admin
        $request->getRouter()->redirect('/admin/login');
    }

}
