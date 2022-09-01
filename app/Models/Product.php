<?php

namespace App\Models;

class Product
{
    protected $name;

    protected $SKU;

    protected $price;


    protected $size;



    protected $weight;


    protected $height;

    protected $width;

    protected $length;

    protected $isDVD;

    protected $isFurniture;

    protected $isBook;

    public function __construct($name, $SKU, $price, $size, $weight, $height, $width, $length, bool $isDVD, bool $isFurniture, bool $isBook)
    {
        $this->name = $name;
        $this->SKU = $SKU;
        $this->price = $price;
        $this->size = $size;
        $this->weight = $weight;
        $this->height = $height;
        $this->width = $width;
        $this->length = $length;
        $this->isDVD = $isDVD;
        $this->isFurniture = $isFurniture;
        $this->isBook = $isBook;
    }

    public function toArray()
    {
        return get_object_vars($this);
    }
}
