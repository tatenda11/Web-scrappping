<?php

namespace App;

class DataFormatHelper
{

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
       // $date = \DateTime::createFromFormat('l, j F Y \at G:i',$shippingDateText);
       // return $date->format('j F Y'); //"prints" 8 January 2014
    }

    public function formatAvailabilityText(  $availabilityText)
    {
        $segments = explode(':', $availabilityText);
        return $segments[1] ;
    }

    public function formatImageUrl(  $imageUrl , $domain = 'https://www.magpiehq.com/developer-challenge')
    {
        $imageUrl = str_replace( '../', '', $imageUrl);
        return  $domain . '/' . $imageUrl;
    }
}