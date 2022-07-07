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
        $paginationlinks = [];
        /**
         * Get pagination links
         */

        foreach ($document->filter('div#pages > div > a') as $items)
        {   
            $node = new Crawler($items);
            $paginationlinks[] = str_replace( '../', 'https://www.magpiehq.com/developer-challenge/', $node->attr('href'));

        }

       if( !empty($paginationlinks))
       {
            foreach($paginationlinks as $link)
            {
                $document = ScrapeHelper::fetchDocument($link);

                foreach ($document->filter('div#products > div > div.product') as $items) 
                {
                    $node = new Crawler($items); 
                    $product->setTitle( $node->filter( 'span.product-name' )->text( '' )  );
                    $product->setCapacityMb($node->filter('span.product-capacity')->text('') );
                    $product->setCapacityMb($node->filter('span.product-capacity')->text(''));
                    $product->setImageUrl( $node->filter('img')->attr('src') );
                   
                    $node->filter('div > div.bg-white > div')->each(function (Crawler $child, $index ) use ( &$product ) {
                        //fetch color
                        if( $index == 0)
                        {   $colors = [];
                            $child->filter('div > span')->each(function (Crawler $colorChild, $index ) use ( &$colors  ){
                                $colors[] = $colorChild->attr('data-colour');
                            });
                            $product->setColor( $colors );
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
                    
                    $this->products = $product->addToProductList($this->products);
                }
            }
       }
    
       print_r(  $this->products );

        file_put_contents('output.json', json_encode($this->products));
    }
}

$scrape = new Scrape();
$scrape->run();
