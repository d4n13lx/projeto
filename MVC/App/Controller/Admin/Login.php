<?php

namespace MVC\App\Controller\Admin;

use MVC\Utils\view;
use MVC\App\Model\entity\User;
use MVC\App\Session\Admin\Login as SessionAdminLogin;
use MVC\App\HTTP\Request;

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

        $Gustvao = Password_hash('Admin',PASSWORD_DEFAULT);

        if (!$Obuser instanceof User) {
            echo "<pre>";
            Print_r($Gustvao);
            echo "</pre>";
            return self::getLogin($request, 'E-mail invalido');
        }

       

        echo "<pre>";
        Print_r($Gustvao);
        echo "</pre>";

        $senha = 'Admin';
        $hash = '$2y$10$joiya2VBgBJfpaUQa2kgr.jks6OjIlTk5OWSdmXf93OHwCyhBkuim';
        // Adicione logs ou prints para verificar o valor das variáveis


        if (!password_verify($senha, $hash)) {

            return self::getLogin($request, 'Senha inválida');
        }
         else {
            // Criar sessão de login
            SessionAdminLogin::login($Obuser);

            //Redireciona o usuário para o home do Admin
            $request->getRouter()->redirect('/admin');
        }
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
