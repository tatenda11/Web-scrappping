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
        $this->ImageUrl = $imageUrl;
    }

    public function setCapacityMb( $capacityMb )
    {
        $this->CapacityMb = $capacityMb;
    }

    public function setColor( $color )
    {
        $this->color = $color;
    }

    public function setAvailabilityText( $availabilityText )
    {
        $this->setAvailabilityText = $availabilityText;
    }

    public function setIsAvailable( $isAvailable )
    {
        $this->isAvailable = $isAvailable;
    }

    public function setShippingText( $shippingText )
    {
        $this->setShippingText = $shippingText;
    }

    public function setShippingDate( $shippingDate )
    {
        $this->setShippingDate = $shippingDate;
    }

    public function getProduct()
    {
        return [
            'title' => $this->title,
            'price' => $this->price,
            'imageUrl' => $this->imageUrl,
            'capacityMB' => $this->capacityMB,
            'colour' => $this->colour,
            'availabilityText' => $this->availabilityText,
            'isAvailable' => $this->isAvailable,
            'shippingText' => $this->shippingText,
            'shippingDate' => $this->shippingDate
        ];
    }
}
