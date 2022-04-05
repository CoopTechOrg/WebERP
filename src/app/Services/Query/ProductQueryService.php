<?php

namespace App\Services\Query;

use App\Models\Product;
use App\Repositories\ProductRepository;

class ProductQueryService
{
    private ProductRepository $productRepository;

    public function __construct(
        ProductRepository $productRepository
    )
    {
        $this->productRepository = $productRepository;
    }

    public function select($id): Product
    {
        /**
         * @var Product $product
         */
        $product = $this->productRepository->select($id);

        return $product;
    }
}
