<?php

namespace App;

class Product
{
    protected $title;
    protected $price;
    protected $imageUrl;
    protected $capacityMb;
    protected $colors;
    protected $availabilityText;
    protected $isAvailable;
    protected $shippingText;
    protected $shippingDate;
    protected $productIndex = [];
    private $dataHelper;


    public function __construct($dataHelper )
    {
        $this->dataHelper = $dataHelper;
    }

    public function setTitle( $title )
    {
        $this->title = $title;
    }

    private function clearProduct()
    {
        
        $this->title = null;
        $this->price = null;
        $this->imageUrl = null;
        $this->capacityMb = null;
        $this->colors = null;
        $this->availabilityText = null;
        $this->isAvailable = null;
        $this->shippingText = null;
        $this->shippingDate= null;   
    }

    public function setPrice( $price )
    {
        $this->price = $price;
    }

    public function setProductIndex( $color )
    {
        $this->productIndex[] = $color . $this->title  . $this->capacityMb;
    }

    public function setImageUrl( $imageUrl )
    {
        $this->imageUrl = $imageUrl;
    }

    public function setCapacityMb( $capacityMb )
    {
        $this->capacityMb = $capacityMb;
    }

    public function setColor( $colors )
    {
        $this->colors = $colors;
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

    public function addToProductList($currentProducts)
    {
        
        foreach( $this->colors as $color)
        {
            $index = $color . $this->title  . $this->capacityMb;
                
            if(in_array( $index, $this->productIndex ))
            {
               continue;
            }

            $currentProducts[] = [
                'title' => $this->dataHelper->formatTitle($this->title,$this->capacityMb  ),
                'price' => $this->price,
                'imageUrl' =>  $this->dataHelper->formatImageUrl($this->imageUrl),
                'capacityMB' => $this->dataHelper->formatCapacityMb($this->capacityMb),
                'colour' => $color,
                'availabilityText' =>  $this->dataHelper->formatAvailabilityText($this->availabilityText),
                'isAvailable' => $this->dataHelper->formatAvailabilityState($this->availabilityText),
                'shippingText' => $this->shippingText,
                'shippingDate' => $this->dataHelper->formatShippingDate($this->shippingDate)
            ];

            $this->setProductIndex( $color );
        }
        
        $this->clearProduct();
        return $currentProducts;
    }
}
