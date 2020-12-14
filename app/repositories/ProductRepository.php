<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    /**
     * @var Product
     */
    protected $product;

    /**
     * OrderRepository constructor
     * @param Order $order
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Find a product by its ID
     * @param $id Product id
     */
    public function getProductById($id)
    {

        return $this->product::find($id);
    }
}
