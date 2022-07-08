<?php

namespace App;

class DataFormatHelper
{

    private function parse_date_tokens($tokens) {
        # only try to extract a date if we have 2 or more tokens
        if(!is_array($tokens) || count($tokens) < 2) return false;
        return strtotime(implode(" ", $tokens));
    }

    private function extract_dates($text) {
        static $patterns = [
          '/^[0-9]+(st|nd|rd|th|)?$/i', # day
          '/^(Jan(uary)?|Feb(ruary)?|Mar(ch)?|April|Jun(e)|Jul(y)|Aug(ust)|Sept(ember)|Oct(ober)|Nov(ember)|Dec(ember))$/i', # month
          '/^20[0-9]{2}$/', # year
          '/^of$/' #words
        ];
        # defines which of the above patterns aren't actually part of a date
        static $drop_patterns = [
          false,
          false,
          false,
          true
        ];

        $tokens = [];
        $result = [];
        $text = str_word_count($text, 1, '0123456789'); # get all words in text
        
        # iterate words and search for matching patterns
        foreach($text as $word)
        {
            $found = false;
            foreach($patterns as $key => $pattern)
            {
                if(preg_match($pattern, $word)) 
                {
                    if(!$drop_patterns[$key]) 
                    {
                        $tokens[] = $word;
                    }
              
                    $found = true;
                    break;
                }
            }
      
            if(!$found) 
            {
                $result[] = $this->parse_date_tokens($tokens);
                $tokens = Array();
            }
        }
        
        $result[] = $this->parse_date_tokens($tokens);
        return array_filter($result);
      }

    public function formatTitle($titleText, $capacityText)
    {
        return $titleText . ' ' .$capacityText;
    }

    public function formatDateAvailable( $dateText)
    {
        return $dateText;
    }

    public function formatPrice( $priceText)
    {
        return preg_replace("/[^-0-9\.]/","",$priceText);
    }

    public function formatCapacityMb( $capacityText)
    {
        if ( strpos( strtolower($capacityText), 'mb') !== false) {
            return floatval(preg_replace("/[^-0-9\.]/","",$capacityText));
        }

        return floatval(preg_replace("/[^-0-9\.]/","",$capacityText )) * 1000 ;
    }

    public function formatAvailabilityState( $availabilityText)
    {
        if ( strpos( strtolower($availabilityText), 'in stock') !== false){
            return 'true';
        }
        return 'false';
    }

    public function formatShippingDate( $shippingDateText )
    {
        return $shippingDateText;
    }

    public function formatAvailabilityText(  $availabilityText)
    {
        $segments = explode(':', $availabilityText);
        return trim($segments[1]) ;
    }

    public function formatImageUrl(  $imageUrl , $domain = 'https://www.magpiehq.com/developer-challenge')
    {
        $imageUrl = str_replace( '../', '', $imageUrl);
        return  $domain . '/' . $imageUrl;
    }
}