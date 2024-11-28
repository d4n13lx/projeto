<?php

namespace MVC\App\Controller\Admin;

use MVC\Utils\view;
use MVC\App\Model\entity\Testimony as EntityTestimony;
use WilliamCosta\DatabaseManager\Pagination;

class Testimony
{

  private static function GetTestimoniesitens($request, & $obPagination)
  {
    //Depoimentos
    $itens = '';

    //Quantidade Total de Registros
    $quantidadeTotal = EntityTestimony::GetTestimonies(null, null, null, 'COUNT(*) as qtd')->fetchObject()->qtd;
    //Pagina Atual
    $queryparams = $request->getQueryParams();
    $paginaAtual = $queryparams['page'] ?? 1;

    //Instancia de Pagination
    $obPagination = new Pagination($quantidadeTotal, $paginaAtual, 5);

    //Resultados da pagina
    $results = EntityTestimony::GetTestimonies(null, 'id DESC', $obPagination->getLimit());


    while ($obTestimony = $results->fetchObject(EntityTestimony::class)) {
      $itens .= view::render('admin/item', [
        'id'=> $obTestimony->id,
        'nome' => $obTestimony->nome,
        'mensagem' => $obTestimony->mensagem,
        'data' => date('d/m/y - H:i:s', strtotime($obTestimony->data))
      ]);
    }
    //Retorna os depoimentos
    return $itens;
  }

  public static function getTestimony($request)
  {
    return view::render('Admin/Testimony', [
      'itens' => self::GetTestimoniesitens($request, $obPagination),
      'pagination' => self::getPagination($request,$obPagination),
        'status'=> self::getStatus($request)
    ]);
  }

  /**
   * Metodo responsável por retornar a página de cadastro de um novo depoimento
   * @param Request
   * @return string
   */
  Public static function getNewTestimony($request)
  {
    return view::render('Admin/form', [
      'status' => ''
    ]);
  }

  /**
   * Metodo responsável por retornar a página de cadastro de um novo depoimento
   * @param Request
   * @return string
   */
  Public static function setNewTestimony($request)
  {
    //Variavel que armazena o post
    $postvars = $request->getPostVars();
    $obTestimony = new EntityTestimony();
    $obTestimony->nome = $postvars['nome'] ?? '';
    $obTestimony->mensagem = $postvars['mensagem'] ?? '';
    $obTestimony->user_id =   $_SESSION['id_usuario'];
    $obTestimony->Cadastrar();

    //redirecionar a pagina de edição
    $request->getRouter()->redirect('/admin/Testimonies/'.$obTestimony->id.'/edit?status=created');

  }

  Private static function getStatus($request)
  {
    $queryparams = $request->getQueryParams();

    if(!isset($queryparams['status'])) return '';

    switch($queryparams['status'])
    {
      case 'created':
        return Alert::getSucess('Criado Com Sucesso');
        break;
      case 'updated':
        return Alert::getSucess('Atualizado com Sucesso');  
        break;
      case 'Duplicate':
        return Alert::getSucess('E-mail já cadastrado');
        case 'deleted':
          return Alert::getSucess('Depoimento Deletado com Sucesso');  
    }
  }

  Public Static function getDeleteTestimony($request,$id)
  {
    $obTestimony = EntityTestimony::GetTestimonnybyid($id);
    return view::render('Admin/delete', [
      'nome' => $obTestimony->nome,
      'mensagem'=>$obTestimony->mensagem
    ]);
    if(!$obTestimony instanceof EntityTestimony)
    {
      $request->getRouter()->redirect('admin/Testimonies');
      
    }

  }

  Public static function setDeleteTestimony($request,$id)
  {
    $obTestimony = EntityTestimony::GetTestimonnybyid($id);
    if(!$obTestimony instanceof EntityTestimony)
    {
      $request->getRouter()->redirect('admin/Testimonies');
    }

    $obTestimony->excluir();
     //redirecionar a pagina de edição
     $request->getRouter()->redirect('/admin/Testimonies?status=deleted');
  }


  Public Static function getEditTestimony($request, $id)
  {
      $obTestimony = EntityTestimony::GetTestimonnybyid($id);
  
      // Verifica se o objeto retornado é válido
      if (!$obTestimony) {
          // Redireciona se não houver um depoimento com o ID fornecido
          $request->getRouter()->redirect('/admin/Testimonies');
      }
  
      return view::render('Admin/edit', [
          'id'=> $obTestimony->id,
          'nome' => $obTestimony->nome,
          'mensagem'=>$obTestimony->mensagem,
          'status'=>self::getStatus($request)
      ]);
  }
  

  Public static function setEditTestimony($request,$id)
  {
    $obTestimony = EntityTestimony::GetTestimonnybyid($id);
    if(!$obTestimony instanceof EntityTestimony)
    {
      $request->getRouter()->redirect('admin/Testimonies');
    }

    $postvars = $request->getPostVars();

    $obTestimony->nome = $postvars['nome'] ?? $obTestimony->nome;
    $obTestimony->mensagem = $postvars['mensagem'] ?? $obTestimony->mensagem; 
    $obTestimony->atualizar();
   
     //redirecionar a pagina de edição
     $request->getRouter()->redirect('/admin/Testimonies/'.$obTestimony->id.'/edit?status=updated');
  }

  /**
     * Metodo responsavel por renderizar o layoult da paginação
     * @param Request $request
     * @param Pagination $obPagination
     * @return string
     */
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
            'links' => $links  ]);
    }
}