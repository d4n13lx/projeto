<?php
namespace MVC\App\Controller\Admin;

use MVC\Utils\view;
use MVC\App\Model\entity\User as EntityUser;
use WilliamCosta\DatabaseManager\Pagination;


Class User
{
    private static function GetUseritens($request, &$obPagination)
  {
    //Usuarios
    $itens = '';

    //Quantidade Total de Registros
    $quantidadeTotal = EntityUser::getUsers(null, null, null, 'COUNT(*) as qtd')->fetchObject()->qtd;
    //Pagina Atual
    $queryparams = $request->getQueryParams();
    $paginaAtual = $queryparams['page'] ?? 1;

    //Instancia de Pagination
    $obPagination = new Pagination($quantidadeTotal, $paginaAtual, 5);

    //Resultados da pagina
    $results = EntityUser::getUsers(null, 'id DESC', $obPagination->getLimit());


    while ($obTestimony = $results->fetchObject(EntityUser::class)) {
      $itens .= view::render('admin/UserItem/Item', [
        'id'=> $obTestimony->id,
        'nome' => $obTestimony->nome,
        'email' => $obTestimony->email
      ]);
    }
    //Retorna os depoimentos
    return $itens;
  }
 




    Public static function getUser($request)
    {
         return view::render('admin/Users',[
            'itens' => self::GetUseritens($request, $obPagination),
            'pagination' => self::getPagination($request,$obPagination)
          ]);
    }


    public static function getPagination($request, $obPagination)
    {
        $pages = $obPagination->getPages();

        //Retorna a quantidade de paginas
        if (count($pages) < 1) return '';

        //Links 
        $links = '';

        //Url atual (Sem Gets)
        $url = $request->getRouter()->getCurrentUrl();

        //Gets
        $queryParams = $request->getQueryParams();

        //Renderizar os links
        foreach ($pages as $page) {
            //Altera a pagina
            $queryParams['page'] = $page['page'];

            //link
            $link = $url . '?' . http_build_query($queryParams);

            //View
            $links .= view::render('admin/Pagination/link', [
                'page' => $page['page'],
                'link' => $link,
                'active' => $page['current'] ? 'active' : ''
            ]);
        }

        //rendereiza Box de paginação
        return view::render('admin/Pagination/box', [
            'links' => $links
        ]);
    }

    Public static function getDeleteUser($request,$id)
    {
      $obTestimony = EntityUser::GetUserbyid($id);
      return view::render('Admin/UserItem/delete', [
        'nome' => $obTestimony->nome,
        'email'=>$obTestimony->email,
      ]);
      if(!$obTestimony instanceof EntityUser)
      {
        $request->getRouter()->redirect('admin/Users');
      }
    }

    Public static function setDeleteUser($request,$id)
    {
      $obTestimony = EntityUser::getUserById($id);
      if(!$obTestimony instanceof EntityUser)
      {
        $request->getRouter()->redirect('admin/Users');
      }
  
      $obTestimony->excluirUser();
       //redirecionar a pagina de edição
       $request->getRouter()->redirect('/admin/Users?status=deleted');
    }
}
?>