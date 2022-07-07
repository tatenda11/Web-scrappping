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
            'title' => $this->title,
            'price' => $this->price,
            'imageUrl' => $this->imageUrl,
            'capacityMB' => $this->capacityMb,
            'colour' => $this->color,
            'availabilityText' => $this->availabilityText,
            'isAvailable' => $this->isAvailable,
            'shippingText' => $this->shippingText,
            'shippingDate' => $this->shippingDate
        ];
    }
}
