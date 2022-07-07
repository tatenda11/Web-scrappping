<?php
namespace App;
require 'vendor/autoload.php';
use Symfony\Component\DomCrawler\Crawler;

class Scrape
{
    private array $products = [];

    public function run(): void
    {
        $product = new Product(new DataFormatHelper());
        $document = ScrapeHelper::fetchDocument('https://www.magpiehq.com/developer-challenge/smartphones');
        $productList = $document->filter('div#products > div > div.product');

        foreach ($document->filter('div#products > div > div.product') as $items) 
        {
            $node = new Crawler($items); 
            $product->setTitle( $node->filter( 'span.product-name' )->text( '' )  );
            $product->setPrice( $node->filter( 'span.product-name' )->text( '' ) );
            $product->setCapacityMb($node->filter('span.product-capacity')->text('') );
            $product->setCapacityMb($node->filter('span.product-capacity')->text(''));
            $product->setImageUrl( $node->filter('img')->attr('src') );
           
            $node->filter('div > div.bg-white > div')->each(function (Crawler $child, $index ) use ( &$product ) {
                //fetch color
                if( $index == 0)
                {
                    $product->setColor($child->filter('div > span')->attr('data-colour'));
                }

                if( $index == 1)
                {  
                    $product->setPrice($child->text(''));
                }

                if( $index == 2 )
                {
                    $product->setAvailabilityText( $child->text(''));
                }

                if( $index == 3)
                {
                    $product->setShippingText( $child->text(''));
                }
            });
            
            $this->products[] = $product->getProduct();
        }

        print_r(  $this->products );

        file_put_contents('output.json', json_encode($this->products));
    }
}

$scrape = new Scrape();
$scrape->run();
