<?php 
    namespace MVC\App\Model\entity;

    use Symfony\Component\DomCrawler\Crawler;

    class Noticias
    {
        public function getNews($term)
        {
            $client = new \GuzzleHttp\Client(['verify' => false]);
       
            $baseUrl = 'https://g1.globo.com/busca/?q=' . urlencode($term);
    
            $res = $client->request('GET', $baseUrl);
            $html = $res->getBody();
            
            $crawler = new Crawler($html);
         
            return $crawler->filter('li.widget.widget--card.widget--info')->each(function (Crawler $node) use ($baseUrl) {
                $imageSrc = $node->filter('img')->attr('src');
              
                $title = $node->filter('.widget--info__title')->text();
                $description = $node->filter('.widget--info__description')->text();
                $link = $node->filter('a.widget--info__media')->attr('href');
    
                return [
                    'image' => $imageSrc,
                    'title' => $title,
                    'description' => $description,
                    'link' => $link,
                ];
            });
        }
    }
?>