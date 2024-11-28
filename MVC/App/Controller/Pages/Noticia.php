<?php


namespace MVC\App\Controller\Pages;

use MVC\App\Model\entity\Casos as entitycasos;
use MVC\Utils\view;
use WilliamCosta\DatabaseManager\Pagination;
use MVC\App\Controller\Pages\Page;
use Symfony\Component\DomCrawler\Crawler;
use MVC\App\Model\entity\Noticias;
use MVC\App\Session\Admin\Login as SessionAdminLogin;

class Noticia
{
    
/*

        $newsModel = new News();
        $term = 'dengue';
        $items = $newsModel->getNews($term);
*/

    public static function GetNoticias($request)
    {
        // Instância da paginação
        $obPagination = new Pagination(0, 1, 3);

        $isLoggedIn = SessionAdminLogin::isLogged();
        return view::render('view_mobi/noticias',[
            'login' => $isLoggedIn ? view::render('view_mobi/User/LoggedMenu') : view::render('view_mobi/User/LogoutMenu'),
            'card' => self::getRR($request,$obPagination),
            'items' => self::getNews()
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

    private static function getNews()
    {
        $newsModel = new Noticias();

    $term = 'dengue';

    $items = $newsModel->getNews($term);


    $client = new \GuzzleHttp\Client(['verify' => false]);

    $baseUrl = 'https://g1.globo.com/busca/?q=' . urlencode($term);


    $res = $client->request('GET', $baseUrl);

    $html = $res->getBody();

    

    $crawler = new Crawler($html);

    

    // Inicializa uma variável para armazenar as notícias

    $newsItems = '';


    // Itera sobre os itens encontrados

    $crawler->filter('li.widget.widget--card.widget--info')->each(function (Crawler $node) use ($baseUrl, &$newsItems) {

        $imageSrc = $node->filter('img')->attr('src');

        $title = $node->filter('.widget--info__title')->text();

        $description = $node->filter('.widget--info__description')->text();

        $link = $node->filter('a.widget--info__media')->attr('href');

        $date = $node->filter('.widget--info__meta')->text(); 

        // Renderiza a view e adiciona à variável newsItems

        $newsItems .= view::render('view_mobi/noticias/noticias', [

            'image' => $imageSrc,
            'title' => $title,
            'description' => $description,
            'link' => $link,
            'date' => $date

        ]);

    });


    return $newsItems; // Retorna todas as notícias concatenadas
    }
}
?>