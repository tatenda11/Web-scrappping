<?php
namespace App;
require 'vendor/autoload.php';
use Symfony\Component\DomCrawler\Crawler;

class Scrape
{
    private array $products = [];

    public function run(): void
    {
        $product = new Product();
        $payload = [];
        $document = ScrapeHelper::fetchDocument('https://www.magpiehq.com/developer-challenge/smartphones');

       // $nodeValues = $document->filter('#products > div');
        //$nodeValues = $document->filter('div#products > div > div.product');
        $document->filter('div#products > div > div.product')->each( function( Crawler $node, $i ) use (&$product, &$payload) {
            $product->setTitle( $node->filter( 'span.product-name' )->text( '' )  );
            $product->setPrice( $node->filter( 'span.product-name' )->text( '' ) );
            $product->setCapacityMb($node->filter('span.product-capacity')->text('') );
            $product->setCapacityMb($node->filter('span.product-capacity')->text('') );
            $product->setImageUrl( $node->filter('img')->eq(0)->attr('src'));
            $payload[] = $product->getProduct();
        });

        //file_put_contents('output.json', json_encode($this->products));
        print_r($payload);
        file_put_contents('output.json', json_encode($payload));
    }
}

$scrape = new Scrape();
$scrape->run();
