<?php

namespace App\Services;

use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class ProductService
{
    /**
     * @var productRepository
     */
    public $productRepository;

    /**
     * OrderRepository constructor
     * @param ProductRepository $productRepository
     */
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * Function to validate product id and return the response
     */
    public function getProductById($id_product)
    {
        return $this->productRepository->getProductById($id_product);
    }
}
