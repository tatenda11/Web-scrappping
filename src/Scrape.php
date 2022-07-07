<?php
namespace App;
require 'vendor/autoload.php';
use Symfony\Component\DomCrawler\Crawler;

class Scrape
{
    private array $products = [];

    public function run(): void
    {
       
        $document = ScrapeHelper::fetchDocument('https://www.magpiehq.com/developer-challenge/smartphones');
        $nodeValues = $document->filter('#products > div')->each(function(Crawler $node, $i){
            return $node->html();
        });
        file_put_contents('test.html', $nodeValues);
        //file_put_contents('output.json', json_encode($this->products));
    }
}

$scrape = new Scrape();
$scrape->run();
