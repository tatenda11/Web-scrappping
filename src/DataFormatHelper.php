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

    public function formatCapacityMb( $capacityText)
    {
        return $capacityText;
    }

    public function formatAvailabilityState( $availabilityText)
    {
        return $availabilityText;
    }

    public function formatShippingDate( $shippingDateText )
    {
        return  $shippingDateText;
    }

    public function formatAvailabilityText(  $availabilityText)
    {
        return $availabilityText;
    }
}