<?php

namespace App;

class Product
{
    protected $title;
    protected $price;
    protected $imageUrl;
    protected $capacityMb;
    protected $color;
    protected $availabilityText;
    protected $isAvailable;
    protected $shippingText;
    protected $shippingDate;
    private $dataHelper;


    public function __construct($dataHelper )
    {
        $this->dataHelper = $dataHelper;
    }

    public function setTitle( $title )
    {
        $this->title = $title;
    }

    public function setPrice( $price )
    {
        $this->price = $price;
    }

    public function setImageUrl( $imageUrl )
    {
        $this->imageUrl = $imageUrl;
    }

    public function setCapacityMb( $capacityMb )
    {
        $this->capacityMb = $capacityMb;
    }

    public function setColor( $color )
    {
        $this->color = $color;
    }

    public function setAvailabilityText( $availabilityText )
    {
        $this->availabilityText = $availabilityText;
    }

    public function setIsAvailable( $isAvailable )
    {
        $this->isAvailable = $isAvailable;
    }

    public function setShippingText( $shippingText )
    {
        $this->shippingText = $shippingText;
    }

    public function setShippingDate( $shippingDate )
    {
        $this->shippingDate = $shippingDate;
    }

    public function getProduct()
    {
        return [
            'title' => $this->dataHelper->formatTitle($this->title,$this->capacityMb  ),
            'price' => $this->price,
            'imageUrl' =>  $this->dataHelper->formatImageUrl($this->imageUrl),
            'capacityMB' => $this->dataHelper->formatCapacityMb($this->capacityMb),
            'colour' => $this->color,
            'availabilityText' =>  $this->dataHelper->formatAvailabilityText($this->availabilityText),
            'isAvailable' => $this->dataHelper->formatAvailabilityState($this->availabilityText),
            'shippingText' => $this->shippingText,
            'shippingDate' => $this->dataHelper->formatShippingDate($this->shippingDate)
        ];
    }
}
