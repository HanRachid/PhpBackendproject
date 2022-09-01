<?php

namespace App\Repositories\Contracts;

use App\Classes\Product;

interface ProductRepositoryContract
{
    /**
     * Get Product list
     *
     * @return Product[]
     */
    public function listProduct(): array;

    /**
     * Add a Product
     *
     * @param  $title
     * @param  $body
     * @return int
     */
    public function addProduct($name, $sku, $price, $size, $weight, $height, $width, $length, $isDVD, $isFurniture, $isBook): int;

    /**
     * Delete a Product and attached comments
     *
     * @param int $id
     * @return int
     */
    public function deleteProduct($sku);
}
